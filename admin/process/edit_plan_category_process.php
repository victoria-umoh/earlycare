<?php
session_start();
include_once "../classes/PlanCategory.php";
require_once "../utilities/sanitizer.php";

    if($_POST){
        if (isset($_POST["edit_cat"])) {
            //sanitize
            $plan_cat_title = sanitizer($_POST["title"]);
            $plan_cat_desc = sanitizer($_POST["desc"]);
            $plan_cat_id = $_POST["plan_cat_id"];

            //validation



            //connect class method
            $cat = new PlanCategory();
            $cat_updated = $cat->update_category($plan_cat_title, $plan_cat_desc, $plan_cat_id);
                if($cat_updated){
                    $_SESSION['cat_edit_msg'] = "Category update successful";
                    header("location:../plan_category_list.php");
                    exit();
                }else{
                     $_SESSION['cat_edit_msg'] = "Unable to update Category";
                    //category_list.php?id=1
                    $url = "../plan_category_list.php?id=$plan_cat_id";
                    header("location:$url");
                    exit();
                }













        }else{
            header("location:../category_list.php");
            exit();
        }


    }else{
        header("location:../category_list.php");
        exit();
    }







?>