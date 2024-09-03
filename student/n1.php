<?php
include("database.php"); // Assuming you have a database connection file
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $enrollmentID = $_POST["EnrollmentID"];
    $studentID = $_POST["StudentID"];
    $courseID = $_POST["BranchID"];
    $enrollmentDate = $_POST["EnrollmentDate"];
    
    // Retrieve student ID from the session
    $loggedInStudentID = $_SESSION['student_id'];

    // Check if the student ID from the form matches the logged-in student ID
    if ($studentID != $loggedInStudentID) {
        echo "Error: You are not authorized to insert values for this student.";
        exit;
    }

    // SQL to insert new record
    $insertSQL = "INSERT INTO Enrollments ( student_id, branch_id, enrollment_date) 
                  VALUES ( '$studentID', $courseID, '$enrollmentDate')";

    // Execute the query
    try {
        if ($conn->query($insertSQL) === TRUE) {
            echo "New record has been inserted successfully.";
            header("Location: n2.php");
        } 
    } catch (mysqli_sql_exception $e) {
        echo "Error inserting record: " . $e->getMessage();
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
<title>Insert Enrollment</title>
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
        max-width: 400px;
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
    <h2>Insert Enrollment</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

        <label for="StudentID">Student ID:</label>
        <input type="text" name="StudentID" value="<?php echo isset($_SESSION['student_id']) ? $_SESSION['student_id'] : ''; ?>" readonly required>

        <label for="BranchID">Branch ID:</label>
        <select name="BranchID" required>
            <option value="<?php echo isset($_SESSION['branch_id']) ? $_SESSION['branch_id'] : ''; ?>" readonly>Select Branch ID</option>
            <option value="1">CS</option>
            <option value="2">AI</option>
            <option value="3">CD</option>
            <option value="4">MECH</option>
            <option value="5">CIV</option>
            <option value="6">EC</option>
        </select>


        <label for="EnrollmentDate">Enrollment Date:</label>
        <input type="date" name="EnrollmentDate" required>

        <button type="submit">Insert Record</button>
    </form>
</body>
</html>
