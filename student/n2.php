<?php
session_start();
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $studentID = $_POST["StudentID"];
    $courseID = $_POST["CourseID"]; // Branch ID
    $grade1 = isset($_POST["Grade1"]) ? $_POST["Grade1"] : null;
    $grade2 = isset($_POST["Grade2"]) ? $_POST["Grade2"] : null;
    $grade3 = isset($_POST["Grade3"]) ? $_POST["Grade3"] : null;
    $grade4 = isset($_POST["Grade4"]) ? $_POST["Grade4"] : null;
    $grade5 = isset($_POST["Grade5"]) ? $_POST["Grade5"] : null;
    $grade6 = isset($_POST["Grade6"]) ? $_POST["Grade6"] : null;
    $grade7 = isset($_POST["Grade7"]) ? $_POST["Grade7"] : null;
    $grade8 = isset($_POST["Grade8"]) ? $_POST["Grade8"] : null;

    // Filter out null grades
    $grades = array_filter([$grade1, $grade2, $grade3, $grade4, $grade5, $grade6, $grade7, $grade8]);

    // Calculate CGPA
    $total_grades = array_sum($grades);
    $number_of_courses = count($grades);
    $cgpa = $number_of_courses > 0 ? $total_grades / $number_of_courses : 0; // Set CGPA to 0 if no grades entered

    // SQL to insert new record
    $insertSQL = "INSERT INTO Grades (student_id, branch_id, grade1, grade2, grade3, grade4, grade5, grade6, grade7, grade8, cgpa) 
                  VALUES ('$studentID', $courseID, '$grade1', '$grade2', '$grade3', '$grade4', '$grade5', '$grade6', '$grade7', '$grade8', $cgpa)";

    // Execute the query
    try {
        if ($conn->query($insertSQL) === TRUE) {
            echo "New record has been inserted successfully.";
            header("Location: menu3.php");
        } 
    } catch (mysqli_sql_exception $e) {
        echo "Error inserting record: " . $e->getMessage();
    }
}

// Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert Grades</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #87CEEB; /* Light sky blue */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    h2 {
        color: #333; /* Dark gray text color */
    }

    form {
        max-width: 600px; /* Increased width for the form */
        margin: 20px auto;
        padding: 20px;
        background-color: #ffffff; /* White */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    label {
        margin-bottom: 10px;
        color: #333; /* Dark gray text color */
    }

    input, select {
        padding: 8px;
        margin-bottom: 15px;
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

    .redirect-btn {
        margin-top: 15px;
    }

    .redirect-btn a {
        text-decoration: none;
        padding: 10px 20px;
        background-color: #4CAF50; /* Green color */
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .redirect-btn a:hover {
        background-color: #45a049; /* Darker green color on hover */
    }
</style>
</head>
<body>
    <h2>Insert SGPA</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <label for="StudentID">Student ID:</label>
        <input type="text" name="StudentID" value="<?php echo isset($_SESSION['student_id']) ? $_SESSION['student_id'] : ''; ?>" readonly required>

        <!-- Include branch ID selection -->
        <label for="CourseID">Branch ID:</label>
        <select name="CourseID" required>
            <option value="">Select Branch ID</option>
            <option value="1">CS</option>
            <option value="2">AI</option>
            <option value="3">CD</option>
            <option value="4">MECH</option>
            <option value="5">CIV</option>
            <option value="6">EC</option>
        </select>

        <label for="Grade1">SGPA 1:</label>
        <input type="text" name="Grade1" required>

        <label for="Grade2">SGPA 2:</label>
        <input type="text" name="Grade2">

        <label for="Grade3">SGPA  3:</label>
        <input type="text" name="Grade3">

        <label for="Grade4">SGPA 4:</label>
        <input type="text" name="Grade4">

        <label for="Grade5">SGPA 5:</label>
        <input type="text" name="Grade5">

        <label for="Grade6">SGPA  6:</label>
        <input type="text" name="Grade6">

        <label for="Grade7">SGPA  7:</label>
        <input type="text" name="Grade7">

        <label for="Grade8">SGPA 8:</label>
        <input type="text" name="Grade8">

        <button type="submit">Insert Record</button>
    </form>
</body>
</html>
