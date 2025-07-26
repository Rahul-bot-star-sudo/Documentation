<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';

$success_message = $error_message = '';

// Fetch subjects from the database
$subjects = [];
$result = $conn->query("SELECT subject_name FROM subjects");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row['subject_name'];
    }
}

// Fetch classes from the database
$classes = [];
$result = $conn->query("SELECT class_name FROM classes");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $classes[] = $row['class_name'];
    }
}

// Generate unique Teacher ID
$result = $conn->query("SELECT COUNT(*) AS total FROM teachers");
$row = $result->fetch_assoc();
$teacher_count = $row['total'] + 1;
$teacher_id = "TCHR" . str_pad($teacher_count, 4, "0", STR_PAD_LEFT);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $subject = trim($_POST['subject']);
    $address = trim($_POST['address']);
    $contact_no = trim($_POST['contact_no']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $age = trim($_POST['age']);
    $password = trim($_POST['password']); // You should hash this in a real system
    $selected_classes = $_POST['classes'] ?? [];
    $classes_string = implode(", ", $selected_classes); // Convert array to string
    
    // Ensure email contains @gmail.com
    if (!str_contains($email, '@')) {
        $email .= '@gmail.com';
    }
    
    // Validate contact number
    if (!preg_match("/^[0-9]{10}$/", $contact_no)) {
        $error_message = "Contact number must be exactly 10 digits and contain only numbers!";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error_message = "Name must contain only letters and spaces!";
    } else {
        $stmt = $conn->prepare("INSERT INTO teachers (teacher_id, name, subject, address, contact_no, email, gender, age, password, assigned_classes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssiss", $teacher_id, $name, $subject, $address, $contact_no, $email, $gender, $age, $password, $classes_string);
        
        if ($stmt->execute()) {
            $success_message = "Teacher added successfully!";
        } else {
            $error_message = "Error adding teacher!";
        }

        $stmt->close();
    }
    
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function ensureGmail() {
            let emailField = document.getElementById('email');
            if (emailField.value && !emailField.value.includes('@')) {
                emailField.value += '@gmail.com';
            }
        }
    </script>
        <style>
        body {
            background-color: #24292e;
            color: white;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            background-color: #2b3137;
            color: white;
            border: none;
        }
        .card-header {
            background-color: #3c4045;
            text-align: center;
        }
        .form-control {
            background-color: #3c4045;
            color: white;
            border: none;
        }
        .form-control:focus {
            background-color: #444b52;
            color: white;
        }
        .btn-primary {
            background-color: #58a6ff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #1f6feb;
        }
    </style>
</head>
<body class="bg-dark">
    <?php include 'navbar.php'; ?>
    
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-dark text-primary text-center">
                <h2>Add Teacher</h2>
            </div>
            <div class="card-body">
                
                <?php if (!empty($success_message)) : ?>
                    <div class="alert alert-success text-center"> <?php echo $success_message; ?> </div>
                <?php endif; ?>
                <?php if (!empty($error_message)) : ?>
                    <div class="alert alert-danger text-center"> <?php echo $error_message; ?> </div>
                <?php endif; ?>

                <form action="add_teacher.php" method="POST" onsubmit="ensureGmail()" class="p-3">
                    <div class="mb-3">
                        <label class="form-label">Teacher ID</label>
                        <input type="text" class="form-control" name="teacher_id" value="<?php echo $teacher_id; ?>" readonly>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Subject</label>
                        <select class="form-control" name="subject" required>
                            <option value="">Select Subject</option>
                            <?php foreach ($subjects as $subject) : ?>
                                <option value="<?php echo $subject; ?>"> <?php echo $subject; ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="contact_no" placeholder="Enter Contact No" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email ID" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-control" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
<div class="mb-3">
                        <label class="form-label">Assign Classes</label><br>
                        <?php foreach ($classes as $class) : ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="classes[]" value="<?php echo $class; ?>" id="class_<?php echo $class; ?>">
                                <label class="form-check-label" for="class_<?php echo $class; ?>">
                                    <?php echo $class; ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>



                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" placeholder="Enter Age" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Add Teacher</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
