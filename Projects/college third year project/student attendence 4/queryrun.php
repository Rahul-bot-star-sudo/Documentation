<?php
// Database connection
$servername = "localhost"; // Change this if you're using a different host
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "attendence_system_4"; // Replace with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$feedback = ""; // To store the feedback (success/error message)
$results = ""; // To store the results of the query execution

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = $_POST['query']; // Get the query from the input field

    // Execute the query
    if ($query) {
        $result = $conn->query($query);

        if ($result) {
            if ($result->num_rows > 0) {
                // Fetch and display result
                $results .= "<table class='table'>";
                $results .= "<tr>";

                // Print column names
                $columns = $result->fetch_fields();
                foreach ($columns as $column) {
                    $results .= "<th>" . $column->name . "</th>";
                }
                $results .= "</tr>";

                // Print rows
                while ($row = $result->fetch_assoc()) {
                    $results .= "<tr>";
                    foreach ($row as $value) {
                        $results .= "<td>" . $value . "</td>";
                    }
                    $results .= "</tr>";
                }
                $results .= "</table>";
            } else {
                $feedback = "Query executed successfully, but no results returned.";
            }
        } else {
            $feedback = "Error: " . $conn->error;
        }
    } else {
        $feedback = "Please enter a SQL query.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Query Runner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Run SQL Query</h2>

        <!-- Display feedback message -->
        <?php if ($feedback): ?>
            <div class="alert alert-info"><?= $feedback ?></div>
        <?php endif; ?>

        <!-- Form to input SQL query -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="query" class="form-label">Enter SQL Query:</label>
                <textarea class="form-control" id="query" name="query" rows="4" required><?= isset($_POST['query']) ? $_POST['query'] : '' ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Run Query</button>
        </form>

        <!-- Display query results -->
        <?php if ($results): ?>
            <h3 class="mt-4">Query Results</h3>
            <?= $results ?>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
