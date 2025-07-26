<?php
session_start();
include 'db.php';
include 'teacher_navbar.php';

if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Fetch class list from database
$classListQuery = "SELECT DISTINCT class FROM students ORDER BY class ASC";
$classList = $conn->query($classListQuery);

$student_id = isset($_GET['search_student']) ? trim($_GET['search_student']) : '';
$class_filter = isset($_GET['class_filter']) ? trim($_GET['class_filter']) : '';
$attendance_percentage = null;

// Fetch students based on class filter
$studentQuery = "SELECT student_id, name, class FROM students";
$params = [];
if (!empty($class_filter)) {
    $studentQuery .= " WHERE class = ?";
    $params[] = $class_filter;
}
$studentQuery .= " ORDER BY name ASC";

$stmt = $conn->prepare($studentQuery);
if (!empty($params)) {
    $stmt->bind_param("s", ...$params);
}
$stmt->execute();
$students = $stmt->get_result();

// Fetch attendance if student ID is provided
if (!empty($student_id)) {
    $query = "SELECT attendance.student_id, students.name, students.class, attendance.date, attendance.status 
              FROM attendance 
              JOIN students ON attendance.student_id = students.student_id 
              WHERE attendance.student_id = ? 
              ORDER BY attendance.date DESC";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Calculate Attendance Percentage
    $total_classes_query = "SELECT COUNT(*) AS total FROM attendance WHERE student_id = ?";
    $present_classes_query = "SELECT COUNT(*) AS present FROM attendance WHERE student_id = ? AND status = 'Present'";

    $stmt = $conn->prepare($total_classes_query);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $total_classes_result = $stmt->get_result();
    $total_classes = $total_classes_result->fetch_assoc()['total'];

    $stmt = $conn->prepare($present_classes_query);
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $present_classes_result = $stmt->get_result();
    $present_classes = $present_classes_result->fetch_assoc()['present'];

    if ($total_classes > 0) {
        $attendance_percentage = round(($present_classes / $total_classes) * 100, 2);
    }
} else {
    $result = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body {
            background: linear-gradient(135deg, #001F3F, #0056b3); /* Dark Blue Gradient */
            color: white;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        h2 {
            color: #FFD700; /* Gold */
            font-weight: 700;
            text-align: center;
        }

        h4 {
            color: #17A2B8; /* Cyan */
            text-align: center;
        }

        .table {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background: #0056b3; /* Dark Blue */
            color: white;
        }

        .btn-primary {
            background: #17A2B8;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #138496;
        }
    
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-warning">📚 Attendance Records</h2>

        <!-- Search & Filter Form -->
        <form method="GET" action="" class="row g-3 mb-4">
            <!-- Class Selection -->
            <div class="col-md-4">
                <select name="class_filter" class="form-select">
                    <option value="">🔽 Select Class</option>
                    <?php while ($class = $classList->fetch_assoc()) { ?>
                        <option value="<?= htmlspecialchars($class['class']); ?>" 
                            <?= ($class_filter == $class['class']) ? "selected" : ""; ?>>
                            <?= htmlspecialchars($class['class']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <!-- Student Search -->
            <div class="col-md-4">
                <input type="text" name="search_student" class="form-control" placeholder="🔍 Enter Student ID" value="<?= htmlspecialchars($student_id); ?>">
            </div>

            <div class="col-md-4 text-end">
                <button type="submit" class="btn btn-primary px-4">Filter</button>
            </div>
        </form>

        <!-- Students Table -->
        <h4 class="text-light">All Students</h4>
        <table class="table table-bordered table-hover text-white">
            <thead class="table-dark">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($student = $students->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($student['student_id']); ?></td>
                        <td><?= htmlspecialchars($student['name']); ?></td>
                        <td><?= htmlspecialchars($student['class']); ?></td>
                        <td>
                            <a href="?search_student=<?= urlencode($student['student_id']); ?>&class_filter=<?= urlencode($class_filter); ?>" class="btn btn-info btn-sm">View Attendance</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Attendance Records -->
        <?php if ($result && $result->num_rows > 0) { ?>
        <h4 class="text-success">Attendance Details</h4>

        <div class="alert alert-warning">
            Attendance Percentage: <strong><?= $attendance_percentage !== null ? $attendance_percentage . '%' : 'N/A'; ?></strong>
        </div>

        <table class="table table-bordered table-hover text-white">
            <thead class="table-dark">
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
                        <td><?= htmlspecialchars($row['student_id']); ?></td>
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td><?= htmlspecialchars($row['class']); ?></td>
                        <td><?= htmlspecialchars($row['date']); ?></td>
                        <td>
                            <span class="badge <?= strtolower($row['status']) == "present" ? 'bg-success' : (strtolower($row['status']) == "absent" ? 'bg-danger' : 'bg-warning text-dark'); ?>">
                                <?= htmlspecialchars($row['status']); ?>
                            </span>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
</body>
</html>  