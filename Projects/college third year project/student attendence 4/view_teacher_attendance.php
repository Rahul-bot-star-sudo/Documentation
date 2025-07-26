<?php
session_start();
include 'db.php';

if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

$selected_subject = isset($_GET['subject']) ? $_GET['subject'] : '';
$selected_class = isset($_GET['class']) ? $_GET['class'] : '';
$selected_date = isset($_GET['date']) ? $_GET['date'] : '';

// Fetch unique subjects
$subject_query = "SELECT DISTINCT subject FROM attendance";
$subject_result = $conn->query($subject_query);

// Fetch unique classes
$class_query = "SELECT DISTINCT class FROM students";
$class_result = $conn->query($class_query);

// Attendance data fetch based on selected filters
$query = "SELECT a.student_id, s.name, s.class, a.subject, a.date, a.time, a.status 
          FROM attendance a
          JOIN students s ON a.student_id = s.student_id
          WHERE 1";

if (!empty($selected_subject)) {
    $query .= " AND a.subject = '" . $conn->real_escape_string($selected_subject) . "'";
}

if (!empty($selected_class)) {
    $query .= " AND s.class = '" . $conn->real_escape_string($selected_class) . "'";
}

if (!empty($selected_date)) {
    $query .= " AND a.date = '" . $conn->real_escape_string($selected_date) . "'";
}

$query .= " ORDER BY a.date DESC, a.time DESC";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$total_records = $result->num_rows;
// Build query for total lectures per subject based on filters
$lecture_query = "SELECT subject, COUNT(DISTINCT time) as total_lectures FROM attendance a 
                  JOIN students s ON a.student_id = s.student_id WHERE 1";

// Apply filters dynamically
if (!empty($selected_subject)) {
    $lecture_query .= " AND a.subject = '" . $conn->real_escape_string($selected_subject) . "'";
}
if (!empty($selected_class)) {
    $lecture_query .= " AND s.class = '" . $conn->real_escape_string($selected_class) . "'";
}
if (!empty($selected_date)) {
    $lecture_query .= " AND a.date = '" . $conn->real_escape_string($selected_date) . "'";
}

$lecture_query .= " GROUP BY a.subject";
$lecture_result = $conn->query($lecture_query);

