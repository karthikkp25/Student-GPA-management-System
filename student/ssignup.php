<?php
session_start();
include("database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_phone = $_POST['student_phone'];
    $password = $_POST['password'];

    // Insert student data into the database
    $query = "INSERT INTO Students (student_id, student_name, student_email, student_phone, password) 
              VALUES ('$student_id', '$student_name', '$student_email', '$student_phone',  '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Registration successful, redirect to login page
        header("Location: slogin.php");
        exit;
    } else {
        // Registration failed, display error message
        echo "<script>alert('Registration failed. Please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
        background-color: #f2f2f2; /* Light gray background */
        font-family: Arial, sans-serif;
    }

    form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff; /* White background for the form */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle effect */
    }

    h1 {
        color: #333333; /* Dark gray header text */
    }

    label {
        display: block;
        margin: 10px 0;
        color: #555555; /* Medium gray label text */
    }

    input {
        width: 100%;
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
    }

    a {
        color: #e74c3c; /* Red link color */
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
<body>
    <form method="post">
        <h1><center>Student Registration</center></h1>
        <label for="student_id">Student ID:</label>
        <input type="text" id="student_id" name="student_id" required><br>
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required><br>
        <label for="student_email">Email:</label>
        <input type="email" id="student_email" name="student_email" required><br>
        <label for="student_phone">Phone:</label>
        <input type="text" id="student_phone" name="student_phone" required><br>
        <label for="username">password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
        <p>Already have an account? <a href="slogin.php">Login here</a></p>
    </form>
</body>
</html>
