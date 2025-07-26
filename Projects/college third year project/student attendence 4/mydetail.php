<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db.php';

if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true) {
    header("Location: student_login.php");
    exit();
}

$student_id = $_SESSION['student_id']; 

// Fetch student details
$stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
$stmt->bind_param("s", $student_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Database Error: " . $conn->error);
}

$student = $result->num_rows > 0 ? $result->fetch_assoc() : [];

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Styling -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');
        
        body {
            background: linear-gradient(135deg, #4B79A1, #283E51); /* Deep Blue to Dark Gray */
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
            width: 90%;
            max-width: 650px;
            text-align: center;
            color: black;
        }

        h2 {
            color: #FFD700; /* Gold */
            font-weight: 700;
            margin-bottom: 25px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .table th {
            background: linear-gradient(135deg, #FFD700, #FFA500); /* Gold to Orange */
            color: black;
            text-transform: uppercase;
            font-size: 1rem;
        }

        .table th, .table td {
            padding: 14px;
            color: black;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .table tr:hover {
            background: rgba(255, 215, 0, 0.2); /* Gold Hover */
            transition: 0.3s ease-in-out;
        }

        .btn-primary {
            background: linear-gradient(135deg, #17E9E0, #008080); /* Cyan to Teal */
            border: none;
            padding: 12px 20px;
            font-size: 1.1rem;
            border-radius: 10px;
            transition: 0.3s ease-in-out;
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #14C4C2, #005757);
            transform: scale(1.05);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 25px;
            }

            .table th, .table td {
                font-size: 0.95rem;
                padding: 10px;
            }

            .btn-primary {
                font-size: 1rem;
                padding: 10px 16px;
            }
        }
    </style>
</head>
<body>
    <?php include 'student_navbar.php'; ?>
    
    <div class="container mt-5">
        <h2>📌 My Details</h2>
        <table class="table table-bordered">
            <tr><th>🎓 Student ID</th><td><?= htmlspecialchars($student['student_id'] ?? 'N/A'); ?></td></tr>
            <tr><th>👤 Name</th><td><?= htmlspecialchars($student['name'] ?? 'N/A'); ?></td></tr>
            <tr><th>🏠 Address</th><td><?= htmlspecialchars($student['address'] ?? 'N/A'); ?></td></tr>
            <tr><th>📞 Contact No</th><td><?= htmlspecialchars($student['contact_no'] ?? 'N/A'); ?></td></tr>
            <tr><th>✉️ Email</th><td><?= htmlspecialchars($student['email'] ?? 'N/A'); ?></td></tr>
            <tr><th>⚧ Gender</th><td><?= htmlspecialchars($student['gender'] ?? 'N/A'); ?></td></tr>
            <tr><th>🎂 Date of Birth</th><td><?= htmlspecialchars($student['dob'] ?? 'N/A'); ?></td></tr>
            <tr><th>🏫 Class</th><td><?= htmlspecialchars($student['class'] ?? 'N/A'); ?></td></tr>
        </table>
        <a href="student.php" class="btn btn-primary mt-3">🔙 Back to Dashboard</a>
    </div>
</body>
</html>
