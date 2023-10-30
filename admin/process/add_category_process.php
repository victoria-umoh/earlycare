<?php
session_start();
require_once "../classes/Category.php";
require_once "../utilities/sanitizer.php";

if ($_POST) {
	if (isset($_POST['add_cat'])) {
		$plan_cat_id = $_POST['cat_id'];
		$cat_title = sanitizer($_POST['title']);
		$cat_desc = sanitizer($_POST['desc']);

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
