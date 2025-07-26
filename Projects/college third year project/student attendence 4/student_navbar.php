<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Custom Styling -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

    .navbar {
        background: linear-gradient(135deg, #283c86, #45a247); /* Deep Blue to Green Gradient */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        padding: 15px;
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
        color: white !important;
        transition: transform 0.3s ease-in-out;
    }

    .navbar-brand:hover {
        transform: scale(1.1);
    }

    .navbar-nav .nav-item {
        margin: 0 8px;
    }

    .navbar-nav .nav-link {
        color: white !important;
        font-size: 1.1rem;
        padding: 10px 15px;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
    }

    /* Logout Button */
    .nav-link.text-danger {
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        color: white !important;
        padding: 10px 15px;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
    }

    .nav-link.text-danger:hover {
        background: linear-gradient(135deg, #c31432, #240b36);
        transform: scale(1.1);
    }

    /* Profile Image */
    .profile-img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid white;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
        transition: transform 0.3s ease-in-out;
    }

    .profile-img:hover {
        transform: scale(1.2);
    }

    /* Responsive Navbar */
    @media (max-width: 768px) {
        .navbar-nav {
            flex-direction: column;
            align-items: center;
        }
        .navbar-nav .nav-item {
            margin: 8px 0;
        }
    }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="student.php">🎓 Student Portal</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link btn btn-primary" href="mydetail.php">📋 My Details</a></li>
                <li class="nav-item"><a class="nav-link btn btn-success" href="student_attendance.php">📊 View Attendance</a></li>
                <li class="nav-item"><a class="nav-link btn btn-warning" href="">📚 View Courses</a></li>
                <li class="nav-item"><a class="nav-link btn btn-info" href="">📞 Contact Support</a></li>
                <li class="nav-item"><a class="nav-link text-danger fw-bold" href="index.php">🚪 Logout</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="myphoto.jpg">
                        <img src="myphoto.jpg" alt="Profile Photo" class="profile-img">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Space for fixed navbar -->
<div class="mb-4"></div>
