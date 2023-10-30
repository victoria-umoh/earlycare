<?php
session_start();
require_once "../classes/Price.php";
require_once "../utilities/sanitizer.php";

if ($_POST) {
	if (isset($_POST['add_btn'])){
		//$goal_id = $_POST['goal_id'];
		$price_name = sanitizer($_POST['pname']);
		$cat_price_id = sanitizer($_POST['category']);

		// INSTANTIATE
		$price = new Price();
		$prices = $price->add_price($cat_price_id, $price_name);
			if ($prices){
				$_SESSION['added'] = "Price added successfully";
				header("location:../price_list.php");
				exit();
			}else{
				$_SESSION['added'] = "Price added successfully";
				header("location:../price_list.php");
				exit();
			}
	}
}

?>
