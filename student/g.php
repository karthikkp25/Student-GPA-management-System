<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grades</title>
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
        <h1>GPA Details</h1>
        <nav>
            <a href="menu.php">MENU</a>
            <a href="u2.php">UPDATE</a>
            <a href="c2.php">DELETE</a>
            <a href="i2.php">INSERT</a>
</nav>
    </header>

    <div>
        <input type="text" id="gradeSearchInput" placeholder="Search by Student ID">
        <button onclick="searchGrade()">Search</button>
    </div>

    <?php
    include("database.php");

    $sql = "SELECT * FROM Grades";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>Grade ID</th>
                    <th>Student ID</th>
                    <th>Branch ID</th>
                    <th>SGPA 1</th>
                    <th>SGPA 2</th>
                    <th>SGPA 3</th>
                    <th>SGPA 4</th>
                    <th>SGPA 5</th>
                    <th>SGPA 6</th>
                    <th>SGPA 7</th>
                    <th>SGPA 8</th>
                    <th>CGPA</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["grade_id"]."</td>
                    <td>".$row["student_id"]."</td>
                    <td>".$row["branch_id"]."</td>
                    <td>".$row["grade1"]."</td>
                    <td>".$row["grade2"]."</td>
                    <td>".$row["grade3"]."</td>
                    <td>".$row["grade4"]."</td>
                    <td>".$row["grade5"]."</td>
                    <td>".$row["grade6"]."</td>
                    <td>".$row["grade7"]."</td>
                    <td>".$row["grade8"]."</td>
                    <td>".$row["cgpa"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>

    <script>
        function searchGrade() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("gradeSearchInput");
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