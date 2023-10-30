<?php

//if user_id is not in session, means someone is not loggged in. so check if is not set
    if (!isset($_SESSION["user_id"])) {
        header("location:../login.php");
        exit();
    }

//check if logged in user is not an admin so you can log them out
if (!isset($_SESSION["user_role"])) {
    header("location:../login.php");
    exit();
}
?>