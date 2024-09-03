<?php
include("database.php"); // Assuming you have a database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if course_id is provided
    if (isset($_POST["branch_id"]) && !empty($_POST["branch_id"])) {
        $courseID = $_POST["course_id"];

        // SQL to delete the record based on course_id
        $deleteSQL = "DELETE FROM Branch WHERE branch_id = $courseID";

        // Execute the query
        if ($conn->query($deleteSQL) === TRUE) {
            echo "Record with course_id $courseID has been deleted successfully.";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Course ID is required.";
    }
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Course Record</title>
<style>
    /* Your CSS styles here */
</style>
</head>
<body>
    <header>
        <h1>Delete Course Record</h1>
        <div class="top-right">
            <a href="courses.php" class="btn">Courses Page</a>
        </div>
    </header>

    <div class="container">
        <form method="post" action="">
            <label for="branch_id">Enter Branch ID to delete:</label>
            <input type="number" name="branch_id" required>
            <button type="submit">Delete Record</button>
        </form>
    </div>
</body>
</html>
