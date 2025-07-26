<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

if (!isset($_GET['student_id']) || !isset($_GET['date']) || !isset($_GET['subject'])) {
    header("Location: view_teacher_attendance.php?message=Invalid request.&alert=alert-danger");
    exit();
}

$student_id = $_GET['student_id'];
$date = $_GET['date'];
$subject = $_GET['subject'];

$query = "SELECT a.student_id, s.name, s.class, a.subject, a.date, a.status 
          FROM attendance a
          JOIN students s ON a.student_id = s.student_id
          WHERE a.student_id = ? AND a.date = ? AND a.subject = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $student_id, $date, $subject);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: view_teacher_attendance.php?message=Record not found.&alert=alert-warning");
    exit();
}

$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_status = $_POST['status'];
    $update_query = "UPDATE attendance SET status = ? WHERE student_id = ? AND date = ? AND subject = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssss", $new_status, $student_id, $date, $subject);
    
    if ($update_stmt->execute()) {
        header("Location: view_teacher_attendance.php?message=Attendance updated successfully!&alert=alert-success");
        exit();
    } else {
        $error_message = "Error updating record.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        h2 {
            background: linear-gradient(45deg, #4a90e2, #8e44ad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #4a90e2;
            border-color: #4a90e2;
            border-radius: 20px;
        }
        .btn-primary:hover {
            background-color: #8e44ad;
            border-color: #8e44ad;
        }
        .btn-secondary {
            border-radius: 20px;
        }
        .form-control, .form-select {
            border: 2px solid #4a90e2;
            transition: 0.3s;
        }
        .form-control:hover, .form-select:hover {
            border-color: #8e44ad;
        }
    </style>
</head>
<body>
<?php include 'teacher_navbar.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center">✏ Edit Attendance</h2>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"> <?php echo $error_message; ?> </div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Student Name:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Class:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['class']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Subject:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['subject']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Date:</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars($row['date']); ?>" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Status:</label>
                <select name="status" class="form-select">
                    <option value="Present" <?php echo ($row['status'] == 'Present') ? 'selected' : ''; ?>>✔ Present</option>
                    <option value="Absent" <?php echo ($row['status'] == 'Absent') ? 'selected' : ''; ?>>✖ Absent</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="view_teacher_attendance.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
