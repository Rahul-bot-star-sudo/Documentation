<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

$teacher_id = $_SESSION['teacher_id'];
$search = '';
$student_id_filter = '';

if (isset($_GET['student_id'])) {
    $student_id_filter = trim($_GET['student_id']);
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $query = "SELECT attendance.student_id, students.name, students.class, attendance.date, attendance.status 
              FROM attendance 
              JOIN students ON attendance.student_id = students.student_id 
              WHERE students.class_teacher = ? AND (students.student_id LIKE ? OR students.name LIKE ?) 
              ORDER BY attendance.date DESC";
    $searchParam = "%$search%";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $teacher_id, $searchParam, $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
} else if (!empty($student_id_filter)) {
    $query = "SELECT attendance.student_id, students.name, students.class, attendance.date, attendance.status 
              FROM attendance 
              JOIN students ON attendance.student_id = students.student_id 
              WHERE students.class_teacher = ? AND attendance.student_id = ? 
              ORDER BY attendance.date DESC";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $teacher_id, $student_id_filter);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $query = "SELECT students.student_id, students.name, students.class, students.section, 
                 students.roll_number, students.email, students.phone, students.address, 
                 attendance.date, attendance.status 
          FROM attendance 
          JOIN students ON attendance.student_id = students.student_id 
          WHERE students.class_teacher = ? 
          ORDER BY attendance.date DESC";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $teacher_id);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'teacher_navbar.php'; ?>
    <div class="container mt-5">
        <h2>Attendance Records</h2>
        <form method="GET" action="" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Student ID or Name" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['status']); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
