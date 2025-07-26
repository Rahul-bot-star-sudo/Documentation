<?php
include 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_name']) && isset($_POST['problem'])) {
    $student_name = $_POST['student_name'];
    $problem = $_POST['problem'];

    // Check for duplicates
    $check_sql = "SELECT COUNT(*) FROM student_problems WHERE student_name = ? AND problem = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ss", $student_name, $problem);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $error_message = "Error: This problem has already been submitted by the student!";
    } else {
        $sql = "INSERT INTO student_problems (student_name, problem, created_at) VALUES (?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $student_name, $problem);
        $stmt->execute();
        $stmt->close();
        $success_message = "Problem submitted successfully!";
    }
}


// Update student problem
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_problem_id']) && isset($_POST['edit_problem'])) {
    $edit_problem_id = $_POST['edit_problem_id'];
    $edit_problem = $_POST['edit_problem'];

    $sql = "UPDATE student_problems SET problem = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $edit_problem, $edit_problem_id);
    $stmt->execute();
    $stmt->close();
}

// Delete student problem
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql = "DELETE FROM student_problems WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: student_problem.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['teacher_name']) && isset($_POST['response']) && isset($_POST['problem_id'])) {
    $teacher_name = $_POST['teacher_name'];
    $response = $_POST['response'];
    $problem_id = $_POST['problem_id'];

    if (!empty($problem_id)) {
        $check_sql = "SELECT COUNT(*) FROM teacher_responses WHERE teacher_name = ? AND response = ? AND student_problem_id = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("ssi", $teacher_name, $response, $problem_id);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count > 0) {
            echo "<p class='text-danger'>Error: You have already given the same response to this student!</p>";
        } else {
            $sql = "INSERT INTO teacher_responses (teacher_name, response, student_problem_id, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $teacher_name, $response, $problem_id);
            $stmt->execute();
            $stmt->close();
            
        }
    }
}

// Edit teacher response
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_response_id']) && isset($_POST['edit_response'])) {
    $edit_response_id = $_POST['edit_response_id'];
    $edit_response = $_POST['edit_response'];

    $sql = "UPDATE teacher_responses SET response = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $edit_response, $edit_response_id);
    $stmt->execute();
    $stmt->close();
}

// Delete teacher response
if (isset($_GET['delete_response_id'])) {
    $delete_response_id = $_GET['delete_response_id'];

    $sql = "DELETE FROM teacher_responses WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_response_id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: student_problem.php");
    exit();
}

$student_sql = "SELECT id, student_name, problem, created_at FROM student_problems ORDER BY created_at DESC";
$student_result = $conn->query($student_sql);

$teacher_sql = "SELECT tr.id, tr.teacher_name, tr.response, tr.created_at, sp.student_name, sp.problem 
                FROM teacher_responses tr 
                JOIN student_problems sp ON tr.student_problem_id = sp.id 
                ORDER BY tr.created_at DESC";

