<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['attendance']) || !isset($_POST['subject'])) {
    die("❌ Error: Invalid request.");
}

$attendance_data = $_POST['attendance'];
$subject_data = $_POST['subject'];
$teacher_id = $_SESSION['teacher_id'];
$success = true;

// ✅ Validate input data
if (empty($attendance_data) || empty($subject_data)) {
    $_SESSION['message'] = "❌ Error: Missing attendance or subject data!";
    $_SESSION['alert_class'] = "alert-danger";
    header("Location: view_teacher_attendance.php");
    exit();
}

// ✅ Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO attendance (student_id, teacher_id, subject, date, time, status) VALUES (?, ?, ?, CURDATE(), NOW(), ?)");

foreach ($attendance_data as $student_id => $status) {
    if (!isset($subject_data[$student_id]) || empty($subject_data[$student_id])) {
        $_SESSION['message'] = "❌ Error: Missing subject for student ID $student_id!";
        $_SESSION['alert_class'] = "alert-danger";
        header("Location: view_teacher_attendance.php");
        exit();
    }

    $subject = $subject_data[$student_id];

    $stmt->bind_param("ssss", $student_id, $teacher_id, $subject, $status);
    if (!$stmt->execute()) {
        $success = false;
    }
}

// ✅ Set session message
if ($success) {
    $_SESSION['message'] = "✅ Attendance successfully recorded!";
    $_SESSION['alert_class'] = "alert-success";
} else {
    $_SESSION['message'] = "❌ Error: Attendance could not be recorded!";
    $_SESSION['alert_class'] = "alert-danger";
}

// ✅ Redirect to attendance view
$stmt->close();
$conn->close();
header("Location: view_teacher_attendance.php");
exit();
?>
