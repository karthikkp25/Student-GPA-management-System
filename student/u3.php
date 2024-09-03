<?php
include("database.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $studentID = $_POST["StudentID"];
    $branchID = $_POST["BranchID"];
    $branchName = $_POST["BranchName"];

    // Update query
    $sql = "UPDATE Branch SET branch_name = '$branchName' WHERE student_id = '$studentID'";

    // Execute the query
    try {
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Branch Record</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff; /* Light Sky Blue Background */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    h2 {
        color: #333; /* Dark Gray Text Color */
    }

    form {
        max-width: 400px;
        width: 100%;
        padding: 20px;
        background-color: #fff; /* White */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333; /* Dark Gray Text Color */
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc; /* Light Gray Border */
        border-radius: 5px;
    }

    input[type="submit"] {
        background-color: #87cefa; /* Light Sky Blue Button Background */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #4682b4; /* Darker Sky Blue Button Background on Hover */
    }

    .redirect-button {
        position: absolute;
        top: 20px;
        right: 20px;
        background-color: #333; /* Dark Gray Button Background */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        cursor: pointer;
    }

    .redirect-button:hover {
        background-color: #555; /* Darker Gray Button Background on Hover */
    }
</style>
</head>
<body>
    <a href="c.php" class="redirect-button">Branches</a>

    <h2>Update Branch Record</h2>
    
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="StudentID">Student ID:</label>
        <input type="text" name="StudentID" required>
        <label for="BranchID">Branch ID:</label>
        <input type="text" name="BranchID" required>
        <label for="BranchName">Branch Name:</label>
        <input type="text" name="BranchName" required>

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
