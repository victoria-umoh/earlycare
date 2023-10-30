<?php
session_start();
require_once "../classes/PlanCategory.php";
require_once "../utilities/sanitizer.php";

if ($_POST) {
	if (isset($_POST['add_cat'])) {
		$plan_cat_id = $_POST['cat_id'];
		$plan_cat_title = sanitizer($_POST['title']);
		$plan_cat_desc = sanitizer($_POST['desc']);

		// INSTANTIATE CLASS OF CATEGORY

		$cat = new PlanCategory();
		$categories = $cat->add_category($plan_cat_title, $plan_cat_desc);
			if ($categories) {
				$_SESSION['category_msg'] = "Category successfully Added";
				header("location:../plan_category_list.php");
				exit();
			}else{
				$_SESSION['category_msg'] = "Unable to Add Category";
				header("location:../plan_category_list.php");
				exit();
			}
	}
}

?>
