<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Information</title>
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
            max-width: 600px;
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
        <h2>Book Information</h2>
        
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


$sql = "SELECT * FROM  books "; 


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
    echo "<table border='1'>";
    echo "<tr><th>book_id</th><th>bookname</th><th>copies_available</th><th>edition</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['book_id'] . "</td>";
        echo "<td>" . $row['bookname'] . "</td>";
        echo "<td>" . $row['copies_available'] . "</td>";
        echo "<td>" . $row['edition_number'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No data found";
}


$conn->close();
?>