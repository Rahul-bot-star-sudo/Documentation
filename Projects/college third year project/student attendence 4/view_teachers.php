<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'navbar.php';
include 'db.php';

$result = $conn->query("SELECT * FROM teachers");

// Function to assign a specific color to each subject
function getSubjectColor($subject) {
    $subjectColors = [
        'Mathematics' => 'primary',  // Blue
        'Science' => 'success',      // Green
        'English' => 'warning',      // Yellow
        'History' => 'danger',       // Red
        'Geography' => 'info',       // Light Blue
        'Computer Science' => 'dark' // Dark Gray
    ];

    return $subjectColors[$subject] ?? 'secondary'; // Default color if subject not listed
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Teachers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1117; /* Dark mode background */
            color: #c9d1d9; /* Light gray text */
        }
        .table-container {
            background: #161b22;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
        }
        .table {
            background: #0d1117;
            color: #c9d1d9;
        }
        .table th {
            background-color: #21262d !important;
            color:rgb(202, 216, 233);
            font-weight: bold;
            text-align: center;
        }
        .table-hover tbody tr:hover {
            background-color:rgb(199, 211, 228) !important;
            color: white;
            transform: scale(1.02);
            transition: all 0.2s ease-in-out;
        }
        h2 {
            font-weight: bold;
            color:rgb(221, 226, 232);
        }
        .badge {
            font-size: 0.9rem;
            padding: 6px 10px;
            font-weight: bold;
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-gradient bg-dark">

    <div class="container mt-4">
        <h2 class="text-center">👩‍🏫 Teacher Records 📚</h2>
        <div class="table-container ">
            <div class="table-responsive">
                <table class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th>Teacher ID</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Classes</th>
                            <th>Address</th>
                            <th>Contact No</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td class="fw-bold text-center"><?php echo htmlspecialchars($row['teacher_id']); ?></td>
                                <td class="fw-bold"><?php echo htmlspecialchars($row['name']); ?></td>
                                <td class="text-center">
                                    <span class="badge bg-<?php echo getSubjectColor($row['subject']); ?>">
                                        <?php echo htmlspecialchars($row['subject']); ?>
                                    </span>
                                </td>
                                <td class="fw-bold"><?php echo isset($row['assigned_classes']) ? htmlspecialchars($row['assigned_classes']) : 'N/A'; ?></td>
                                <td><?php echo htmlspecialchars($row['address']); ?></td>
                                <td class="fw-bold"><?php echo htmlspecialchars($row['contact_no']); ?></td>
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td class="text-center">
                                    <span class="badge bg-<?php echo ($row['gender'] == 'Male') ? 'primary' : 'danger'; ?>">
                                        <?php echo htmlspecialchars($row['gender']); ?>
                                    </span>
                                </td>
                                <td class="text-center fw-bold"><?php echo htmlspecialchars($row['age']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
