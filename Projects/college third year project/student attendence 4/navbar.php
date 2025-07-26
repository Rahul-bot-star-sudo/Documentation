<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub Style Navbar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #24292e;
            padding: 10px 20px;
        }
        .navbar-brand {
            color: #ffffff;
            font-weight: bold;
            font-size: 1.4rem;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            margin: 0 10px;
            font-size: 1rem;
            transition: 0.3s;
        }
        .navbar-nav .nav-link:hover {
            color: #58a6ff;
        }
        .nav-item .dropdown-menu {
            background-color: #2b3137;
            border: none;
        }
        .dropdown-item {
            color: white;
        }
        .dropdown-item:hover {
            background-color: #3c4045;
        }
        .search-bar {
            width: 300px;
        }
        .profile-img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 2px solid white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fab fa-github"></i> Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="admin.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_teacher.php">Teachers</a></li>
                    <li class="nav-item"><a class="nav-link" href="add_student.php">Students</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">More</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link " href="subject.php">Add Subject</a></li>
                            <li class="nav-item"><a class="nav-link " href="class.php">Add Class</a></li>
                            <li class="nav-item"><a class="nav-link " href="view_teachers.php">View Teachers</a></li>
                            <li class="nav-item"><a class="nav-link " href="admin_student.php">View Students</a></li>
                            <li class="nav-item"><a class="nav-link " href="admin_attendance.php">View Attendance</a></li>
                            <li class="nav-item"><a class="nav-link text-danger fw-bold" href="admin_signup.php">Signup</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex search-bar">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link text-danger" href="index.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <img src="myphoto.jpg" alt="Admin" class="profile-img">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>
