<?php

session_start();


// If any is set, then unset it, logout will happen.
if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
}


header("Location: login.php");
die;
