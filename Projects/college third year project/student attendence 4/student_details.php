<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
include 'db.php';

if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true) {
    header("Location: student_login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch student details
$stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'student_navbar.php'; ?>
    <div class="container mt-5">
        <h2>My Details</h2>
        <table class="table table-bordered">
            <tr><th>Student ID</th><td><?php echo $student['student_id']; ?></td></tr>
            <tr><th>Name</th><td><?php echo $student['name']; ?></td></tr>
            <tr><th>Address</th><td><?php echo $student['address']; ?></td></tr>
            <tr><th>Contact No</th><td><?php echo $student['contact_no']; ?></td></tr>
            <tr><th>Email</th><td><?php echo $student['email']; ?></td></tr>
            <tr><th>Gender</th><td><?php echo $student['gender']; ?></td></tr>
            <tr><th>Date of Birth</th><td><?php echo $student['dob']; ?></td></tr>
            <tr><th>Class</th><td><?php echo $student['class']; ?></td></tr>
            <tr><th>Class Teacher</th><td><?php echo $student['class_teacher']; ?></td></tr>
        </table>
    </div>
</body>
</html>
