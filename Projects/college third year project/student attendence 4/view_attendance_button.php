<?php
session_start();
include 'db.php';
include 'navbar.php';
// Ensure database connection is working
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Get Student ID from search or button click
$student_id = isset($_GET['search_student']) ? trim($_GET['search_student']) : '';

$attendance_percentage = null; // Default value

if (!empty($student_id)) {
    // Fetch attendance records
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
    $result = false; // No results if no Student ID provided
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
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--bs-primary), var(--bs-info));
            color: black;
            padding: 20px;
        }

        .container {
            background: var(--bs-light);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            max-width: 900px;
            margin: auto;
            text-align: center;
        }

        h2 {
            font-weight: 700;
            margin-bottom: 20px;
        }

        .table th {
            background: var(--bs-primary);
            color: white;
            text-align: center;
        }

        .table td {
            text-align: center;
            font-weight: 500;
        }

        .status-present {
            background: var(--bs-success);
            color: white;
            padding: 5px 10px;
            border-radius: 8px;
        }

        .status-absent {
            background: var(--bs-danger);
            color: white;
            padding: 5px 10px;
            border-radius: 8px;
        }

        .status-late {
            background: var(--bs-warning);
            color: black;
            padding: 5px 10px;
            border-radius: 8px;
        }

        .btn-view {
            padding: 5px 12px;
            border-radius: 5px;
            background: var(--bs-info);
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .percentage-box {
            font-size: 20px;
            font-weight: bold;
            background: var(--bs-secondary);
            color: white;
            padding: 10px;
            border-radius: 10px;
            display: inline-block;
            margin-top: 10px;
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

    <div class="container mt-4">
        <h2 class="text-primary">📅 Attendance Records</h2>

        <!-- Search Box -->
        <form method="GET" action="" class="search-container d-flex justify-content-center">
            <input type="text" name="search_student" class="form-control w-75 me-2" placeholder="🔍 Enter Student ID to Search" value="<?php echo htmlspecialchars($student_id); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <!-- Students List -->
        <h4 class="mt-4 text-info">All Students</h4>
        <table class="table table-bordered table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $studentQuery = "SELECT student_id, name, class FROM students ORDER BY name ASC";
                $students = $conn->query($studentQuery);
                while ($student = $students->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($student['name']); ?></td>
                        <td><?php echo htmlspecialchars($student['class']); ?></td>
                        <td>
                            <a href="?search_student=<?php echo urlencode($student['student_id']); ?>" class="btn btn-info">View Attendance</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php if ($result && $result->num_rows > 0) { ?>
        <h4 class="mt-4 text-success">Attendance Details</h4>

        <!-- Attendance Percentage Box -->
        <div class="percentage-box">
            Attendance Percentage: <?php echo $attendance_percentage !== null ? $attendance_percentage . '%' : 'N/A'; ?>
        </div>

        <table class="table table-bordered table-hover mt-3">
            <thead class="bg-primary text-white">
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
                                } else {
                                    echo "<span class='status-late'>Late</span>";
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>

</body>
</html>
