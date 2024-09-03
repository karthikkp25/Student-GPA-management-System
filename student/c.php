<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Courses</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f8ff; /* Light Skyblue Background */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    header {
        background-color: #87ceeb; /* Skyblue Header Background */
        padding: 10px;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    h1 {
        color: #333; /* Dark Gray Text Color */
    }

    nav {
        display: flex;
        gap: 15px;
    }

    nav a {
        padding: 8px 16px;
        background-color: #87ceeb; /* Skyblue Button Background */
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }

    nav a:hover {
        background-color: #4682b4; /* Darker Skyblue Button Background on Hover */
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: white;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: #87ceeb; /* Skyblue Header Background */
        color: white;
    }

    input[type="text"] {
        padding: 8px;
        margin-right: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        padding: 8px 16px;
        background-color: #87ceeb; /* Skyblue Button Background */
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #4682b4; /* Darker Skyblue Button Background on Hover */
    }
</style>
</head>
<body>
    <header>
        <h1>Branch Enrollment Details</h1>
        <nav>
            <a href="menu.php">MENU</a>
            <a href="u3.php">UPDATE</a>
            <a href="c3.php">DELETE</a>
            <a href="i3.php">INSERT</a>
        </nav>
        </nav>
    </header>

    <div>
        <input type="text" id="courseSearchInput" placeholder="Search by Branch Name">
        <button onclick="searchCourse()">Search</button>
    </div>

    <?php
    include("database.php");

    $sql = "SELECT * FROM Branch";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>BRANCH ID</th>
                    <th>Branch Name</th>
                    <th>Student ID</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["branch_id"]."</td>
                    <td>".$row["branch_name"]."</td>
                    <td>".$row["student_id"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <script>
        function searchCourse() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("courseSearchInput");
            filter = input.value.toUpperCase();
            table = document.querySelector("table");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>
</html>
