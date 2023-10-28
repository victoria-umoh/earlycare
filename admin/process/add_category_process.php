<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Category.php";


if ($_POST) {
	if (isset($_POST['add_cat'])) {
		$plan_cat_id = $_POST['cat_id'];
		$cat_title = $_POST['title'];
		$cat_desc = $_POST['desc'];

		// INSTANTIATE CLASS OF CATEGORY

		$cat = new Category();
		$categories = $cat->add_category($cat_title, $cat_desc);
			if ($categories) {
				$_SESSION['category_msg'] = "Category successfully Added";
				header("location:../category_list.php");
				exit();
			}else{
				$_SESSION['category_msg'] = "Unable to Add Category";
				header("location:../category_list.php");
				exit();
			}
	}
}

?>
