<?php
session_start();
include("database.php");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$studentID = '';
$branchID = '';
$branchName = 'Unknown';
$courseDescription = 'Unknown';
$message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $studentID = $_POST["student_id"];

    // Query to retrieve student details from the Branch table based on entered student ID
    $sql = "SELECT * FROM Branch WHERE student_id = '$studentID'";
    $result = $conn->query($sql);

    // Check if a student with the entered student ID exists in the Branch table
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $branchID = $row['branch_id'];
        $branchName = $row['branch_name'];
        // Check if the entered student ID matches with the logged-in student ID
        if ($_SESSION['student_id'] === $studentID) {
            $message = 'Student ID matches with logged-in student ID.';
        } else {
            $message = 'You are not authorized to view this student\'s details.';
            // Reset details if not authorized
            $studentID = '';
            $branchID = '';
            $branchName = 'Unknown';
        }
    } else {
        $message = 'Student ID not found.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Details</title>
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

    .details-container {
        padding: 20px;
        background-color: #fff; /* White */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h2 {
        color: #333; /* Dark gray text color */
    }

    p {
        margin-top: 10px;
        color: #333; /* Dark gray text color */
    }
</style>
</head>
<body>
    <div class="details-container">
        <h2>Enter Student ID</h2>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" value="<?php echo $studentID; ?>" required>
            <button type="submit">Submit</button>
        </form>
        <hr>
        <h2>Student Details</h2>
        <p><?php echo $message; ?></p>
        <p><strong>Student ID:</strong> <?php echo $studentID; ?></p>
        <p><strong>Branch ID:</strong> <?php echo $branchID; ?></p>
        <p><strong>Branch Name:</strong> <?php echo $branchName; ?></p>
        <form>
        <div class="btn-container">
            <a href="menu2.php" class="btn">Menu</a>
            <!-- Add more buttons as needed -->
        </div>
        </form>
    </div>
</body>
</html>
