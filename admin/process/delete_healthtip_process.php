<?php
session_start();
include "../classes/Healthtip.php";



if ($_POST) {
    if(isset($_POST["del_btn"])){
        $healthtips_id  = $_POST["healthtips_id"];

            //INSTANTIATE
        $healthtip = new Healthtip();
        $deleted = $healthtip->delete_healthtip($healthtips_id);

            if($deleted) {
                $_SESSION['deleted_healthtip'] = "healthtip deleted successfully";
                    header("location:../healthtips_list.php");
                    exit();
            }else{
                $_SESSION['deleted_healthtip'] = "unable to delete healthtip ";
                    header("location:../healthtips_list.php");
                    exit();
            }
    }    
}