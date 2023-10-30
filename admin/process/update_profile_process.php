<?php
session_start();
include_once "../classes/User.php";
require_once "../utilities/sanitizer.php";


if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    }

    if (isset($_POST['submit'])) {
        $user_firstname = sanitizer($_POST['fname']);
        $user_lastname = sanitizer($_POST['lname']);
        $user_email = sanitizer($_POST['email']);

        //echo $user_id;
        $userr = new User();
        $updated_user_detail = $userr->update_user_profile($user_id, $user_firstname, $user_lastname, $user_email);

        if ($updated_user_detail) {
            $_SESSION['update_successful'] = "Profile update successful";
            // header("location: ../profile.php#editProfile");
            $url = "../profile.php#editProfile?id=$user_id";
            header("location:$url");
            exit();
        } else{
            $_SESSION['update_error'] = "An error occurred during the update.";
            header("location: ../profile.php#editProfile");
        }


    }
?>


