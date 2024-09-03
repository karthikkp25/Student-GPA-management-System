<?php
include("database.php"); // Assuming you have a database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if student_id is provided
    if (isset($_POST["student_id"]) && !empty($_POST["student_id"])) {
        $studentID = $_POST["student_id"];

        // SQL to delete the record based on student_id
        $deleteSQL = "DELETE FROM Grades WHERE student_id = '$studentID'";

        // Execute the query
        if ($conn->query($deleteSQL) === TRUE) {
            echo "Records for student ID $studentID have been deleted successfully.";
        } else {
            echo "Error deleting records: " . $conn->error;
        }
    } else {
        echo "Student ID is required.";
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
<title>Delete Student Grades</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff; /* Light sky blue */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    header {
        background-color: #333; /* Dark Gray Header Background */
        color: white;
        padding: 10px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        top: 0;
        z-index: 1000;
    }

    h1 {
        margin: 0;
    }

    .top-right {
        margin-right: 20px;
    }

    .container {
        max-width: 600px;
        margin: 80px auto; /* Increased margin for spacing below fixed header */
        padding: 20px;
        background-color: #ffffff; /* White */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn-container {
        text-align: center;
    }

    .btn {
        background-color: #87ceeb; /* Light sky blue */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin: 10px;
        text-decoration: none;
        display: inline-block;
        transition: background-color 0.3s;
    }

    .btn:hover {
        background-color: #6bb9e0; /* Darker sky blue */
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        margin-bottom: 10px;
    }

    input {
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
    }

    button {
        padding: 10px 20px;
        background-color: #87ceeb; /* Light sky blue */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    button:hover {
        background-color: #6bb9e0; /* Darker sky blue */
    }
</style>
</head>
<body>
    <header>
        <h1>Delete GPA information</h1>
        <div class="top-right">
            <a href="g.php" class="btn">Grades Page</a>
        </div>
    </header>

    <div class="container">
        <form method="post" action="">
            <label for="student_id">Enter Student ID to delete:</label>
            <input type="text" name="student_id" required>
            <button type="submit">Delete Records</button>
        </form>
    </div>
</body>
</html>
