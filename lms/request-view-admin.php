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
        <h2>Requested Books</h2>
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


$sql = "SELECT * FROM  book_request"; 


$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border='1'>";
    echo "<tr><th>student_id</th><th>book_name</th><th>edition_nmber</th><th>author_name</th></tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['student_id'] . "</td>";
        echo "<td>" . $row['book_name'] . "</td>";
        echo "<td>" . $row['edition_number'] . "</td>";
        echo "<td>" . $row['author_name'] . "</td>";
        
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    echo "No data found";
}

$conn->close();
?>