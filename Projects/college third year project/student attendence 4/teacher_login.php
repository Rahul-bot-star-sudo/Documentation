<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_identifier = trim($_POST['teacher_identifier']); // Can be ID or Name
    $password = trim($_POST['password']);

    // Check if teacher exists (by ID or Name)
    $stmt = $conn->prepare("SELECT teacher_id, name, password FROM teachers WHERE teacher_id = ? OR name = ?");
    $stmt->bind_param("ss", $teacher_identifier, $teacher_identifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $teacher = $result->fetch_assoc();
        if ($password == $teacher['password']) { // Direct string comparison (⚠️ Not secure)
            $_SESSION['teacher_logged_in'] = true;
            $_SESSION['teacher_id'] = $teacher['teacher_id'];
            $_SESSION['teacher_name'] = $teacher['name'];

            // Redirect after successful login
            header("Location: teacher.php");
            exit();
        } else {
            $error_message = "❌ Invalid Password!";
        }
    } else {
        $error_message = "⚠️ Teacher not found!";
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
    <title>Teacher Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- ✅ Global CSS Include -->
</head>
<body>
<?php include 'index2.php'; ?>
    <div class="login-container">
        <h2>🔐 Teacher Login</h2>
        <?php if (isset($error_message)) : ?>
            <div class="alert"> <?php echo $error_message; ?> </div>
        <?php endif; ?>
        <form action="teacher_login.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="teacher_identifier" placeholder="👤 Teacher ID or Name" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="🔑 Password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
