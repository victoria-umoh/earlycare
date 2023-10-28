<?php
session_start();
error_reporting(E_ALL);
include "../classes/Price.php";
if ($_POST) {
    if(isset($_POST["edit_btn"])){
       echo $price_id  = $_POST["price_id"];
       echo $price_name  = $_POST["pname"];
       echo $cat_price_id = $_POST['category'];
        

            //INSTANTIATE
        $price = new Price();
        $updated = $price->update_price($price_name, $cat_price_id, $price_id);
            if($updated) {
                $_SESSION['updated'] = "price updated successfully";
                header("location:../price_list.php");
                exit();
            }else{
                $_SESSION['updated'] = "unable to updated price ";
                header("location:../price_list.php");
                exit();
            }
    }    
}