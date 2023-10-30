<?php
session_start();
require_once "../utilities/sanitizer.php";
include_once "../classes/Healthtip.php";


    if($_POST){
        if (isset($_POST["edit_btn"])) {
            //sanitize
            $healthtips_title = sanitizer($_POST["title"]);
            $healthtips_description = sanitizer($_POST["desc"]);
            $healthtips_id = $_POST["healthtips_id"];

            //validation



            //connect class method
            $cat = new Healthtip();
            $updated = $cat->update_healthtip($healthtips_title, $healthtips_description, $healthtips_id);
                if($updated){
                    $_SESSION["edit_healthtips"] = "Health-tips updated successfully";
                    header("location:../healthtips_list.php");
                    exit();
                }else{
                     $_SESSION["edit_healthtips"] = "error, health-tips update failed";
                    //category_list.php?id=1
                    $url = "../healthtips_list.php?id=$healthtips_id";
                    header("location:$url");
                    exit();
                }




        }else{
            header("location:../healthtips_list.php");
            exit();
        }


    }else{
        header("location:../healthtips_list.php");
        exit();
    }







?>