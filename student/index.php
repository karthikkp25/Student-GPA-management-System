<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student GPA Management System</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff; /* Light sky blue */
        margin: 0;
        padding: 0;
    }

    .header {
        background-color: #87ceeb; /* Light sky blue */
        padding: 20px;
        text-align: center;
    }

    h1 {
        margin: 0;
        color: #fff; /* White */
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff; /* White */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .btn {
        background-color: #87ceeb; /* Light sky blue */
        color: #fff; /* White */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        margin-right: 10px;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #6bb9e0; /* Darker sky blue */
    }

    .opening-hours {
        text-align: center;
        margin-top: 20px;
    }
</style>
</head>
<body>

<div class="header">
    <h1>Student GPA Management System</h1>
</div>

<div class="container">
    <h2>Welcome to our system!</h2>
    <p>This is the place where you can manage student GPAs.</p>
    <p>Our system is accessible for both students and faculty members.</p>

    <div class="opening-hours">
        <p>EXPLORE THE GPA DATA</p>
    </div>

    <div style="text-align: center;">
        <a href="slogin.php" class="btn">Student Login</a>
        <a href="flogin.php" class="btn">Faculty Login</a>
    </div>
</div>

</body>
</html>
