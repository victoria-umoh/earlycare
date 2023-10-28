<?php
session_start();
error_reporting(E_ALL);
include "../classes/Contact.php";
if ($_POST){
    if(isset($_POST["del_btn"])){
        $contact_us_id = $_POST["contact_us_id"];

        $contact1 = new Contact();
        $deleted = $contact1->delete_contact_us($contact_us_id);
            if($deleted){
                $_SESSION['delete'] = "Contact deleted successfully";
                header("location:../contact_us_list.php");
                exit();
            }else{
                $_SESSION['delete'] = "error, unable to delete goal";
                header("location:../contact_us_list.php");
                exit();
            }


    }else{
        header("location:../contact_us_list.php");
        exit();
    }
}else{
    header("location:../contact_us_list.php");
    exit();
}

?>