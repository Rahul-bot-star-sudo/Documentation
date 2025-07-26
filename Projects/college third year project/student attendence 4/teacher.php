<?php
session_start();
if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

$teacher_name = $_SESSION['teacher_name']; // Fetch the teacher's name from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 80px 20px 20px;
            background: dark; /* Deep Blue Gradient */
            color: white;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            
        }

        .welcome-container {
    position: relative;
    background: url('myphoto.jpg') no-repeat center center/cover;
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    padding: 25px;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    text-align: center;
    width: 100%;
    max-width: 450px;
}

/* Dark Overlay for Better Text Readability */
.welcome-container::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Dark overlay */
    border-radius: 15px;
}

/* Ensuring text appears above overlay */
.welcome-container h2,
.welcome-container p {
    position: relative;
    z-index: 1;
}

/* Text Shadow for Better Readability */
h2, p {
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
}


        .search-bar input {
            width: 100%;
            max-width: 350px;
            padding: 12px;
            border-radius: 10px;
            border: 2px solid #fff;
            font-size: 16px;
            text-align: center;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            transition: 0.3s ease-in-out;
        }

        .search-bar input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-bar input:focus {
            background: rgba(255, 255, 255, 0.5);
            box-shadow: 0 4px 8px rgba(23, 162, 184, 0.5);
            outline: none;
            transform: scale(1.05);
        }

        .attendance-options {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .attendance-options label {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: 2px solid white;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .attendance-options label:hover {
            background-color: #ffc107;
            color: black;
            border-color: #ffc107;
        }

        .attendance-options input[type="radio"] {
            display: none;
        }

        .attendance-options input[type="radio"]:checked + label {
            background-color: #198754;
            color: white;
            border-color: #198754;
        }

        @media (max-width: 768px) {
            .welcome-container {
                width: 90%;
            }
        }
    </style>

    <script>
        function filterStudents(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("searchForm").submit();
            }
        }
    </script>
</head>
<body>
    <?php include 'teacher_navbar.php'; ?>

    <div class="container d-flex flex-column align-items-center">
        <!-- Welcome Message -->
        <div class="welcome-container">
            <h2>👋 Welcome, <?php echo htmlspecialchars($teacher_name); ?>!</h2>
            <p>Let's manage student attendance efficiently.</p>
        </div>

        <!-- Search Bar -->
        <div class="search-bar mt-4">
            <form id="searchForm" action="view_students.php" method="GET">
                <input type="text" name="search" class="form-control" placeholder="🔍 Search students..." onkeypress="filterStudents(event)">
            </form>
        </div>
    </div>
</body>
</html>
