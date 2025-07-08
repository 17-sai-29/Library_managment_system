<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
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

        .forgot-signup {
            margin-top: 10px;
        }

        .forgot-signup a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Login</h2>
        <form form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="Login">
        </form>
        <div class="forgot-signup">
            <a href="#">Forgot Password?</a> | <a href="signup.html">Sign Up</a>
        </div>
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


if (isset($_POST['username']) && isset($_POST['password'])) {

    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    if (isValidUser($enteredUsername, $enteredPassword, $conn)) {
        header("Location: student-homepage.html");
        exit();
    } else {

        $errorMessage = "Invalid username or password. Please try again.";
    }
}


function isValidUser($enteredUsername, $enteredPassword, $conn) {

    $sql = "SELECT * FROM student WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $enteredUsername, $enteredPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        return true; 
    } else {
        return false; 
    }
}
?>
