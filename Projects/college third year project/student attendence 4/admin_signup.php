<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php';
$signup_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = trim($_POST['admin_id']);
    $admin_name = trim($_POST['admin_name']);
    $password = trim($_POST['password']);

    if (empty($admin_id) || empty($admin_name) || empty($password)) {
        $error_message = "⚠️ All fields are required!";
    } else {
        // Check if admin already exists
        $stmt = $conn->prepare("SELECT admin_id FROM admins WHERE admin_id = ?");
        $stmt->bind_param("s", $admin_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "❌ Admin ID already exists! Please login.";
        } else {
            $stmt->close();

            // Hash password and insert new admin
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO admins (admin_id, admin_name, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $admin_id, $admin_name, $hashed_password);
            
            if ($stmt->execute()) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_name'] = $admin_name;
                $signup_success = true;
            } else {
                $error_message = "❌ Error during signup!";
            }
            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🛠 Admin Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">

    <?php include 'index2.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center text-primary fw-bold">🛠 Admin Signup</h2>
        
        <!-- Success & Error Messages -->
        <?php if (isset($error_message)) : ?>
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <?php echo $error_message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($signup_success) : ?>
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                ✅ Signup Successful! You can now <a href="admin_login.php" class="fw-bold text-success">Login</a>.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Form Card -->
        <div class="card shadow-lg border-primary mx-auto" style="max-width: 450px;">
            <div class="card-body">
                <form action="admin_signup.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">🆔 Admin ID</label>
                        <input type="text" class="form-control border-primary" name="admin_id" placeholder="Enter Admin ID" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">👤 Name</label>
                        <input type="text" class="form-control border-primary" name="admin_name" placeholder="Enter Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-dark">🔒 Password</label>
                        <input type="password" class="form-control border-primary" name="password" placeholder="Enter Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">🚀 Signup</button>
                </form>
                <button onclick="window.location.href='admin_login.php'" class="btn btn-secondary w-100 mt-2">🔑 Login</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
