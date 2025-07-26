<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['attendance']) && isset($_POST['subject_id'])) {
    $subject_id = $_POST['subject_id'];
    $attendance_data = $_POST['attendance'];

    foreach ($attendance_data as $student_id => $status) {
        $stmt = $conn->prepare("INSERT INTO attendance (student_id, subject_id, date, status) VALUES (?, ?, CURDATE(), ?)");
        $stmt->bind_param("iis", $student_id, $subject_id, $status);
        $stmt->execute();
    }

    header("Location: mark_attendance.php?success=1");
    exit();
} else {
    header("Location: mark_attendance.php?error=1");
    exit();
}
?>
