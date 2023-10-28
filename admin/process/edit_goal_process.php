<?php
session_start();
error_reporting(E_ALL);
include_once "../classes/Goal.php";
include_once "../utilities/sanitizer.php";
    if($_POST){
        if (isset($_POST["edit_goal"])) {
            //sanitize
            $goal_title = sanitizer($_POST["title"]);
            $goal_description = sanitizer($_POST["desc"]);
            $goal_id = $_POST["goal_id"];

            //validation



            //connect class method
            $goal = new Goal();
            $goal_updated = $goal->update_goal($goal_title, $goal_description, $goal_id);
                if($goal_updated){
                    $_SESSION['goal_edit'] = "Goal update successful";
                    header("location:../goal_list.php");
                    exit();
                }else{
                     $_SESSION['goal_edit'] = "error, unable to update goal";
                    //category_list.php?id=1
                    $url = "goal_list.php?id=$goal_id";
                    header("location:$url");
                    exit();
                }













        }else{
            header("location:../goal_list.php");
            exit();
        }


    }else{
        header("location:../goal_list.php");
        exit();
    }







?>