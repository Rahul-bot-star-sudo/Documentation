<?php
session_start();
include 'db.php';

// ✅ Ensure teacher is logged in
if (!isset($_SESSION['teacher_logged_in']) || $_SESSION['teacher_logged_in'] !== true) {
    header("Location: teacher_login.php");
    exit();
}

$teacher_id = $_SESSION['teacher_id'];
$teacher_name = $_SESSION['teacher_name'];

// ✅ Fetch assigned subjects for the teacher
$teacher_subjects = [];
$subject_query = "SELECT subject FROM teachers WHERE teacher_id = ?";
$stmt_subject = $conn->prepare($subject_query);
$stmt_subject->bind_param("s", $teacher_id);
$stmt_subject->execute();
$result_subject = $stmt_subject->get_result();

while ($row = $result_subject->fetch_assoc()) {
    $teacher_subjects[] = $row['subject'];
}
$stmt_subject->close();

// ✅ Fetch assigned classes for the teacher
$assigned_classes = [];
$class_query = "SELECT assigned_classes FROM teachers WHERE teacher_id = ?";
$stmt_class = $conn->prepare($class_query);
$stmt_class->bind_param("s", $teacher_id);
$stmt_class->execute();
$result_class = $stmt_class->get_result();

if ($row = $result_class->fetch_assoc()) {
    if (!empty($row['assigned_classes'])) {
        $assigned_classes = explode(", ", $row['assigned_classes']); // Convert string to array
    }
}
$stmt_class->close();

// ✅ Get selected class & subject
$selected_class = $_GET['class'] ?? '';
$selected_subject = $_GET['subject'] ?? '';

$students = [];

if (!empty($selected_class) && !empty($selected_subject)) {
    $search_query = "SELECT student_id, name, class, subjects FROM students WHERE class = ? AND FIND_IN_SET(?, subjects)";
    $stmt = $conn->prepare($search_query);
    $stmt->bind_param("ss", $selected_class, $selected_subject);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
    $stmt->close();  // ✅ Close the statement
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
           :root {
        --primary-color: #4c67ff;  /* Vibrant Blue */
        --secondary-color: #13c4a3; /* Teal */
        --accent-color: #a64dff; /* Soft Purple */
    }

    body {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        font-family: 'Poppins', sans-serif;
        min-height: 100vh;
    }
    .container {
        max-width: 850px;
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    }
    .table {
        background: #ffffff;
        border-radius: 8px;
        overflow: hidden;
    }
    .table th {
        background-color: var(--primary-color);
        color: white;
        padding: 12px;
        text-transform: uppercase;
    }
    .table tbody tr:nth-child(odd) {
        background-color: #e0f7fa; /* Light Cyan */
    }
    .table tbody tr:nth-child(even) {
        background-color: #ede7f6; /* Soft Lavender */
    }
    .table tbody tr:hover {
        background: var(--accent-color) !important; /* Purple Highlight */
        color: white;
    }
    .form-select {
        border: 2px solid var(--primary-color);
        transition: 0.3s ease-in-out;
    }
    .form-select:hover, .form-select:focus {
        border-color: var(--accent-color);
    }
    .btn-primary {
        background-color: var(--secondary-color); /* Teal Button */
        border-color: var(--secondary-color);
        border-radius: 8px;
        font-weight: bold;
        transition: 0.3s ease;
    }
    .btn-primary:hover {
        background-color: var(--accent-color); /* Purple Hover */
        border-color: var(--accent-color);
    }
    .btn-outline-secondary {
        border: 2px solid var(--primary-color);
        color: var(--primary-color);
        transition: 0.3s ease;
    }
    .btn-outline-secondary:hover {
        background-color: var(--primary-color);
        color: white;
    }
    .alert-primary {
        background-color: var(--primary-color);
        color: white;
        border-color: #0039a6;
        font-size: 16px;
        border-radius: 8px;
    }

    </style>
</head>
<body>
    <?php include 'teacher_navbar.php'; ?>

    <div class="container mt-3">
        <div class="alert alert-primary text-center">
            👋 Welcome, <strong><?php echo htmlspecialchars($teacher_name); ?></strong>  
            <p>Your assigned subjects: <strong><?php echo implode(", ", array_map("htmlspecialchars", $teacher_subjects)); ?></strong></p>
        </div>

        <!-- ✅ Class & Subject Selection -->
        <form method="GET" action="" class="mb-3">
            <div class="row">
                <?php if (!empty($assigned_classes)) : ?>
                    <div class="mb-3">
                        <label class="form-label">📚 Select Class:</label>
                        <select class="form-control" name="class" onchange="this.form.submit()">
                            <option value="">-- Select Class --</option>
                            <?php
                            foreach ($assigned_classes as $class) {
                                $selected = ($selected_class == $class) ? 'selected' : '';
                                echo "<option value='" . htmlspecialchars($class) . "' $selected>" . htmlspecialchars($class) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                <?php endif; ?>

                <div class="col-md-6">
                    <label for="subject" class="form-label">📌 Select Subject:</label>
                    <select name="subject" id="subject" class="form-select" onchange="this.form.submit()" <?php echo empty($selected_class) ? 'disabled' : ''; ?>>
                        <option value="">-- Select Subject --</option>
                        <?php foreach ($teacher_subjects as $subject) { ?>
                            <option value="<?php echo htmlspecialchars($subject); ?>" 
                                <?php echo ($selected_subject == $subject) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($subject); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </form>

        <!-- ✅ Show Students Only When Class & Subject Selected -->
        <?php if (!empty($selected_class) && !empty($selected_subject)) { ?>
            <?php if (count($students) > 0) { ?>
                <form action="submit_attendance.php" method="POST">
                    <input type="hidden" name="selected_subject" value="<?php echo htmlspecialchars($selected_subject); ?>">
                    <input type="hidden" name="selected_class" value="<?php echo htmlspecialchars($selected_class); ?>">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Subjects</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($student['student_id']); ?></td>
                                    <td><?php echo htmlspecialchars($student['name']); ?></td>
                                    <td><?php echo htmlspecialchars($student['class']); ?></td>
                                    <td><?php echo htmlspecialchars($student['subjects']); ?></td>
                                    <td>
                                        <input type="hidden" name="subject[<?php echo $student['student_id']; ?>]" value="<?php echo htmlspecialchars($selected_subject); ?>">
                                        <input type="radio" name="attendance[<?php echo $student['student_id']; ?>]" value="Present"> ✔ Present
                                        <input type="radio" name="attendance[<?php echo $student['student_id']; ?>]" value="Absent" checked> ✖ Absent
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary w-100">📌 Submit Attendance</button>
                </form>
            <?php } else { ?>
                <div class="alert alert-warning text-center">⚠ कोई स्टूडेंट इस क्लास और सब्जेक्ट के लिए नहीं मिला।</div>
            <?php } ?>
        <?php } else { ?>
            <div class="alert alert-info text-center">ℹ कृपया पहले क्लास और सब्जेक्ट चुनें।</div>
        <?php } ?>
    </div>
</body>
</html>
