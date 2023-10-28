<?php
session_start();
error_reporting(E_ALL);
require_once "../classes/Goal.php";


if ($_POST) {
	if (isset($_POST['add_goal'])){
		//$goal_id = $_POST['goal_id'];
		$goal_title = $_POST['title'];
		$goal_description = $_POST['desc'];

		// INSTANTIATE CLASS OF GOAL

		$goal = new Goal();
		$goals = $goal->add_goal($goal_title, $goal_description);
		// print_r($goals);
		// die();
			if ($goals){
				$_SESSION['goal_msg'] = "Goal added successfully";
				header("location:../goal_list.php");
				exit();
			}else{
				$_SESSION['goal_msg'] = "error, unable to add goal";
				header("location:../goal_list.php");
				exit();
			}
	}
}

?>
