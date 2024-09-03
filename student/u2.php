<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
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

    // Filter out empty grades
    $grades = array_filter([$grade1, $grade2, $grade3, $grade4, $grade5, $grade6, $grade7, $grade8]);

    // Calculate CGPA
    if (count($grades) > 0) {
        $totalGrades = array_sum($grades);
        $numberOfGrades = count($grades);
        $cgpa = $totalGrades / $numberOfGrades;
    } else {
        $cgpa = 0;
    }

    // Update query
    $sql = "UPDATE Grades SET 
            grade1 = '$grade1', 
            grade2 = '$grade2', 
            grade3 = '$grade3', 
            grade4 = '$grade4', 
            grade5 = '$grade5', 
            grade6 = '$grade6', 
            grade7 = '$grade7', 
            grade8 = '$grade8', 
            cgpa = '$cgpa' 
            WHERE student_id = '$studentID' AND branch_id = '$branchID'";

    // Execute the query
    try {
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        }
    } catch (Exception $e) {
        echo "Error updating record: " . $conn->error;
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
    <title>Update Grades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #87ceeb; /* Light Sky Blue Background */
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
            background-color: #4CAF50; /* Green Color */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049; /* Darker Green Color on Hover */
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
    <a href="g.php" class="redirect-button">Grades</a>

    <h2>Update Grades</h2>
    
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

        <input type="submit" value="Update Record">
    </form>
</body>
</html>
