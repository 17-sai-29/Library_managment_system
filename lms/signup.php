

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
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

label, input {
    display: block;
    margin: 10px 0;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px 20px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
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
        <h2>Student Registration</h2>
        <form form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="studentid">Student ID:</label>
            <input type="text" id="studentid" name="studentid" required>
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number" required>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Register">
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
    $studentid = $_POST["studentid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $mobile_number = $_POST["mobile_number"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "INSERT INTO student (studentid, name, email, mobile_number, username, password) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssss", $studentid, $name, $email, $mobile_number, $username, $password);

    if ($stmt->execute()) {
        echo "Student registration successful.";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