$lecture_data = [];
while ($row = $lecture_result->fetch_assoc()) {
    $lecture_data[$row['subject']] = $row['total_lectures'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recorded Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          body {
        background: linear-gradient(to right, #a1c4fd, #c2e9fb); /* Light Blue Gradient */
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
    }
    .container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
    h2 {
        background: linear-gradient(45deg, #4a90e2, #8e44ad); /* Blue & Purple */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: bold;
    }
    .form-select {
        border: 2px solid #4a90e2; /* Blue Border */
        transition: 0.3s;
    }
    .form-select:hover {
        border-color: #8e44ad; /* Purple Hover */
    }
    table {
        border-radius: 10px;
        overflow: hidden;
    }
    th {
        background: #4a90e2; /* Blue Headers */
        color: white;
        font-size: 18px;
        padding: 12px;
    }
    tbody tr:nth-child(odd) {
        background: #e3f2fd; /* Soft Light Blue */
    }
    tbody tr:nth-child(even) {
        background: #d1c4e9; /* Soft Lavender */
    }
    tbody tr:hover {
        background: #8e44ad !important; /* Dark Purple Hover */
        color: white;
    }
    .badge {
        font-size: 16px;
        padding: 8px 12px;
        border-radius: 20px;
    }
    .bg-success {
        background-color: #2ecc71 !important; /* Bright Green */
    }
    .bg-danger {
        background-color: #e74c3c !important; /* Bright Red */
    }
    .btn-info {
        background: #4a90e2; /* Blue Button */
        color: white;
        border-radius: 20px;
        transition: 0.3s;
    }
    .btn-info:hover {
        background: #8e44ad; /* Purple Hover */
    }
    body {
            background: linear-gradient(to right, #a1c4fd, #c2e9fb);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        h2 {
            background: linear-gradient(45deg, #4a90e2, #8e44ad);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: bold;
        }
        .btn-primary, .btn-warning {
            background: #4a90e2;
            border: none;
            color: white;
            border-radius: 20px;
            transition: 0.3s;
        }
        .btn-primary:hover, .btn-warning:hover {
            background: #8e44ad;
        }
        table {
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background: #4a90e2;
            color: white;
            font-size: 18px;
            padding: 12px;
        }
        tbody tr:nth-child(odd) {
            background: #e3f2fd;
        }
        tbody tr:nth-child(even) {
            background: #d1c4e9;
        }
        tbody tr:hover {
            background: #8e44ad !important;
            color: white;
        }
        .badge {
            font-size: 16px;
            padding: 8px 12px;
            border-radius: 20px;
        }
        .bg-success {
            background-color: #2ecc71 !important;
        }
        .bg-danger {
            background-color: #e74c3c !important;
        }

    </style>
</head><body>
<?php include 'teacher_navbar.php'; ?>

<div class="container mt-4">
    <h2 class="text-center">📋 All Recorded Attendance</h2>

    <form method="GET" action="" class="p-3 bg-light rounded shadow-sm">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="subject" class="form-label fw-bold">🎓 Subject:</label>
                <select name="subject" id="subject" class="form-select">
                    <option value="">-- Select Subject --</option>
                    <?php while ($subject = $subject_result->fetch_assoc()) { ?>
                        <option value="<?php echo htmlspecialchars($subject['subject']); ?>" 
                                <?php echo ($selected_subject == $subject['subject']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($subject['subject']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="class" class="form-label fw-bold">🏫 Class:</label>
                <select name="class" id="class" class="form-select">
                    <option value="">-- Select Class --</option>
                    <?php while ($class = $class_result->fetch_assoc()) { ?>
                        <option value="<?php echo htmlspecialchars($class['class']); ?>" 
                                <?php echo ($selected_class == $class['class']) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($class['class']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="date" class="form-label fw-bold">📅 Date:</label>
                <input type="date" name="date" id="date" class="form-control"
                       value="<?php echo htmlspecialchars($selected_date); ?>">
            </div>
            <div class="col-12 text-center mt-3">
                <button type="submit" class="btn btn-primary px-4">🔍 Apply Filter</button>
            </div>
        </div>
    </form>
    <?php if (isset($_SESSION['message'])): ?>
    <div class="alert alert-info text-center">
        <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>


    <?php if (!empty($selected_date) && $total_records == 0): ?>
        <div class="alert alert-warning text-center mt-3">
            ❌ No attendance records found for <?php echo htmlspecialchars($selected_date); ?>!
        </div>
    <?php endif; ?>

    <?php if ($total_records > 0): ?>
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>📌 Student ID</th>
                        <th>👩‍🎓 Name</th>
                        <th>🏫 Class</th>
                        <th>📚 Subject</th>
                        <th>📅 Date</th>
                        <th>⏰ Time</th>
                        <th>📋 Status</th>
                       
                        <th>🗑 Delete</th>
                        <th>✏ Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['student_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['class']); ?></td>
                            <td><?php echo htmlspecialchars($row['subject']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['time']); ?></td>
                            <td>
                                <?php if ($row['status'] == 'Present'): ?>
                                    <span class="badge bg-success">✔ Present</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">✖ Absent</span>
                                <?php endif; ?>
                            </td>
                            <td>
    <form action="delete_attendance.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this lecture?');">
        <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($row['student_id']); ?>">
        <input type="hidden" name="date" value="<?php echo htmlspecialchars($row['date']); ?>">
        <input type="hidden" name="time" value="<?php echo htmlspecialchars($row['time']); ?>">
        <input type="hidden" name="subject" value="<?php echo htmlspecialchars($row['subject']); ?>">
        <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
    </form>
    
</td><td>
    <form action="update_attendance.php" method="POST" class="d-flex">
        <input type="hidden" name="student_id" value="<?php echo htmlspecialchars($row['student_id']); ?>">
        <input type="hidden" name="date" value="<?php echo htmlspecialchars($row['date']); ?>">
        <input type="hidden" name="time" value="<?php echo htmlspecialchars($row['time']); ?>">
        <input type="hidden" name="subject" value="<?php echo htmlspecialchars($row['subject']); ?>">
        
        <select name="status" class="form-select form-select-sm me-2">
            <option value="Present" <?php echo ($row['status'] == 'Present') ? 'selected' : ''; ?>>Present</option>
            <option value="Absent" <?php echo ($row['status'] == 'Absent') ? 'selected' : ''; ?>>Absent</option>
        </select>

        <button type="submit" class="btn btn-warning btn-sm">✅ Save</button>
    </form>
</td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <tfoot>
    <tr>
        <th colspan="3">📊 Filtered Total Lectures</th>
        <?php if (!empty($lecture_data)) { ?>
            <?php foreach ($lecture_data as $subject => $total_lectures) { ?>
                <th colspan="2"><?php echo htmlspecialchars($subject); ?>: <?php echo $total_lectures; ?> ⏰</th>
            <?php } ?>
        <?php } else { ?>
            <th colspan="5" class="text-center">❌ No lectures found for selected filters.</th>
        <?php } ?>
    </tr>
</tfoot>


        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
