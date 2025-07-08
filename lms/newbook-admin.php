<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
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
        <h2>Add New Book</h2>
        <form action="#" method="post">
            <label for="book-id">Book ID:</label>
            <input type="text" id="book-id" name="book-id" required>

            <label for="book-name">Book Name:</label>
            <input type="text" id="book-name" name="book-name" required>

            <label for="num-copies">Number of Copies:</label>
            <input type="number" id="num-copies" name="num-copies" required>

            <label for="author-name">Author Name:</label>
            <input type="text" id="author-name" name="author-name" required>

            <label for="edition">Edition:</label>
            <input type="text" id="edition" name="edition" required>

            <label for="year-publishing">Year of Publishing:</label>
            <input type="number" id="year-publishing" name="year-publishing" required>

            <input type="submit" value="Add Book">
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


if (isset($_POST['book-id']) && isset($_POST['book-name'])&& isset($_POST['num-copies'])&& isset($_POST['author-name'])&& isset($_POST['edition'])&& isset($_POST['year-publishing']) ) {

    $enteredbookid = $_POST['book-id'];
    $enteredbookname = $_POST['book-name'];
    $enterednumcopies = $_POST['num-copies'];
    $enterededition = $_POST['edition'];
    $enteredauthorname = $_POST['author-name'];
    $enteredyear = $_POST['year-publishing'];

    $sqlBooks = "INSERT INTO books (book_id, bookname, copies_available, edition_number) VALUES (?, ?, ?, ?)";
    $stmtBooks = $conn->prepare($sqlBooks);
    $stmtBooks->bind_param("issi", $enteredbookid, $enteredbookname, $enterednumcopies, $enterededition);
    $stmtBooks->execute();


    $sqlAuthor = "INSERT INTO author (author_name, book_id, year) VALUES (?, ?, ?)";
    $stmtAuthor = $conn->prepare($sqlAuthor);
    $stmtAuthor->bind_param("sii", $enteredauthorname, $enteredbookid, $enteredyear);
    $stmtAuthor->execute();


}
   

?>
