<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    //  Checking username and password empty or not
    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Read from Database
        $query = "select * from users where user_name = '$user_name' limit 1";

        //  Taking results
        $result = mysqli_query($con, $query);
        if ($result) {
            if ($result && mysqli_num_rows($result) > 0) {

                // Fetching the username and ID
                // mysqli_fetch_assoc() function fetches a result row as an associative array;
                $user_data = mysqli_fetch_assoc($result);

                // Checking password with the fetching data
                if ($user_data['password'] === $password) {

                    // Session set for user holding an id 
                    $_SESSION['user_id'] = $user_data['user_id'];

                    // Redirect to the index page
                    header("Location: index.php");
                    die;
                }
            }
        }
        // Checking the results
        echo "Wrong user name or password! ";
    } else {
        echo "Wrong user name or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div id="box">
        <form action="" method="post">
            <div style="font-size: 20px; margin: 10px;">Login</div>
            <input type="text" id="text" name="user_name"><br><br>
            <input type="password" id="text" name="password"><br><br>

            <input type="submit" id="button1" value="Login"><br><br>

            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>

</html>