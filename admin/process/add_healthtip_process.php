<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Healthtip.php";
//require_once "../guards/admin_guard.php";

if ($_POST) {
    if (isset($_POST["add_book"])) {
        $healthtips_id = $_POST["healthtips_id"];
        $healthtips_title = $_POST["title"];
        $category_id = $_POST["category"];
        $healthtips_description = $_POST["desc"];
        $profile = $_FILES["cover"];

    //file error vaidation
    $error = $profile["error"];
    if ($error > 0) {
        $_SESSION["invalid_file"] = "please upload a valid file";
        header("location:../add_healthtip.php");
        exit();
    }//end of error validation

    //validate file size
    $file_size = $profile["size"];
    if ($file_size > 6291456) {
        $_SESSION["picture_size"] = "Picture size cannot be more than 6mb";
        header("location:../add_healthtip.php");
        exit();
    }//end of size validation

    //vaildate file type/name via d extension
    $allowed = ["jpeg", "png", "jpg"];  //allowed file extension
    $filename = $profile["name"];
        //to get the extension of the user uploaded file
    $arrfilename = explode(".", $filename);
    $file_ext = end($arrfilename);
    echo $file_ext;

    //if file they tried to upload is not in the list of allowed file extension
    if(!in_array($file_ext, $allowed)){
        $_SESSION["image_type"] = "please upload an image of type png or jpg";
        header("location:../add_healthtip.php");
        exit();
    }

    //generate a unique filename forr  d file
    $final_filename = "earlycarepic" . time() . "." . $file_ext;
    $destination = "../../uploads/$final_filename";
    $tempo = $profile["tmp_name"];

    $fileUploaded = move_uploaded_file($tempo, $destination);

    //if upload is successful, send file name and user id to user class method to be updated for d user

    // If upload is successful, add the healthtip and redirect
    if ($fileUploaded) {
        $healthtip = new Healthtip();
        $response = $healthtip->add_healthtip($category_id, $healthtips_title, $healthtips_description, $final_filename);
        if ($response) {
            $_SESSION['add_tips'] = "Healthtip added successfully";
            header("location:../healthtips_list.php");
        } else {
            $_SESSION['add_tips'] = "error, unable to add Healthtip";
            header("location:../healthtips_list.php");
        }
    }


    

    
















    }
}

?>