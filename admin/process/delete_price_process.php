<?php
session_start();
error_reporting(E_ALL);
include "../classes/Price.php";
if ($_POST) {
    if(isset($_POST["del_btn"])){
        $price_id  = $_POST["price_id"];

            //INSTANTIATE
        $price = new Price();
        $deleted = $price->delete_price($price_id);

            if($deleted) {
                $_SESSION['deleted'] = "price deleted successfully";
                    header("location:../price_list.php");
                    exit();
            }else{
                $_SESSION['deleted'] = "unable to delete price ";
                    header("location:../price_list.php");
                    exit();
            }
    }    
}