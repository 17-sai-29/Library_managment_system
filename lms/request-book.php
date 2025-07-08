<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Book Request Form</title>
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

        input[type="text"] {
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
        <h2>Student Book Request Form</h2>
        <form action="#" method="post">
            <label for="student-id">Student ID:</label>
            <input type="text" id="student-id" name="student-id" required>

            <label for="book-name">Book Name:</label>
            <input type="text" id="book-name" name="book-name" required>

            <label for="edition-number">Edition Number:</label>
            <input type="text" id="edition-number" name="edition-number" required>

            <label for="author-name">Author Name:</label>
            <input type="text" id="author-name" name="author-name" required>

            <input type="submit" value="Submit">
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
    $student_id = $_POST["student-id"];
    $book_name = $_POST["book-name"];
    $edition_number = $_POST["edition-number"];
    $author = $_POST["author-name"];

    $sql = "INSERT INTO book_request (student_id, book_name, edition_number, author_name) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $student_id, $book_name, $edition_number, $author);

    if ($stmt->execute()) {
        echo "Book request successful.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

