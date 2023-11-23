<?php
session_start();

    // Check if user role is not set or is not "admin"
    if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "admin") {
        $_SESSION['guard_msg'] = "You do not have admin privileges (Invalid or non-admin)";
        header("location:../login.php");
        exit();
    }

    // Check if user ID is not set
    if (!isset($_SESSION["user_id"])) {
        $_SESSION['guard_msg'] = "You do not have admin privileges (User ID not set)";
        header("location:../login.php");
        exit();
    }

    // If conditions are met, clear the guard message
    $_SESSION['guard_msg'] = "";

?>