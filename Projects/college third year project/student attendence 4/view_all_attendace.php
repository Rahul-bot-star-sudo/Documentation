<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

if (!isset($_GET['student_id'])) {
    echo "Invalid student ID.";
    exit();
}

$student_id = $_GET['student_id'];
$query = "SELECT students.name, attendance.attendance_date, attendance.status FROM attendance 
          JOIN students ON attendance.student_id = students.student_id WHERE attendance.student_id = ? 
          ORDER BY attendance.attendance_date DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->execute();
$attendance_records = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'teacher_navbar.php'; ?>
    <div class="container mt-5">
        <h2>Attendance Record for <?php echo htmlspecialchars($student['name']); ?></h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $attendance_records->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['attendance_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="teacher_attendance.php" class="btn btn-secondary">Back</a>
    </div>
</body>
</html>
