<?php 
session_start();
// require_once "guards/user_guard.php";
include "partials/header.php"; 
require_once "classes/Goal.php";
require_once "classes/User.php";
require_once "classes/UserGoal.php";




//COMING FROM PROFILE PAGE 
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];

     $userr = new User();
     $user = $userr->fetch_user_details($user_id);
    //print_r($user);

    $user_goals = new UserGoal();
    $result = $user_goals->fetch_user_goal_details($user_id);
    //print_r($result);
}
    //COMING FROM PROFILE PAGE JAVASCRIPT
    if(isset($_GET['id'])){
      $goal_id = $_GET['id'];

      $goals = new Goal();
      $result = $goals->get_goal_detail($goal_id);
      $results = $result['goal_title'];
      //print_r($result);
    }
    



?>
 

<!-- ADD CATEGORY -->
<div class="container mt-5 mb-5" id="add_category">
      <div class="row mb-5">

        <!--BACK BUTTON  -->
          <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
          </div>
        <!-- BACK BUTTON -->

        <div class="col-md-6 bg-light">
            <div class="card-header py-3">
                <h5 class="mb-0">All Goal</h5>
            </div>

            <div class="card-body">
              <div class="bg-light">
                <h1 class="text-center">Goal Data</h1>
                <form method="post" action="process/user_goals_process.php">
                        <!--check if error msg is available in session-->
                        <div>
                            <?php
                            if (isset($_SESSION["goal_insert"])) {                           
                            ?>

                            <!-- display error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                               <strong><?php echo $_SESSION["goal_insert"]; ?></strong> 
                               You should check in on some of those fields below.
                            </div>

                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION["goal_insert"]); ?>
                            
                            <?php
                            }
                            ?>
                        </div>
                        <!-- End of error message -->
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                    <input type="hidden" name="goal_id" value="<?php echo $goal_id; ?>" />

                    <input type="hidden" name="user_height" value="<?php echo $user['user_height']; ?>" />
                    <input type="hidden" name="user_gender" value="<?php echo $user['user_gender']; ?>" />
                    <input type="hidden" name="user_dob" value="<?php echo $user['user_dob']; ?>" />
                    <div class="row mb-3">
                        <div class="col-md-6"><label for="goal_title" class="form-label">Goal Title</label></div>
                        <div class="col-md-6">
                        <input type="text" name="goal_title" id="goal_title" value="Nutrition"  class="form-control" readonly />
                            <!-- <input type="text" name="goal_title" id="goal_title" value="<?php //echo $results; ?>"  class="form-control" readonly /> -->
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6"><label for="current_value" class="form-label">current value</label></div>
                        <div class="col-md-6"><input type="number" name="current_value" id="current_value" class="form-control" required /></div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6"><label for="target_value" class="form-label">target value</label></div>
                        <div class="col-md-6"><input type="number" name="target_value" id="target_value" class="form-control" required /></div>  
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6"><label for="activity_level" class="form-label">Activity Level</label></div>
                        <div class="col-md-6">
                            <select name="activity_level" id="activity_level" class="form-control">
                                <option value="">select one</option>
                                <option value="sedantary">sedantary</option>
                                <option value="active">active</option> 
                            </select>
                        </div>   
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6"><label for="start_date" class="form-label">start date</label></div>
                        <div class="col-md-6"><input type="datetime-local" name="start_date" id="start_date" class="form-control" required></div>  
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6"><label for="finish_date" class="form-label">finish date</label></div>
                        <div class="col-md-6"><input type="datetime-local" name="finish_date" id="finish_date" class="form-control" required></div>  
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">              
                            <input type="submit" id="submit" name="submit" class="btn btn-primary btn-lg" value="submit">
                        </div>
                        <div class="col-md-6">
                            <input type="reset" name="reset" id="reset" value="reset" class="btn btn-success btn-lg">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        </div>

        <!--MoDAL  -->
            <div class="col-md-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                    View goal
                </button>
            </div>
        <!-- MODAL BUTTON -->
      </div>
</div>    
<!-- GOAL CATEGORY -->


