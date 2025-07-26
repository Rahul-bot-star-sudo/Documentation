<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include 'db.php'; // Include database connection
include 'navbar.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject_name = trim($_POST['subject_name']);

    if (!empty($subject_name)) {
        $stmt = $conn->prepare("INSERT INTO subjects (subject_name) VALUES (?)");
        $stmt->bind_param("s", $subject_name);
        
        if ($stmt->execute()) {
            $success_message = "Subject added successfully!";
        } else {
            $error_message = "Error adding subject!";
        }
        $stmt->close();
    } else {
        $error_message = "Please enter a subject name.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Subject</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #24292e;
            color: white;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            background: #2b3137;
            padding: 20px;
            border-radius: 8px;
            color: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #58a6ff;
        }
        .btn-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .btn-primary, .btn-secondary {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            color: white;
            text-align: center;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: 0.3s ease-in-out;
        }
        .btn-primary {
            background-color: #58a6ff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #4a90e2;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            background: #3c4045;
            color: white;
            border: 1px solid #58a6ff;
            border-radius: 5px;
        }
        .form-control:focus {
            background: #3c4045;
            color: white;
            border-color: #58a6ff;
            box-shadow: none;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
        }
        .success {
            background-color: #28a745;
            color: white;
        }
        .error {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Add New Subject</h2>

        <!-- Success & Error Messages -->
        <?php if (!empty($success_message)) { ?>
            <div class="message success">
                <?= $success_message ?>
            </div>
        <?php } ?>
        
        <?php if (!empty($error_message)) { ?>
            <div class="message error">
                <?= $error_message ?>
            </div>
        <?php } ?>

        <!-- Subject Add Form -->
        <form method="POST" action="">
            <div>
                <label for="subject_name">Subject Name</label>
                <input type="text" id="subject_name" name="subject_name" class="form-control" required>
            </div>
            <br>
            <div class="btn-container">
                <button type="submit" class="btn-primary">Add Subject</button>
                <a href="admin.php" class="btn-secondary">Back</a>
            </div>
        </form>
    </div>

</body>
</html>

