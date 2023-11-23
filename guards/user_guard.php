<?php
session_start();

    //if user_id is not in session, means someone is not loggged in. so check if is not set
    //check if logged in user is not an admin so you can log them out
    // If either user_id or user_role is not set, redirect to login page with a message
    if (!isset($_SESSION["user_id"]) || !isset($_SESSION["user_role"])) {
        $_SESSION['login_error'] = "You must be logged in to access this page.";
        header("location: login.php");
        exit();
}
?>
