<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Response Submitted</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4; /* Light gray */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .message {
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
    }

    .button {
        padding: 10px 20px;
        background-color: #007bff; /* Blue */
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
    }

    .button:hover {
        background-color: #0056b3; /* Darker blue on hover */
    }
</style>
</head>
<body>
    <div class="message">
        <h2>Your Response has been Submitted</h2>
        <p>Thank you for your submission.</p>
        <a href="response.php" class="button">View Your Information</a>
        <a href="response2.php" class="button">View Your About Branch</a>
        <a href="response3.php" class="button">View Your About Marks</a>
    </div>
</body>
</html>
