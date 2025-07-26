<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}
$admin_name = $_SESSION['admin_name'];

include 'db.php';

// Count the total number of students
$student_count_query = $conn->query("SELECT COUNT(*) AS total_students FROM students");
$student_count = $student_count_query->fetch_assoc()['total_students'];

// Count the total number of teachers
$teacher_count_query = $conn->query("SELECT COUNT(*) AS total_teachers FROM teachers");
$teacher_count = $teacher_count_query->fetch_assoc()['total_teachers'];

// Count total attendance records
$attendance_count_query = $conn->query("SELECT COUNT(*) AS total_attendance FROM attendance");
$attendance_count = $attendance_count_query->fetch_assoc()['total_attendance'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Styles -->
    <style>
        /* Gradient Background */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            color: #fff;
        }

        .dashboard-container {
            padding: 40px;
        }

        /* Glassmorphism Effect for Cards */
        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out;
            border: none;
        }

        /* Card Hover Effect */
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.4);
        }

        .card-title {
            font-size: 1.6rem;
            font-weight: bold;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.2);
        }

        /* Buttons */
        .btn-custom {
            padding: 12px 25px;
            font-size: 1.1rem;
            border-radius: 30px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-custom:hover {
            transform: scale(1.08);
        }

        /* Icon Styling */
        .icon {
            font-size: 3.5rem;
            margin-bottom: 10px;
            text-shadow: 3px 3px 5px rgba(255, 255, 255, 0.2);
        }

        /* Stylish Heading */
        .heading {
            font-size: 2.5rem;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 20px;
            background: linear-gradient(to right, #f7b733, #fc4a1a);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 5px rgba(255, 255, 255, 0.3);
        }

        .welcome-text {
            font-size: 1.8rem;
            text-align: center;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.4);
        }
    </style>
</head>
<body>

    <?php include 'navbar.php'; ?>

    <div class="container dashboard-container">
        <h2 class="welcome-text">Welcome, <span class="text-warning"><?php echo htmlspecialchars($admin_name); ?></span>!</h2>
        
        <h2 class="heading">Dashboard Overview</h2>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <i class="fas fa-users icon text-primary"></i>
                    <h3 class="card-title">Students</h3>
                    <p class="fs-4"><?php echo $student_count; ?></p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <i class="fas fa-chalkboard-teacher icon text-success"></i>
                    <h3 class="card-title">Teachers</h3>
                    <p class="fs-4"><?php echo $teacher_count; ?></p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card p-4 shadow">
                    <i class="fas fa-check-circle icon text-warning"></i>
                    <h3 class="card-title">Attendance</h3>
                    <p class="fs-4"><?php echo $attendance_count; ?></p>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="add_student.php" class="btn btn-primary btn-lg me-2 btn-custom"><i class="fas fa-user-graduate"></i> Manage Students</a>
            <a href="add_teacher.php" class="btn btn-success btn-lg me-2 btn-custom"><i class="fas fa-user-tie"></i> Manage Teachers</a>
            <a href="admin_attendance.php" class="btn btn-warning btn-lg btn-custom"><i class="fas fa-calendar-check"></i> View Attendance</a>
        </div>
    </div>

</body>
</html>
