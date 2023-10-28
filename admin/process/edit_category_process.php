<?php
session_start();
error_reporting(E_ALL);
include_once "../classes/Category.php";
    if($_POST){
        if (isset($_POST["edit_cat"])) {
            //sanitize
            $cat_title = $_POST["title"];
            $cat_desc = $_POST["desc"];
            $cat_id = $_POST["cat_id"];

            //validation



            //connect class method
            $cat = new Category();
            $cat_updated = $cat->update_category($cat_title, $cat_desc,$cat_id);
                if($cat_updated){
                    $_SESSION['cat_edit_msg'] = "Category update successful";
                    header("location:../category_list.php");
                    exit();
                }else{
                     $_SESSION['cat_edit_msg'] = "Unable to update Category";
                    //category_list.php?id=1
                    $url = "category_list.php?id=$cat_id";
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