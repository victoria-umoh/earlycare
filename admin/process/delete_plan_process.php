<?php
session_start();
error_reporting(E_ALL);
include "../classes/Plan.php";
if ($_POST) {
    if(isset($_POST["del_btn"])){
        $plan_id  = $_POST["plan_id"];

            //INSTANTIATE
        $plan = new Plan();
        $deleted = $plan->delete_plan($plan_id);

            if($deleted) {
                $_SESSION['deleted'] = "plan deleted successfully";
                    header("location:../plan_list.php");
                    exit();
            }else{
                $_SESSION['deleted'] = "unable to delete plan ";
                    header("location:../plan_list.php");
                    exit();
            }
    }    
}