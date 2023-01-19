<?php

function check_login($con)
{

    if (isset($_SESSION['user_id'])) {                                         // Step-1: Check the id is set or not!
        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";           // Step-2: Checking process of id in database using query
        $result = mysqli_query($con, $query);                                   // Step-3: query gives you a result, id is in database or not!

        if ($result && mysqli_num_rows($result) > 0) {   // Step-4: Checking the result and checking if the number of rows is larger than zero!
            $user_data = mysqli_fetch_assoc($result);    // Step-5: mysqli_fetch_assoc() function fetches a result row as an associative array;    assoc = Assicciative array
            return $user_data;
        }
    }

    // Redirect to Login
    // else hobe ki??
    header("Location: login.php");
    die;
}


function random_num($length)
{
    $text = "";
    if ($length < 5) {
        $length = 5;
    }

    // rand(0,10) - Picks a random number from 0 to 10
    $len = rand(4, $length);

    for ($i = 0; $i < $len; $i++) {
        #Code...

        $text .= rand(0, 9);
        // .= means concetination 
        // $txt1 = "Hello";
        // $txt2 = " world!";
        // $txt1 .= $txt2; 
    }
    return $text;
}
