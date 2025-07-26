
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'navbar.php';
include 'db.php';

// Fetch subjects and classes from the database
$subjects_result = $conn->query("SELECT subject_name FROM subjects");
$classes_result = $conn->query("SELECT class_name FROM classes");

// Fetch next student ID
$next_id = "STU001";
$next_id_result = $conn->query("SELECT student_id FROM students ORDER BY student_id DESC LIMIT 1");
if ($row = $next_id_result->fetch_assoc()) {
    $num = intval(substr($row['student_id'], 3)) + 1;
    $next_id = "STU" . str_pad($num, 3, "0", STR_PAD_LEFT);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'] ?? '';
    $name = trim($_POST['name'] ?? '');
    $contact_no = trim($_POST['contact_no'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $gender = trim($_POST['gender'] ?? '');
    $dob = trim($_POST['dob'] ?? '');
    $class = trim($_POST['class'] ?? '');
    $subjects = isset($_POST['subjects']) ? implode(",", $_POST['subjects']) : '';

    // Input validation
    if (!preg_match("/^[A-Za-z\s]+$/", $name)) {
        $error_message = "<div class='alert alert-danger'>❌ Student name should contain only letters and spaces!</div>";
    } elseif (!preg_match("/^[0-9]{10}$/", $contact_no)) {
        $error_message = "<div class='alert alert-danger'>❌ Contact number must be exactly 10 digits!</div>";
    } elseif (empty($email)) {
        $error_message = "<div class='alert alert-danger'>❌ Email field is required!</div>";
    } elseif (empty($gender)) {
        $error_message = "<div class='alert alert-danger'>❌ Gender field is required!</div>";
    } elseif (empty($dob)) {
        $error_message = "<div class='alert alert-danger'>❌ Date of Birth is required!</div>";
    } elseif (empty($class)) {
        $error_message = "<div class='alert alert-danger'>❌ Please select a class!</div>";
    } elseif (empty($subjects)) {
        $error_message = "<div class='alert alert-danger'>❌ Please select at least one subject!</div>";
    } else {
        $check_email = $conn->prepare("SELECT email FROM students WHERE email = ?");
        $check_email->bind_param("s", $email);
        $check_email->execute();
        $result = $check_email->get_result();

        if ($result->num_rows > 0) {
            $error_message = "<div class='alert alert-danger'>❌ Email already exists!</div>";
        } else {
            $stmt = $conn->prepare("INSERT INTO students (student_id, name, address, contact_no, email, gender, dob, class, subjects) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssssss", $student_id, $name, $address, $contact_no, $email, $gender, $dob, $class, $subjects);
            if ($stmt->execute()) {
                $success_message = "<div class='alert alert-success'>🎉 Student added successfully!</div>";
            } else {
                $error_message = "<div class='alert alert-danger'>❌ Error adding student!</div>";
            }
            $stmt->close();
        }
        $check_email->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="card shadow-lg border-white">
            <div class="card-header bg-dark text-primary text-center">
                <h2>📝 Add Student</h2>
            </div>
            <div class="card-body">
                <?php if (isset($success_message)) echo $success_message; ?>
                <?php if (isset($error_message)) echo $error_message; ?>
                <form action="add_student.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Student ID</label>
                        <input type="text" class="form-control" name="student_id" value="<?php echo $next_id; ?>" readonly required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Select Class</label>
                        <select class="form-select" name="class" required>
                            <option value="">Select Class</option>
                            <?php while ($class = $classes_result->fetch_assoc()) : ?>
                                <option value="<?php echo $class['class_name']; ?>"> <?php echo $class['class_name']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Student Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact No</label>
                        <input type="text" class="form-control" name="contact_no" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select class="form-select" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" required>
                    </div>
                    <label>Select Subjects</label>
            <?php while ($subject = $subjects_result->fetch_assoc()) : ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="subjects[]" value="<?php echo $subject['subject_name']; ?>">
                    <label class="form-check-label"> <?php echo $subject['subject_name']; ?> </label>
                </div>
            <?php endwhile; ?>
                    <button type="submit" class="btn btn-primary w-100">➕ Add Student</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
