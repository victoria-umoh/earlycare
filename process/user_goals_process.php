<?php
session_start();
require_once "../classes/User.php";
require_once "../classes/Goal.php";
require_once "../utilities/sanitizer.php";
require_once "../classes/UserGoal.php";

    if(isset($_POST['submit'])){
    // Sanitize and validate 

    $user_id = $_POST["user_id"];
    $goal_id = $_POST["goal_id"];
    $user_height = $_POST["user_height"];
    $user_gender = $_POST["user_gender"];
    $user_dob = $_POST["user_dob"];
    $current_value = sanitizer($_POST["current_value"]);
    $target_value = sanitizer($_POST["target_value"]);
    $activity_level = $_POST["activity_level"];
    $start_date = $_POST["start_date"];
    $finish_date = $_POST["finish_date"];

   
    
        // Validate inputs
        if(empty($current_value) || empty($target_value) || empty($activity_level) || empty($start_date) || empty($finish_date)  ){
            $_SESSION['weightloss_insert'] = "all fields are required";
            header("location:../user_goals.php");
            exit();     
        } else{

        function calculateDailyCaloricIntakeForWeightLoss($user_gender, $user_dob, $current_value, $user_height, $activity_level, $target_value){
            
            $caloriesPerKgOfWeightLoss = 7700; // Calories required to lose 1kg of weight

            // Calculate BMR using the Mifflin-St Jeor formula or another appropriate formula
            $bmr = calc_Bmr($user_gender, $activity_level, $current_value, $user_height, $user_dob);
            
                
            // Calculate the total caloric deficit needed for the desired weight loss
            $totalCaloricDeficit = (int)$target_value * (int) $caloriesPerKgOfWeightLoss;
           

            // Determine the daily caloric intake required for weight loss
            $dailyCaloricIntakeForLoss = $bmr - ($totalCaloricDeficit / 30); // Assuming a 30-day month

            return $dailyCaloricIntakeForLoss;
        }

            // Example usage:
            $user_gender = $user_gender;          
            $user_dob = $user_dob;                
            $current_value = $current_value;          
            $user_height = $user_height;       
            $activity_level = $activity_level; 
            $target_value = $target_value; 

            $dailyCaloricIntake = calculateDailyCaloricIntakeForWeightLoss($user_gender, $user_dob, $current_value, $user_height, $activity_level, $target_value);

            $_SESSION["success"] = "To achieve {$target_value}, aim for a daily caloric intake of approximately {$dailyCaloricIntake} calories.";
            
            //instantiate method to insert to database
                $usergoal = new UserGoal();
                $response = $usergoal->insert_user_goal($user_id, $goal_id, $current_value, $target_value, $activity_level, $start_date, $finish_date);
                
                if($response){
                    $_SESSION['goal_insert'] = "goal insert successful";
                        $url = "user_goals.php?id=$goal_id";
                        header("location:../$url");
                        // header("location:../user_goals.php");
                        exit();
                }else{
                    $_SESSION['goal_insert'] = "error, unable to insert goal";
                        $url = "user_goals.php?id=$goal_id";
                        header("location:../$url");
                        exit();
                }   
            }
        } //end of if post isset

            function calc_Bmr($user_gender, $activity_level, $current_value, $user_height, $user_dob) {
               
                echo $current_value = (int)$current_value;
                echo $user_height = (int)$user_height;
                    if($user_gender == "male" && $activity_level == "sedantary") {
                        $result = (10 * $current_value) + (6.25 * $user_height) - (5 * $user_dob) + 5;
                        return $result;
                    }elseif($user_gender == "male" && $activity_level == "active") {
                        $result = (10 * $current_value) + (6.25 * $user_height) - (5 * $user_dob) + 500;
                        return $result;
                    }elseif($user_gender == "female" && $activity_level == "sedantary") {
                        $result = (10 * $current_value) + (6.25 * $user_height) - (5 * $user_dob) - 161;
                        return $result;
                    }elseif($user_gender == "female" && $activity_level == "active") {
                        $result = (10 * $current_value) + (6.25 * $user_height) - (5 * $user_dob) + 161;
                        return $result;
                    }
            //return $calc_Bmr();
        }


?>


