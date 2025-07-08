<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Login</title>
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
        input[type="password"] {
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
        <h2>Update Student Login</h2>
        <form action="#" method="post">
            <label for="old-username">Old Username:</label>
            <input type="text" id="old-username" name="old-username" required>

            <label for="old-password">Old Password:</label>
            <input type="password" id="old-password" name="old-password" required>

            <label for="new-username">New Username:</label>
            <input type="text" id="new-username" name="new-username" required>

            <label for="new-password">New Password:</label>
            <input type="password" id="new-password" name="new-password" required>
            <input type="submit" value="Update">
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


if (isset($_POST['new-username']) && isset($_POST['new-password']) && isset($_POST['old-username']) && isset($_POST['old-password'])) {
    $newUsername = $_POST['new-username'];
    $newPassword = $_POST['new-password'];
    $oldUsername = $_POST['old-username'];
    $oldPassword = $_POST['old-password'];


    $sql = "SELECT * FROM student WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $oldUsername, $oldPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $updateSql = "UPDATE student SET username = ?, password = ? WHERE username = ? AND password = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ssss", $newUsername, $newPassword, $oldUsername, $oldPassword);
        if ($updateStmt->execute()) {
            echo "Update successful.";
        } else {
            echo "Error updating data: " . $conn->error;
        }
    } else {
        echo "Invalid old username or password. Please try again.";
    }
}

   

?>
