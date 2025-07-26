<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $conn->real_escape_string($_POST['student_id']);
    $date = $conn->real_escape_string($_POST['date']);
    $time = $conn->real_escape_string($_POST['time']);
    $subject = $conn->real_escape_string($_POST['subject']);

    // Delete Query
    $delete_query = "DELETE FROM attendance WHERE student_id = '$student_id' 
                     AND date = '$date' AND time = '$time' AND subject = '$subject'";

    if ($conn->query($delete_query) === TRUE) {
        $_SESSION['message'] = "✅ Lecture deleted successfully!";
    } else {
        $_SESSION['message'] = "❌ Error deleting lecture: " . $conn->error;
    }

    header("Location:view_teacher_attendance.php"); // Redirect back to attendance page
    exit();
}
?>
