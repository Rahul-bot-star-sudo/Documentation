<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #141e30, #243b55);
            color: white;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            margin: 0;
            overflow: hidden;
        }
        .navbar {
            background-color: rgba(42, 45, 62, 0.9) !important;
            backdrop-filter: blur(10px);
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand img {
            width: 60px;
            height: auto;
        }
        .container h1 {
            font-size: 3.5rem;
            font-weight: 800;
            text-transform: uppercase;
            background: linear-gradient(45deg, #ff9a9e, #fad0c4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .btn-glow {
            background: linear-gradient(45deg, #ff416c, #ff4b2b);
            color: white;
            font-weight: bold;
            border-radius: 30px;
            padding: 14px 30px;
            font-size: 1.2rem;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 0 20px rgba(255, 65, 108, 0.8);
        }
        .btn-glow:hover {
            background: linear-gradient(45deg, #ff6a00, #ee0979);
            box-shadow: 0 0 25px rgba(255, 106, 0, 1);
        }
        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
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
                    <li><a class="dropdown-item btn-dark" href="index.php">Home</a></li>
                    <li><a class="dropdown-item btn-dark" href="admin_login.php">Admin Login</a></li>
                    <!-- <li><a class="dropdown-item btn-dark" href="#">Student Attendance</a></li> -->
                    <li><a class="dropdown-item btn-dark" href="teacher_login.php">Teacher Login</a></li>
                    <li><a class="dropdown-item btn-dark" href="student_login.php">Student Login</a></li>
                </ul>
            </div>
            <a class="navbar-brand mx-auto" href="index3.php">
                <img src="index.jpg" alt="Logo">
            </a>
            <a href="#" class="btn btn-dark border-white">Student Attendance</a>
        </div>
    </nav>
    
    <div class="container text-center mt-5 pt-5 fade-in">
        <h1>Welcome to Student Attendance System</h1>
        <p style="font-size: 1.2rem; max-width: 600px; margin: auto;">Track and manage student attendance with ease. Our system ensures accuracy and efficiency for both teachers and students.</p>
        
        <h1>Coming Soon</h1>
        <p style="font-size: 1.2rem;">We are working hard to launch our website. Stay tuned!</p>
        <a href="#" class="btn btn-glow mt-4">Get Notified</a>
    </div>
</body>
</html>
