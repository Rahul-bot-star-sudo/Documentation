<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar {
            background-color: rgba(42, 45, 62, 0.9) !important;
            backdrop-filter: blur(10px);
        }
        .navbar-brand img {
            width: 50px;
            height: auto;
        }
        .dropdown-menu {
            background-color: #2a2d3e;
        }
        .dropdown-item {
            color: white !important;
        }
        .dropdown-item:hover {
            background-color: #50597b !important;
        }
    </style>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    ☰
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="index.php">Home</a></li>
                    <!-- <li><a class="dropdown-item btn-dark" href="student_problem.php">Student Problem</a></li> -->
                    <li><a class="dropdown-item" href="admin_login.php">Admin Login</a></li>
                    <li><a class="dropdown-item" href="teacher_login.php">Teacher Login</a></li>
                    <li><a class="dropdown-item" href="student_login.php">Student Login</a></li>
                </ul>
            </div>
            <a class="navbar-brand mx-auto" href="index3.php">
                <img src="index.jpg" alt="Logo">
            </a>
            <a href="#" class="btn btn-dark border-white">Student Attendance</a>
        </div>
    </nav>
</body>
</html>