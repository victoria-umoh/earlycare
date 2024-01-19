<?php
session_start();
include "partials/header.php"; 
require_once "classes/Goal.php";
require_once "classes/User.php";
require_once "classes/UserGoal.php";
require_once "classes/Progress.php";


if (isset($_SESSION["user_id"])) {
  $user_id = $_SESSION["user_id"];

  $userr = new User();
  $user = $userr->fetch_user_details($user_id);
  //print_r($user);

  $user_goals = new UserGoal();
  $result = $user_goals->fetch_user_goal_details($user_id);
  //print_r($result);
}

?>

<div class="container-fluid mt-5">
    
        <div class="row">
          <!--BACK BUTTON  -->
        <div class="col-md-1 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
        </div>
    <!-- BACK BUTTON -->

  <div class="col-md-11 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">View Progress Value</h5>
      </div>
        <!-- SESSION MSG -->
            <div>
                <!--check if error msg is available in session-->
                <?php
                if (isset($_SESSION["goal_msg"])) {                           
                ?>
                <!-- display error msg -->
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION["goal_msg"]; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- unset the displayed errored msg -->
                <?php unset($_SESSION["goal_msg"]); ?>
                <?php
                }
                ?>
                <!-- End of error message -->
            </div>
            <div>
                     <!--check if error msg is available in session-->
                <?php
                if (isset($_SESSION["edit_healthtips"])) {                           
                ?>
                <!-- display error msg -->
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                   <strong><?php echo $_SESSION["edit_healthtips"]; ?></strong>
                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <!-- unset the displayed errored msg -->
                <?php unset($_SESSION["edit_healthtips"]); ?>
                <?php
                }
                ?>
                <!-- End of error message -->
            </div>
      <div class="card-body" style="min-height:200px">
       
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Goal Name</th>
      <th scope="col">Start Date</th> 
      <th scope="col">Finish Date</th> 
      <th scope="col">Progress Value </th>
      <th scope="col">Comment</th>
    </tr>
  </thead>
  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($result as $progress_value) {

       $id = $progress_value["goal_id"];
       $goal= new Goal();
       $response = $goal->get_goal_detail($id);


        if ($_POST) {
            if(isset($_POST['submit_btn'])){
              $progress_goal_id = $_POST['progress_goal_id'];


              $prog = new Progress();
              $progress_val = $prog->fetch_progress_detail($progress_goal_id);
              // print_r($progress_val);
            }
        }
      
    ?>

    <tr>
        <td><?php echo $sn++;  ?></td>
        <td><?php echo $response["goal_title"]; ?></td>    
        <td><?php echo $progress_value["start_date"]; ?></td> 
        <td><?php echo $progress_value["finish_date"]; ?></td>
        <td><?php echo $progress_val["progress_value"]; ?></td>    
        <td><?php echo $progress_val["comment"]; ?></td>
        
    </tr>
  <?php
      }
    ?>

  </tbody>
</table>

      </div>
    </div>
  </div>

 
</div>
</div>

<?php include "partials/earlycarefooter.php"; ?>