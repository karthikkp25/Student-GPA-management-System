<?php
include("database.php"); // Assuming you have a database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $studentID = $_POST["StudentID"];
    $branchID = $_POST["BranchID"];
    $grade1 = $_POST["Grade1"];
    $grade2 = $_POST["Grade2"];
    $grade3 = $_POST["Grade3"];
    $grade4 = $_POST["Grade4"];
    $grade5 = $_POST["Grade5"];
    $grade6 = $_POST["Grade6"];
    $grade7 = $_POST["Grade7"];
    $grade8 = $_POST["Grade8"];

    // Calculate CGPA
    $grades = array_filter([$grade1, $grade2, $grade3, $grade4, $grade5, $grade6, $grade7, $grade8]);
    $totalGrades = array_sum($grades);
    $numberOfGrades = count($grades);
    $cgpa = $numberOfGrades > 0 ? $totalGrades / $numberOfGrades : 0;

    // SQL to insert new record
    $insertSQL = "INSERT INTO Grades (student_id, branch_id, grade1, grade2, grade3, grade4, grade5, grade6, grade7, grade8, cgpa) 
                  VALUES ('$studentID', '$branchID', '$grade1', '$grade2', '$grade3', '$grade4', '$grade5', '$grade6', '$grade7', '$grade8', '$cgpa')";

    // Execute the query
    try {
        if ($conn->query($insertSQL) === TRUE) {
            echo "New record has been inserted successfully.";
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
<title>Add Grades</title>
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
    <h2>Add SGPA's</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" novalidate>
        <label for="StudentID">Student ID:</label>
        <input type="text" name="StudentID" required>

        <label for="BranchID">Branch ID:</label>
        <input type="text" name="BranchID" required>

        <label for="Grade1">SGPA 1:</label>
        <input type="text" name="Grade1" required>

        <label for="Grade2">SGPA 2:</label>
        <input type="text" name="Grade2" required>

        <label for="Grade3">SGPA 3:</label>
        <input type="text" name="Grade3" required>

        <label for="Grade4">SGPA 4:</label>
        <input type="text" name="Grade4" required>

        <label for="Grade5">SGPA 5:</label>
        <input type="text" name="Grade5" required>

        <label for="Grade6">SGPA 6:</label>
        <input type="text" name="Grade6" required>

        <label for="Grade7">SGPA 7:</label>
        <input type="text" name="Grade7" required>

        <label for="Grade8">SGPA 8:</label>
        <input type="text" name="Grade8" required>

        <button type="submit">Add SGPA</button>
    </form>

    <div class="redirect-btn">
        <a href="g.php">SGPA Page</a>
    </div>
</body>
</html>
