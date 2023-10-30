<?php
session_start();
include "../classes/User.php";


if ($_POST) {
    if(isset($_POST["del_btn"])){
        //echo "deleted som";
        $user_id = $_POST["user_id"];

        $user = new User();
        $deleted = $user->delete_user($user_id);
        if ($deleted){
            $_SESSION['delete_msg'] = "User deleted successfully";
            header("location:../userlist.php");
            exit();
        }else{
            $_SESSION['delete_msg'] = "Unable to delete user";
            header("location:userlist.php");
            exit();
        }




















    }
}

?>