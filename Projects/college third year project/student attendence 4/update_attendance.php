<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $subject = $_POST['subject'];
    $status = $_POST['status'];

    // Update attendance record
    $update_query = "UPDATE attendance SET status = ? 
                     WHERE student_id = ? AND date = ? AND time = ? AND subject = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssss", $status, $student_id, $date, $time, $subject);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "✅ Attendance updated successfully!";
    } else {
        $_SESSION['message'] = "❌ Error updating attendance.";
    }
    
    $stmt->close();
    $conn->close();

    // Redirect back to the attendance page
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    header("Location: recorded_attendance.php");
    exit();
}
