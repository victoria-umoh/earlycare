<?php
session_start();
include "../classes/PlanCategory.php";


if ($_POST){
    if(isset($_POST["del_btn"])){
        $plan_cat_id = $_POST["plan_cat_id"];

        $cat = new PlanCategory();
        $deleted = $cat->delete_category($plan_cat_id);
            if($deleted){
                $_SESSION['delete_cat'] = "Category deleted successfully";
                header("location:../plan_category_list.php");
                exit();
            }else{
                $_SESSION['delete_cat'] = "Unable to delete category";
                header("location:../plan_category_list.php");
                exit();
            }


    }
}

?>