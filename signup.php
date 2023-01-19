<?php
session_start(); // Started the session

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Save to Database user_id, user_name, and password
        $user_id = random_num(20);
        $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";


        // The mysqli_query() function connects with database and accepts a string value representing a query as one of the parameters and, executes/performs the given query on the database.
        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="box">
        <form action="" method="post">
            <div style="font-size: 20px; margin: 10px;">Signup</div>
            <input type="text" id="text" name="user_name"><br><br>
            <input type="password" id="text" name="password"><br><br>

            <input type="submit" id="button1" value="Signup"><br><br>

            <a href="login.php">Click to Login</a><br><br>
        </form>
    </div>
</body>

</html>