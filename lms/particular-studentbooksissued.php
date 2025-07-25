<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued Books Information</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        .container {
            background-color: #ffffff;
            border: 1px solid #dcdcdc;
            border-radius: 5px;
            padding: 20px;
            margin: 100px auto;
            max-width: 800px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Issued Books Information</h2>
        <form action="#" method="post">
            <label for="student-id">Student ID:</label>
            <input type="text" id="student-id" name="student-id" required>

        </form>
    </div>
</body>
</html>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "library_1729"; 
$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['student-id'])) {
    $student_id = $_POST['student-id'];

    $sql = "SELECT * FROM issued_books WHERE student_id = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $student_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {

            echo "<table border='1'>";
            echo "<tr><th>student_id</th><th>book_id</th><th>issued_date</th><th>due_date</th><th>fine</th></tr>";
            
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['student_id'] . "</td>";
                echo "<td>" . $row['book_id'] . "</td>";
                echo "<td>" . $row['issued_date'] . "</td>";
                echo "<td>" . $row['due_date'] . "</td>";
                echo "<td>" . $row['fine'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "No data found for this student ID.";
        }
    } else {
        echo "Failed to prepare the SQL query.";
    }
}

$conn->close();
?>


