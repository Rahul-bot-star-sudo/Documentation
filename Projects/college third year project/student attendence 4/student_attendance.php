<?php
session_start();
include 'db.php';

if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true) {
    header("Location: student_login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

$query = "SELECT attendance.student_id, students.name, students.class, attendance.date, attendance.status 
          FROM attendance 
          JOIN students ON attendance.student_id = students.student_id 
          WHERE attendance.student_id = ? 
          ORDER BY attendance.date DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Attendance Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: black;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            backdrop-filter: blur(15px);
            max-width: 900px;
            margin: auto;
        }

        h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 30px;
            color: black;
            text-shadow: 2px 2px 6px rgba(255, 255, 255, 0.5);
        }

        .table {
            background: rgba(255, 255, 255, 1);
            border-radius: 12px;
            overflow: hidden;
        }

        .table th {
            background: linear-gradient(135deg, #ff6a00, #ff9000);
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
            font-weight: 500;
            color: black;
        }

        .status-present {
            background: #4caf50;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-weight: bold;
        }

        .status-absent {
            background: #e53935;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-weight: bold;
        }

        .status-late {
            background: #ffeb3b;
            color: black;
            padding: 5px 10px;
            border-radius: 12px;
            font-weight: bold;
        }

        .status-upcoming {
            background: #4e73df;
            color: white;
            padding: 5px 10px;
            border-radius: 12px;
            font-weight: bold;
        }

        .btn-logout {
            background: linear-gradient(135deg, #ff0077, #ff6a00);
            color: white;
            padding: 12px 30px;
            border-radius: 12px;
            border: none;
            font-weight: 700;
            font-size: 16px;
            margin-top: 20px;
            transition: transform 0.3s;
        }

        .btn-logout:hover {
            transform: scale(1.05);
            background: linear-gradient(135deg, #ff6a00, #ff0077);
        }

        @media (max-width: 768px) {
            .container {
                width: 100%;
                padding: 20px;
            }

            .table th, .table td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <?php include 'student_navbar.php'; ?>

    <div class="container mt-4">
        <h2>📅 My Attendance Records</h2>
        <table class="table table-bordered table-hover">
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
                        <td>
                            <?php 
                                $status = strtolower($row['status']);
                                if ($status == "present") {
                                    echo "<span class='status-present'>Present</span>";
                                } elseif ($status == "absent") {
                                    echo "<span class='status-absent'>Absent</span>";
                                } elseif ($status == "late") {
                                    echo "<span class='status-late'>Late</span>";
                                } else {
                                    echo "<span class='status-upcoming'>Upcoming</span>";
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <button onclick="window.location.href='logout.php'" class="btn btn-logout">🚪 Logout</button>
    </div>

</body>
</html>
