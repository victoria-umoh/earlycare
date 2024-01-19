<?php
session_start();
include "../classes/Progress.php";


if ($_POST) {
    if(isset($_POST["del_btn"])){
        $progress_id  = $_POST["progress_id"];

            //INSTANTIATE
        $progress = new Progress();
        $deleted = $progress->delete_progress($progress_id);

            if($deleted) {
                $_SESSION['deleted'] = "price deleted successfully";
                    header("location:../progress_list.php");
                    exit();
            }else{
                $_SESSION['deleted'] = "unable to delete price ";
                    header("location:../progress_list.php");
                    exit();
            }
    }    
}