<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Price.php";


if ($_POST) {
	if (isset($_POST['add_btn'])){
		//$goal_id = $_POST['goal_id'];
		$price_name = $_POST['pname'];
		$cat_price_id = $_POST['category'];

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
