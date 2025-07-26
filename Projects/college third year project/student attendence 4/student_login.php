<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_identifier = trim($_POST['student_identifier']); // Can be ID or Name
    $password = trim($_POST['password']);

    // Check if student exists (by ID or Name) and verify contact number
    $stmt = $conn->prepare("SELECT student_id, name, contact_no FROM students WHERE (student_id = ? OR name = ?) AND contact_no = ?");
    $stmt->bind_param("sss", $student_identifier, $student_identifier, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $_SESSION['student_logged_in'] = true;
        $_SESSION['student_id'] = $student['student_id'];
        $_SESSION['student_name'] = $student['name'];
        
        // Redirect after successful login
        header("Location: student.php");
        exit();
    } else {
        $error_message = "❌ Invalid Student ID, Name, or Password!";
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- ✅ Global CSS Include -->
</head>
<body>
<?php include 'index2.php'; ?>
    <div class="login-container">
        <h2>🎓 Student Login</h2>
        <?php if (isset($error_message)) : ?>
            <div class="alert"> <?php echo $error_message; ?> </div>
        <?php endif; ?>
        <form action="student_login.php" method="POST">
            <input type="text" class="form-control" name="student_identifier" placeholder="👤 Student ID or Name" required>
            <input type="password" class="form-control" name="password" placeholder="📞 Mobile Number" required>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
