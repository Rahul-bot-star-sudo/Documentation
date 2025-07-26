<?php
session_start();
include 'db.php';
include 'navbar.php';

$query = "SELECT student_id, name, class, address, contact_no, subjects FROM students";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1117; /* GitHub Dark Mode */
            color: #c9d1d9;
            font-family: 'Poppins', sans-serif;
        }
        .table {
            background-color: #161b22;
            color: #c9d1d9;
        }
        .table th {
            background-color: #21262d !important;
            color: #ffffff;
        }
        .table-hover tbody tr:hover {
            background-color: #30363d !important;
            transform: scale(1.01);
            transition: 0.2s;
        }
        .badge {
            font-size: 0.85rem;
            padding: 5px 10px;
            font-weight: bold;
            border-radius: 12px;
        }
    </style>
</head>
<body class="bg-dark">

    <div class="container mt-4">
        <h2 class="mb-4 text-center text-white fw-bold">🎓 All Students</h2>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Class</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Subjects</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td class="text-center text- fw-bold"><?= htmlspecialchars($row['student_id']); ?></td>
                            <td class="text- fw-bold"><?= htmlspecialchars($row['name']); ?></td>
                            <td class="text- fw-bold"><?= htmlspecialchars($row['class']); ?></td>
                            <td class="text- fw-bold"><?= htmlspecialchars($row['contact_no']); ?></td>
                            <td><?= htmlspecialchars($row['address']); ?></td>
                            <td class="text-center">
                                <?php 
                                    // GitHub-style colors
                                    $githubDarkColors = [
                                        'Python' => '#3572A5', 'JavaScript' => '#f1e05a', 'PHP' => '#4F5D95',
                                        'Java' => '#b07219', 'C++' => '#f34b7d', 'HTML' => '#e34c26',
                                        'CSS' => '#563d7c', 'Ruby' => '#701516', 'Swift' => '#ffac45',
                                        'Kotlin' => '#A97BFF', 'C#' => '#178600', 'Go' => '#00ADD8',
                                        'SQL' => '#e38c00', 'React' => '#61DAFB', 'Node.js' => '#339933'
                                    ];

                                    $subjects = explode(',', $row['subjects']); 

                                    foreach ($subjects as $subject) {
                                        $subject = trim($subject);
                                        $color = isset($githubDarkColors[$subject]) ? $githubDarkColors[$subject] : '#8b949e'; // Default gray for unknown subjects
                                        echo '<span class="badge mx-1" style="background-color:' . $color . '; color: #ffffff;">' . htmlspecialchars($subject) . '</span>';
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="text-center">
            <a href="add_student.php" class="btn btn-success btn-lg mt-3 fw-bold shadow">➕ Add New Student</a>
        </div>
    </div>

</body>
</html>
