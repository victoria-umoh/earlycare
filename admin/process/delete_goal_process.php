<?php
session_start();
include "../classes/Goal.php";


if ($_POST){
    if(isset($_POST["del_btn"])){
        $goal_id = $_POST["goal_id"];

        $goal = new Goal();
        $deleted = $goal->delete_goal($goal_id);
            if($deleted){
                $_SESSION['delete_goal'] = "Goal deleted successfully";
                header("location:../goal_list.php");
                exit();
            }else{
                $_SESSION['delete_goal'] = "error, unable to delete goal";
                header("location:../goal_list.php");
                exit();
            }


    }
}

?>