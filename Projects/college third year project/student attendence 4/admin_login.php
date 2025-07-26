<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = trim($_POST['admin_name']);
    $password = trim($_POST['password']);

    if (empty($admin_name) || empty($password)) {
        $error_message = "⚠️ All fields are required!";
    } else {
        $stmt = $conn->prepare("SELECT password FROM admins WHERE admin_name = ?");
        $stmt->bind_param("s", $admin_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $admin = $result->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_name'] = $admin_name;
                header("Location: admin.php");
                exit();
            } else {
                $error_message = "❌ Invalid password!";
            }
        } else {
            $error_message = "⚠️ Admin not found!";
        }
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
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- ✅ Global CSS Include -->
</head>
<body>
<?php include 'index2.php'; ?>
    <div class="login-container">
        <h2>🔑 Admin Login</h2>
        <?php if (isset($error_message)) : ?>
            <div class="alert"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="admin_login.php" method="POST">
            <input type="text" class="form-control" name="admin_name" placeholder="👤 Admin Name" required>
            <input type="password" class="form-control" name="password" placeholder="🔒 Password" required>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
