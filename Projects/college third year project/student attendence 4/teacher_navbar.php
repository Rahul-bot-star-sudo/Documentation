<?php
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub Style Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #0d1117;
            color: #c9d1d9;
        }
        .navbar {
            background-color: #161b22;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 1.4rem;
            text-decoration: none;
        }
        .nav-links {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .nav-links li {
            margin: 0 15px;
        }
        .nav-links a {
            color: #c9d1d9;
            text-decoration: none;
            font-size: 1rem;
            transition: 0.3s;
        }
        .nav-links a:hover {
            color: #58a6ff;
        }
        .profile-img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid #c9d1d9;
        }
        .menu-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #c9d1d9;
        }
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                width: 100%;
                text-align: center;
                background-color: #161b22;
                position: absolute;
                top: 60px;
                left: 0;
                padding: 10px 0;
            }
            .nav-links.active {
                display: flex;
            }
            .nav-links li {
                margin: 10px 0;
            }
            .menu-toggle {
                display: block;
            }
        }
    </style>
    <script>
        function toggleMenu() {
            document.querySelector('.nav-links').classList.toggle('active');
        }
    </script>
</head>
<body>
    
<nav class="navbar">
    <a class="navbar-brand" href="teacher.php">📚 Teacher Dashboard</a>
    <span class="menu-toggle" onclick="toggleMenu()">&#9776;</span>
    <ul class="nav-links">
        <li><a href="teacher_attendance.php">📝 Mark Attendance</a></li>
        <li><a href="view_teacher_attendance.php">📊 View Attendance</a></li>
        <li><a href="view_teacher_student.php">👩‍🎓 View Students</a></li>
        <li><a class="text-danger" href="teacher_logout.php?redirect=index.php">🚪 Logout</a></li>
        <li>
            <a href="myphoto.jpg">
                <img class="profile-img" src="myphoto.jpg" alt="Teacher Photo">
            </a>
        </li>
    </ul>
</nav>

</body>
</html>