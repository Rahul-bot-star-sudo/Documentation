<?php
session_start();
include 'db.php';
include 'navbar.php';
if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

$teacher_id = $_SESSION['teacher_id'];
$search = '';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $query = "SELECT student_id, name, class, contact_no FROM students WHERE class_teacher = ? AND (student_id LIKE ? OR name LIKE ?)";
    $searchParam = "%$search%";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $teacher_id, $searchParam, $searchParam);
} else {
    $query = "SELECT student_id, name, class, contact_no FROM students WHERE class_teacher = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $teacher_id);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: black;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h2 {
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-box {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ddd;
            text-align: center;
            transition: all 0.3s ease-in-out;
        }

        .search-box:focus {
            box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.6);
            border-color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        th {
            background: #007bff;
            color: white;
            padding: 12px;
            border-radius: 8px 8px 0 0;
        }

        td {
            background: #f8f9fa;
            padding: 12px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        tr:hover td {
            background: #e3e6f3;
            transform: scale(1.01);
        }

        .btn-view {
            background: #007bff;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-view:hover {
            background: #0056b3;
            transform: scale(1.05);
        }

    </style>
</head>
<body>
    <?php include 'teacher_navbar.php'; ?>

    <div class="container">
        <h2>📋 Student List</h2>

        <!-- Search Box -->
        <form id="searchForm" method="GET" action="" class="search-container">
            <input type="text" id="searchBox" name="search" class="search-box" placeholder="🔍 Search by Student ID or Name" onkeypress="filterStudents(event)" value="<?php echo htmlspecialchars($search); ?>">
        </form>

        <!-- Student Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>📌 Student ID</th>
                    <th>👤 Name</th>
                    <th>🏫 Class</th>
                    <th>📞 Contact No</th>
                    <th>🔍 Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                        <td><?php echo htmlspecialchars($row['contact_no']); ?></td>
                        <td>
                            <a href="view_attendance_button.php" class="btn-view">View Attendance</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
        function filterStudents(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("searchForm").submit();
            }
        }
    </script>
</body>
</html>
