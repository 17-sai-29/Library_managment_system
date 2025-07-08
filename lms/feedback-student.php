<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Feedback Form</title>
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
        textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }

        textarea {
            height: 150px; /* You can adjust the height as needed */
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
        <h2>Student Feedback Form</h2>
        <form action="#" method="post">
            <label for="student-id">Student ID:</label>
            <input type="text" id="student-id" name="student-id" required>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" required></textarea>

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
    $studentid = $_POST["student-id"];
    $feedback = $_POST["feedback"];

    $sql = "INSERT INTO feedback (student_id, feedback) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $studentid, $feedback);

    if ($stmt->execute()) {
        echo "feedback sent successful.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
