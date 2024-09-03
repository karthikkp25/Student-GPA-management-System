<?php
session_start();
include("database.php");

// Assuming "database.php" contains the code to establish a MySQL connection
// Example: $conn = mysqli_connect("hostname", "username", "password", "database_name");
// Make sure to replace "hostname", "username", "password", and "database_name" with your actual database details.

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['student_id'];
    $password = $_POST['password'];

    // Query the database to check if the credentials are valid
    $query = "SELECT * FROM Students WHERE student_id = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // User authenticated successfully, set username session variable
        $_SESSION['student_id'] = $username;

        // Redirect to home page or any other desired page
        header("Location: menu2.php");
        exit;
    } else {
        // Authentication failed, display error message
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Light gray background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle effect */
        }

        h1 {
            color: #333333; /* Dark gray header text */
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0;
            color: #555555; /* Medium gray label text */
        }

        input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc; /* Light gray border */
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db; /* Blue submit button */
            color: #ffffff; /* White text on the button */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9; /* Darker blue on hover */
        }

        p {
            margin-top: 15px;
            color: #555555;
            text-align: center;
        }

        a {
            color: #e74c3c; /* Red link color */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form method="post">
        <h1>Login</h1>
        <label for="student_id">student id:</label>
        <input type="text" id="username" name="student_id" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
        <p>Don't have an account? <a href="ssignup.php">Sign Up here</a></p>
    </form>
</body>
</html>
