<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book Copies</title>
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
            max-width: 400px;
        }

        h2 {
            color: #333;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Book Copies</h2>
        <form action="#" method="post">
            <label for="book-id">Book ID:</label>
            <input type="text" id="book-id" name="book-id" required>

            <label for="edition">Edition:</label>
            <input type="text" id="edition" name="edition" required>

            <label for="extra-copies">total copies:</label>
            <input type="number" id="copies" name="copies" required>

            <input type="submit" value="Update">
        </form>
    </div>
</body>
</html>


<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "library_1729";


$conn = new mysqli($host, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookid = $_POST["book-id"];
    $edition = $_POST["edition"];
    $copies = $_POST["copies"];


    $sql = "UPDATE books SET copies_available = ? WHERE book_id = ? AND edition_number = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $copies, $bookid, $edition);

    if ($stmt->execute()) {
        echo "Book copies updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }


    $stmt->close();
    $conn->close();
}
?>
