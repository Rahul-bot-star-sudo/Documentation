
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>S.B.E.S College of Science</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: dark;
      color: white;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      text-align: center;
    }
    .container {
      background: rgba(23, 20, 20, 0.2);
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(12px);
    }
    h2 {
  font-weight: bold;
  text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
  font-size: 1.8rem;
  background: linear-gradient(45deg, #ff5733, #feb47b);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: fadeIn 1.5s ease-in-out;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

    .button-container {
      display: flex;
      flex-direction: column;
      gap: 15px;
      margin-top: 20px;
    }
    .btn-custom {
      border-radius: 30px;
      font-weight: bold;
      padding: 12px;
      width: 100%;
      transition: all 0.3s ease;
    }
    .btn-primary {
      background: #ff5733;
      border: none;
    }
    .btn-primary:hover {
      background: #cc4626;
      transform: scale(1.05);
    }
    .btn-success {
      background: #28a745;
      border: none;
    }
    .btn-success:hover {
      background: #218838;
      transform: scale(1.05);
    }
    .btn-secondary {
      background: #6c757d;
      border: none;
    }
    .btn-secondary:hover {
      background: #5a6268;
      transform: scale(1.05);
    }
    img {
  width: 120px; /* Width और Height समान */
  height: 120px;
  object-fit: cover; /* इमेज को स्क्वायर बॉक्स में फिट करेगा */
  border-radius: 10px; /* हल्का राउंडेड कोने (अगर पूरी तरह स्क्वायर चाहिए तो इसे 0px कर दें) */
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

  </style>
</head>
<body>
<?php include 'index2.php'; ?>
  <div class="container">
    <img src="index.jpg" alt="College Logo" class="img-fluid">
    <h2 class="mt-3">Welcome to S.B.E.S College of Science</h2>

    <div class="button-container">
      <button class="btn btn-primary btn-custom" onclick="location.href='admin_login.php'">Admin Login</button>
      <button class="btn btn-success btn-custom" onclick="location.href='teacher_login.php'">Teacher Login</button>
      <button class="btn btn-secondary btn-custom" onclick="location.href='student_login.php'">Student Login</button>
    </div>

    <p class="text-danger mt-3">Project developed by Rahul Shinde, Aditya Thombre, Gayatri Adhane</p>
  </div>
</body>
</html>
