<?php
session_start();
if (!isset($_SESSION['student_logged_in']) || $_SESSION['student_logged_in'] !== true) {
    header("Location: student_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: #fff;
            font-family: 'Poppins', sans-serif;
        }
        .dashboard-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        h2 {
            font-weight: 700;
            letter-spacing: 1px;
        }
        .alert {
            font-weight: 600;
            border-radius: 10px;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.2);
        }
        .btn-custom {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            transition: 0.3s ease-in-out;
        }
        .btn-custom:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="d-flex flex-column align-items-center justify-content-center vh-100">

    <?php include 'student_navbar.php'; ?>

    <div class="dashboard-card">
        <h2>🎓 Welcome, <?php echo $_SESSION['student_name']; ?>!</h2>
        
        <div class="alert alert-primary">📚 Courses Enrolled: <strong>5</strong></div>
        <div class="alert alert-warning">📝 Pending Assignments: <strong>2</strong></div>
        <div class="alert alert-danger">📅 Upcoming Exams: <strong>3</strong></div>

        <div class="d-flex justify-content-between mt-4">
            <a href="student_dashboard.php" class="btn btn-light btn-custom">⬅️ Back</a>
            <a href="index.php" class="btn btn-danger btn-custom">🚪 Logout</a>
        </div>
    </div>

</body>
</html>
