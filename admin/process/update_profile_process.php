<?php
session_start();
error_reporting(E_ALL);
include_once "../classes/User.php";

if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
    }

    if (isset($_POST['submit'])) {
        $user_firstname = $_POST['fname'];
        $user_lastname = $_POST['lname'];
        $user_email = $_POST['email'];

        //echo $user_id;
        $userr = new User();
        $updated_user_detail = $userr->update_user_profile($user_id, $user_firstname, $user_lastname, $user_email);

        if ($updated_user_detail) {
            $_SESSION['update_successful'] = "Profile update successful";
            // Redirect to the profile page or show a success message.
            header("location: ../profile.php#editProfile");
        } else{
            $_SESSION['update_error'] = "An error occurred during the update or no changes were made.";
            // Redirect back to the edit profile page with an error message.
            header("location: ../profile.php#editProfile");
        }


    }
?>


