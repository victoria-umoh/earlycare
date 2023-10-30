<?php
session_start();
include "../classes/Category.php";


if ($_POST){
    if(isset($_POST["del_btn"])){
        $cat_id = $_POST["cat_id"];

        $cat = new Category();
        $deleted = $cat->delete_category($cat_id);
            if($deleted){
                $_SESSION['delete_cat'] = "Category deleted successfully";
                header("location:../category_list.php");
                exit();
            }else{
                $_SESSION['delete_cat'] = "Unable to delete category";
                header("location:../category_list.php");
                exit();
            }


    }
}

?>