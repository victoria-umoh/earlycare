<?php
session_start();
include "../classes/Price.php";
require_once "../utilities/sanitizer.php";

if ($_POST) {
    if(isset($_POST["edit_btn"])){
       echo $price_id  = $_POST["price_id"];
       echo $price_name  = sanitizer($_POST["pname"]);
       echo $cat_price_id = sanitizer($_POST['category']);
        

            //INSTANTIATE
        $price = new Price();
        $updated = $price->update_price($price_name, $cat_price_id, $price_id);
            if($updated) {
                $_SESSION['updated'] = "price updated successfully";
                    $url = "../price_list.php?id=$price_id";
                    header("location:$url");
                exit();
            }else{
                $_SESSION['updated'] = "unable to update price ";
                header("location:../price_list.php");
                exit();
            }
    }    
}