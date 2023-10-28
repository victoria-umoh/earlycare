<?php
session_start();
error_reporting(E_ALL);
include "../classes/Healthtip.php";
if($_POST){
	if (isset($_POST['edit_healthtips'])) {
		 $healthtips_id = $_POST['healthtips_id'];
		 $healthtips_title = $_POST['title'];
		 $healthtips_description = $_POST['desc'];
		 $category = $_POST['category'];

		     //INSTANTIATE
        $healthtip = new Healthtip();
        $healthtips_updated = $healthtip->update_healthtip($healthtips_title, $healthtips_description, $healthtips_id);

            if ($healthtips_updated){
					$_SESSION["edit_healthtips"] = "Health-tips updated successfully";
					header("location:../healthtips_list.php");
                    exit();
				}else{
					$_SESSION["edit_healthtips"] = "error, health-tips update failed";
					header("location:../healthtips_list.php");
                    exit();
				}
	}
}

?>