<!-- MODAL START -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-body">
            <?php
                include "partials/header.php";
                require_once "utilities/DateDiff.php";

                //COMING FROM PROFILE PAGE 
                  if (isset($_SESSION["user_id"])) {
                    $user_id = $_SESSION["user_id"];

                    $userr = new User();
                    $user = $userr->fetch_user_details($user_id);
                    //print_r($user);

                    $user_goals = new UserGoal();
                    $result = $user_goals->fetch_user_goal_details($user_id);
                    //print_r($result);
                  }
                  
                  if(isset($_SESSION['days_difference'])) {
                     $days_difference = $_SESSION['days_difference'];
                    echo "Difference in days: $days_difference days";
                  } 

                  

                ?>

                <div class="container-fluid">
                  <div class="row">
                    <!-- BACK BUTTON -->
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
                          <h5 class="mb-0">User Goal List</h5>
                        </div>
                        <!-- SESSION MSG -->
                        <div>
                          <!-- Check if error msg is available in session -->
                          <?php if (isset($_SESSION["goal_msg"])) { ?>
                            <!-- Display error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <strong><?php echo $_SESSION["goal_msg"]; ?></strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <!-- Unset the displayed errored msg -->
                            <?php unset($_SESSION["goal_msg"]); ?>
                          <?php } ?>
                          <!-- End of error message -->
                        </div>
                        <div>
                          <!-- Check if error msg is available in session -->
                          <?php if (isset($_SESSION["edit_healthtips"])) { ?>
                            <!-- Display error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <strong><?php echo $_SESSION["edit_healthtips"]; ?></strong>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <!-- Unset the displayed errored msg -->
                            <?php unset($_SESSION["edit_healthtips"]); ?>
                          <?php } ?>
                          <!-- End of error message -->
                        </div>
                        <div class="card-body" style="min-height:200px">
                          <a href="profile.php" class="btn btn-success">Add New</a>

                          <table class="table table-striped table-dark">
                            <thead>
                              <tr>
                                <!-- <th scope="col">user</th> -->
                                <th scope="col">goal title</th>
                                <th scope="col">current value</th>
                                <th scope="col">target value</th>
                                <th scope="col">height</th>
                                <th scope="col">activity level</th>
                                <th scope="col">age</th>
                                <th scope="col">gender</th>
                                <th scope="col">goal start date</th>
                                <th scope="col">goal finish date</th>
                                <!-- <th scope="col">Date</th> -->
                                <th scope="col">Days to go</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($result as $weightloss){
                                $weightlos = $weightloss['goal_id'];

                                $user1 = new UserGoal();
                                $response = $user1->get_goal_detail($weightlos);

                                $datee = new DateDiff();
                                $dates = $datee->date_difference($weightloss['start_date'], $weightloss['finish_date']);
                                $timedif = "";
                                $timedif .=  $dates['days'] . " days : " ;
                                $timedif .=  $dates['hours'] . "  hours : ";
                                $timedif .=  $dates['minutes'] . "  minutes : ";
                                $timedif .=  $dates['seconds'] . "  seconds";
                                //echo $timedif . "<br>";
                              //print_r($dates);
                              
                               ?>
                                <tr>
                                  <!-- <td><?php //echo $weightloss['user_id']; ?></td> -->
                                  <td><a href="view_progress.php?id=<?php echo $response['goal_title']; ?>" class="text-decoration-none text-light"><?php echo $response['goal_title']; ?></a></td>
                                  <td><?php echo $weightloss['current_value']; ?></td>
                                  <td><?php echo $weightloss['target_value']; ?></td>
                                  <td><?php echo $user['user_height']; ?></td>
                                  <td><?php echo $weightloss['activity_level']; ?></td>
                                  <td><?php echo $user['user_dob']; ?></td>
                                  <td><?php echo $user['user_gender']; ?></td>
                                  <td><?php echo $weightloss['start_date']; ?></td>
                                  <td><?php echo $weightloss['finish_date']; ?></td>
                                  <!-- <td><?php //echo $weightloss['added_date']; ?></td> -->
                                  <td><?php echo $timedif; ?></td>
                                  <td><a href="set_progress.php?id=<?php echo $weightloss["user_goal_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Set Progress</a></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php include "partials/earlycarefooter.php"; ?>
<!-- MODAL END -->








