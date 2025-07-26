<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

$search = '';
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = trim($_GET['search']);
    
    $query = "SELECT attendance.student_id, students.name, students.class, 
                     attendance.date, attendance.status, attendance.taken_by, 
                     COALESCE(teachers.name, 'Unknown') AS teacher_name
              FROM attendance 
              JOIN students ON attendance.student_id = students.student_id 
              LEFT JOIN teachers ON attendance.taken_by = teachers.teacher_id
              WHERE students.student_id LIKE ? OR students.name LIKE ? 
              GROUP BY attendance.student_id, attendance.date, attendance.status, attendance.taken_by, teacher_name
              ORDER BY attendance.date DESC";

    $searchParam = "%$search%";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $searchParam, $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $query = "SELECT attendance.student_id, students.name, students.class, 
                     attendance.date, attendance.status, attendance.taken_by, 
                     COALESCE(teachers.name, 'Unknown') AS teacher_name
              FROM attendance 
              JOIN students ON attendance.student_id = students.student_id 
              LEFT JOIN teachers ON attendance.taken_by = teachers.teacher_id
              GROUP BY attendance.student_id, attendance.date, attendance.status, attendance.taken_by, teacher_name
              ORDER BY attendance.date DESC";
    
    $result = $conn->query($query);
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
            background: #e3f2fd;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            margin-top: 30px;
        }
        h2 {
            color: #007bff;
            text-align: center;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-box {
            width: 300px;
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 20px;
            outline: none;
        }
        .btn-search {
            background: #007bff;
            color: white;
            border-radius: 20px;
            padding: 8px 20px;
            border: none;
            margin-left: 10px;
            transition: 0.3s;
        }
        .btn-search:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        th {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 12px;
            border-radius: 5px;
        }
        td {
            text-align: center;
            vertical-align: middle;
            background: #f8f9fa;
            padding: 12px;
            border-radius: 5px;
        }
        .status-present {
            background: #28a745;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            font-weight: bold;
        }
        .status-absent {
            background: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 5px;
            font-weight: bold;
        }
        tr:hover {
            background: #d1ecf1;
            transition: 0.3s;
        }
    </style>
</head>
<body>
    <?php include 'teacher_navbar.php'; ?>
    
    <div class="container">
        <h2>📌 Attendance Records</h2>
        <div class="search-container">
            <form method="GET" action="">
                <input type="text" class="search-box" name="search" placeholder="🔍 Search by Student ID or Name" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit" class="btn btn-search">Search</button>
            </form>
        </div>
        <div class="table-container">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>📌 Student ID</th>
                        <th>👤 Name</th>
                        <th>🏫 Class</th>
                        <th>📅 Date</th>
                        <th>👨‍🏫 Taken By</th>
                        <th>✅ Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['class']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['teacher_name']); ?></td>
                            <td><?php echo ($row['status'] == 'Present') ? '<span class="status-present">Present</span>' : '<span class="status-absent">Absent</span>'; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