$teacher_result = $conn->query($teacher_sql);

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student & Teacher Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style> 
    .card {
        border-radius: 15px;
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: scale(1.02);
    }
    .btn-warning, .btn-danger {
        border-radius: 8px;
    }

        body {
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        /* body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #1e1e2f, #3b3f5c);
            color: white;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            margin: 0;
        } */
        .navbar {
            background-color: rgba(42, 45, 62, 0.8) !important;
            backdrop-filter: blur(10px);
        }
        .navbar-brand img {
            width: 50px;
            height: auto;
        }
       
    </style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    ☰
                </button>
                <ul class="dropdown-menu">
                <li><a class="dropdown-item btn-dark" href="index.php">Home</a></li>
                    <li><a class="dropdown-item btn-dark" href="admin_login.php">Admin Login</a></li>
<li><a class="dropdown-item btn-dark" href="student_problem.php">Student Problem</a></li>

<li><a class="dropdown-item btn-dark" href="teacher_login.php">Teacher Login</a></li>

<li><a class="dropdown-item btn-dark" href="student_login.php">Student Login</a></li>
              </ul>
            </div>
            <a class="navbar-brand mx-auto" href="index2.php">
                <img src="index.jpg" alt="Logo">
            </a>
            <a href="student_problem.php" class="btn btn-dark border-white">Student Problem</a>
        </div>
    </nav>
    
<?php if (isset($error_message)): ?>
    <div class="alert alert-danger"><?php echo $error_message; ?></div>
<?php endif; ?>
<?php if (isset($success_message)): ?>
    <div class="alert alert-success"><?php echo $success_message; ?></div>
<?php endif; ?>

<div class="container mt-5">
    <h2 class="text-center text-light">Student Problem Submission</h2>
    <div class="card p-4">
        <form method="POST" action="">
            <div class="mb-3">

                <label class="form-label">Student Name:</label>
                <input type="text" name="student_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Describe Your Problem:</label>
                <textarea name="problem" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-custom w-100">Submit</button>
        </form>
    </div>

    <h3 class="text-center text-light mt-4">Submitted Problems</h3>
    <ul class="list-group shadow-sm">
    <?php while ($row = $student_result->fetch_assoc()): ?>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div>
                <strong><?php echo htmlspecialchars($row['student_name']); ?>:</strong>
                <span id="problem-text-<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['problem']); ?></span>
                <br>
                <small class="text-muted">Submitted on: <?php echo $row['created_at']; ?></small>
            </div>
            <div>
            <div>
    <button class="btn btn-success btn-sm" onclick="openResponseModal(<?php echo $row['id']; ?>, '<?php echo htmlspecialchars($row['student_name']); ?>', '<?php echo htmlspecialchars($row['problem']); ?>')">
        Respond
    </button>
    <button class="btn btn-warning btn-sm" onclick="editProblem(<?php echo $row['id']; ?>)">Edit</button>
    <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
</div>

                <!-- <button class="btn btn-warning btn-sm" onclick="editProblem(<?php echo $row['id']; ?>)">Edit</button>
                <a href="?delete_id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a> -->
            </div>
        </li>
    <?php endwhile; ?>
</ul>

</div>


<!-- Edit Problem Modal -->
<div id="editModal" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Problem</h5>
                <button type="button" class="btn-close" onclick="closeModal()"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" id="edit_problem_id" name="edit_problem_id">
                    <div class="mb-3">
                        <label for="edit_problem" class="form-label">Problem:</label>
                        <textarea id="edit_problem" name="edit_problem" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
function editProblem(problemId) {
    let problemText = document.getElementById("problem-text-" + problemId).innerText;
    document.getElementById("edit_problem_id").value = problemId;
    document.getElementById("edit_problem").value = problemText;
    document.getElementById("editModal").style.display = "block";
}

function closeModal() {
    document.getElementById("editModal").style.display = "none";
}
</script>

<!-- <style>
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}
.modal-dialog {
    background: white;
    padding: 20px;
    border-radius: 10px;
}
</style> -->
        <!-- Teacher Response Form --><div class="d-flex justify-content-center mt-4">
        <div class="col-md-6">
            <h2 class="text-center text-success">Teacher Response</h2>
            <form method="POST" action="" class="card p-4 shadow-sm">
                <div class="mb-3">
                    <label for="teacher_name" class="form-label">Teacher Name:</label>
                    <input type="text" id="teacher_name" name="teacher_name" class="form-control" required>
                </div>
                
                <div class="mb-3">
                    <label for="response" class="form-label">Your Response:</label>
                    <textarea id="response" name="response" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="problem_id" class="form-label">Select Student Problem:</label>
                    <select id="problem_id" name="problem_id" class="form-control" required>
                        <option value="">-- Select a Problem --</option>
                        <?php 
                        $student_result->data_seek(0); // Reset result pointer
                        while ($row = $student_result->fetch_assoc()): ?>
                            <option value="<?php echo $row['id']; ?>">
                                <?php echo htmlspecialchars($row['student_name']) . " - " . htmlspecialchars($row['problem']); ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </form>
        </div>
    </div>
                        </div>   
    <h2 class="text-center text-dark mt-4">Teacher Responses</h2><div class="row justify-content-center">
    <?php while ($row = $teacher_result->fetch_assoc()): ?>
        <div class="col-md-8 mb-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">
                        <span class="badge bg-primary"><?php echo htmlspecialchars($row['student_name']); ?></span>
                    </h5>
                    <p class="text-muted"><strong>Problem:</strong> <?php echo htmlspecialchars($row['problem']); ?></p>
                    <h6 class="text-muted"><i class="bi bi-person-check"></i> <?php echo htmlspecialchars($row['teacher_name']); ?></h6>
                    <p class="card-text"><?php echo htmlspecialchars($row['response']); ?></p>
                    <p class="text-muted small"><i class="bi bi-clock"></i> Responded on: <?php echo $row['created_at']; ?></p>
                    
                    <div class="d-flex justify-content-end">
                        <a href="?edit_response_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning me-2">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="?delete_response_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this response?')">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>


</div>
<!-- Teacher Response Modal -->
<!-- Teacher Response Modal (Hidden by Default) -->
<!-- Edit Response Modal (Hidden by Default) -->
<div id="editResponseModal" class="modal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Response</h5>
                <button type="button" class="btn-close" onclick="closeEditResponseModal()"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="">
                    <input type="hidden" id="edit_response_problem_id" name="problem_id">
                    <div class="mb-3">
                        <label class="form-label">Teacher Name:</label>
                        <input type="text" id="edit_teacher_name" name="teacher_name" class="form-control" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Response:</label>
                        <textarea id="edit_teacher_response" name="response" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update Response</button>
                    <button type="button" class="btn btn-secondary" onclick="closeEditResponseModal()">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openResponseModal(problemId, studentName, problemText) {
    document.getElementById("response_problem_id").value = problemId;
    document.getElementById("response_student_name").value = studentName;
    document.getElementById("response_student_problem").value = problemText;
    document.getElementById("responseModal").style.display = "block";
}

function closeResponseModal() {
    document.getElementById("responseModal").style.display = "none";
}
</script>

<style>
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}
.modal-dialog {
    background: white;
    padding: 20px;
    border-radius: 10px;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
