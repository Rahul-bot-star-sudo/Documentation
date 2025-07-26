
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>S.B.E.S College of Science</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');

    body {
      display: flex;
      flex-direction: column;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      font-family: 'Poppins', sans-serif;
    }

    /* Navbar Custom Styling */
    .navbar {
      background: linear-gradient(45deg, #007bff, #8e44ad);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
    .navbar-brand {
      font-weight: bold;
      font-size: 24px;
      color: white !important;
    }
    .nav-link {
      font-size: 18px;
      color: white !important;
      transition: all 0.3s ease-in-out;
    }
    .nav-link:hover {
      text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
      transform: scale(1.1);
    }

    /* Centered Box */
    .container-box {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      width: 40%;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      text-align: center;
      transition: all 0.3s ease-in-out;
      background: rgba(255, 255, 255, 0.1); /* Glassmorphism */
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: white;
      margin-top: 50px;
    }
    .container-box:hover {
      transform: translateY(-5px);
    }

    /* Logo */
    .college-logo {
      max-width: 180px;
      width: 100%;
      height: auto;
      margin-bottom: 15px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease-in-out;
    }
    .college-logo:hover {
      transform: scale(1.1);
    }

    /* Buttons */
    .btn {
      width: 100%;
      margin-top: 10px;
      padding: 12px;
      font-size: 18px;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
      color: white;
    }
    
    .btn-primary {
      background: linear-gradient(135deg, #ff7eb3, #ff758c);
      border: none;
    }
    
    .btn-success {
      background: linear-gradient(135deg, #3dc1d3, #34e89e);
      border: none;
    }

    .btn-secondary {
      background: linear-gradient(135deg, #9d50bb, #6e48aa);
      border: none;
    }

    .btn:hover {
      transform: scale(1.05);
      box-shadow: 0 4px 10px rgba(255, 255, 255, 0.3);
    }

    /* Enhanced Styling for Header */
    .text-primary {
      font-weight: 700;
      letter-spacing: 3px;
      background: linear-gradient(45deg, #00c6ff, #007bff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease, letter-spacing 0.3s ease;
    }
    .text-primary:hover {
      transform: scale(1.1);
      letter-spacing: 5px;
    }

    /* Custom Text Color */
    .text-info {
      color: #ffdd57 !important;
    }

    @media (max-width: 768px) {
      .container-box {
        width: 90%;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">S.B.E.S College</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">🏠 Home</a></li>
                <li class="nav-item"><a class="nav-link" href="admin_login.php">📖 Admin login</a></li>
                <li class="nav-item"><a class="nav-link" href="teacher_login.php">📅 Teacher login</a></li>
                <li class="nav-item"><a class="nav-link" href="student_login.php">🎓 Student login</a></li>
            </ul>
        </div>
    </div>
  </nav>

  <!-- Main Content -->
  <!-- <div class="container-box">
    <img src="index.jpg" alt="College Logo" class="college-logo">
    <h2 class="text-primary">Welcome to S.B.E.S College of Science</h2>
    <button class="btn btn-primary" onclick="location.href='admin_login.php'">Admin Login</button>
    <button class="btn btn-success" onclick="location.href='teacher_login.php'">Teacher Login</button>
    <button class="btn btn-secondary" onclick="location.href='student_login.php'">Student Login</button>
    <p class="text-info mt-3">Project developed by Rahul Shinde, Aditya Thombre, Gayatri Adhane</p>
  </div> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
