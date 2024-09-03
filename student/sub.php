<?php
session_start();
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $courseID = $_POST["CourseID"];
    $courseName = $_POST["CourseName"];
    
    // Retrieve student ID from the session
    $studentID = $_SESSION['student_id'];

    // SQL to insert new record
    $insertSQL = "INSERT INTO Branch (branch_id, branch_name, student_id) 
                  VALUES ($courseID, '$courseName',   '$studentID')";

    // Execute the query
    try {
        // Check if the student ID matches with the logged-in student ID
        if ($studentID === $_POST['StudentID']) {
            if ($conn->query($insertSQL) === TRUE) {
                echo "New record has been inserted successfully.";
                header("Location: n1.php");
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        } else {
            echo "Error: Student ID mismatch. You can only insert records for your own student ID.";
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error inserting record: YOU HAVE ALREADY SUBMITTED YOUR INFORMATION";
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
<title>Insert Dtails of Branch</title>
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
        max-width: 600px; /* Extended width */
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
    <h2>Insert Branch details</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
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

        <label for="CourseName">Branch Name:</label>
        <select name="CourseName" required>
            <option value="">Select Branch Name</option>
            <option value="CS">Computer Science</option>
            <option value="AI">Artificial Intelligence</option>
            <option value="CD">Computer Design</option>
            <option value="MECH">Mechanical Engineering</option>
            <option value="CIV">Civil Engineering</option>
            <option value="EC">Electrical Engineering</option>
        </select>

        <label for="StudentID">Student ID:</label>
        <input type="text" name="StudentID" required>

        <button type="submit">Insert Record</button>
    </form>
</body>
</html>
