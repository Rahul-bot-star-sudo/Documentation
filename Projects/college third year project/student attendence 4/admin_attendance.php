<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}


include 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

ob_end_flush(); // Flush output buffer (optional)
?>

<?php
include 'navbar.php';
include 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

$classList = $conn->query("SELECT * FROM classes")->fetch_all(MYSQLI_ASSOC);
$subjectList = $conn->query("SELECT * FROM subjects")->fetch_all(MYSQLI_ASSOC);

$class_id = $_GET['class_id'] ?? "";
$subject_id = $_GET['subject_id'] ?? "";
$class_month = $_GET['class_month'] ?? "";
$search = $_GET['search'] ?? "";

// Attendance fetch query
$query = "SELECT attendance.student_id, students.name, students.class, attendance.date, 
                 attendance.status,attendance.time, attendance.subject 
          FROM attendance 
          JOIN students ON attendance.student_id = students.student_id 
          WHERE 1=1";

$params = [];

if (!empty($class_id)) {
    $query .= " AND students.class = ?";
    $params[] = $class_id;
}
if (!empty($subject_id)) {
    $query .= " AND attendance.subject = ?";
    $params[] = $subject_id;
}
if (!empty($class_month)) {
    $query .= " AND attendance.date LIKE ?";
    $params[] = "$class_month%";
}
if (!empty($search)) {
    $query .= " AND (students.student_id LIKE ? OR students.name LIKE ?)";
    $searchParam = "%$search%";
    $params[] = $searchParam;
    $params[] = $searchParam;
}
$attendance_date = $_GET['attendance_date'] ?? "";

if (!empty($attendance_date)) {
    $query .= " AND attendance.date = ?";
    $params[] = $attendance_date;
}

$query .= " ORDER BY attendance.date DESC";

$stmt = $conn->prepare($query);
if (!empty($params)) {
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #24292e;
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }
        .filter-form, .table-container {
            background: #2b3137;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .form-control, .form-select {
            background: #3c4045;
            color: white;
            border: 1px solid #58a6ff;
        }
        .form-control::placeholder {
            color: #b1b1b1;
        }
        .table {
            color: white;
        }
        .table thead {
            background: #161b22;
        }
        .table thead th {
            color:rgb(163, 46, 46);
        }
        .badge-success {
            background-color: #28a745 !important;
        }
        .badge-danger {
            background-color: #dc3545 !important;
        }
        .btn-primary {
            background-color: #238636;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2ea043;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center text-light fw-bold">Attendance Report</h2>
        
        <!-- Filter Form -->
        <form method="GET" action="" class="mb-4 row filter-form">
            <div class="col-md-3">
                <label class="form-label">Class</label>
                <select name="class_id" class="form-select">
                    <option value="">All Classes</option>
                    <?php foreach ($classList as $class): ?>
                        <option value="<?= htmlspecialchars($class['class_name']) ?>" 
                            <?= ($class_id == $class['class_name']) ? "selected" : "" ?>>
                            <?= htmlspecialchars($class['class_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Subject</label>
                <select name="subject_id" class="form-select">
                    <option value="">All Subjects</option>
                    <?php foreach ($subjectList as $subject): ?>
                        <option value="<?= htmlspecialchars($subject['subject_name']) ?>" 
                            <?= ($subject_id == $subject['subject_name']) ? "selected" : "" ?>>
                            <?= htmlspecialchars($subject['subject_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Date</label>
                <input type="date" name="attendance_date" class="form-control" value="<?= htmlspecialchars($_GET['attendance_date'] ?? ''); ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Month</label>
                <input type="month" name="class_month" class="form-control" value="<?= $class_month ?>">
            </div>

            <div class="col-md-3">
                <label class="form-label">Search</label>
                <input type="text" name="search" class="form-control" placeholder="Search by ID or Name" value="<?= htmlspecialchars($search); ?>">
            </div>

            <div class="col-md-12 text-end mt-3">
                <button type="submit" class="btn btn-primary px-4">Filter</button>
            </div>
        </form>

        <!-- Attendance Table -->
        <div class="table-container">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Subject</th>
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
                            <td><?= htmlspecialchars($row['time']); ?></td>
                            <td><?= htmlspecialchars($row['subject']); ?></td>
                            <td>
                                <span class="badge <?= $row['status'] === 'Present' ? 'badge-success' : 'badge-danger' ?>">
                                    <?= htmlspecialchars($row['status']); ?>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
