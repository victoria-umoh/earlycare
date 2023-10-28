<?php 
session_start();
include "partials/earlycarenav.php"; 
require_once "classes/Goal.php";
require_once "classes/User.php";
//require_once "guards/user_guard.php";
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
     $userr = new User();
     $user = $userr->fetch_user_details($user_id);
}

if(isset($_GET['id'])){
    $goal_id = $_GET['id'];

    // $goal = new Goal();
    // $goals = $goal->get_goal_detail($goal_id);
    // print_r($goals);    
}


?>
 

<!-- ADD CATEGORY -->
<div class="container" id="add_category">
      <div class="row">

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

             <div class="">
            <div class="bg-light">
                <h1 class="text-center">Hydration Data</h1>
                <form method="post" action="process/hydration_process.php">
                        <!--check if error msg is available in session-->
                        <div>
                            <?php
                            if (isset($_SESSION["hydration_msg"])) {                           
                            ?>

                            <!-- display error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                               <strong><?php echo $_SESSION["hydration_msg"]; ?></strong> You should check in on some of those fields below.
                            </div>

                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION["hydration_msg"]); ?>
                            
                            <?php
                            }
                            ?>
                        </div>
                        <!-- End of error message -->
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" id="">
                    <input type="hidden" name="goal_id" value="<?php echo $goal_id; ?>" id="">
                    

                    <div class="row mb-3">

                        <div class="col-md-6"><label for="target_water" class="form-label">daily water aim in litres</label></div>
                        <div class="col-md-6">
                            <select name="target_water" id="target_water" class="form-control">
                                <option value="">select one</option>
                                <option value="1glass">1glass</option>
                                <option value="2glass">2glass</option>
                                <option value="3glass">3glass</option>
                                <option value="4glass">4glass</option>
                                <option value="5glass">5glass</option>
                                <option value="6glass">6glass</option>
                                <option value="7glass">7glass</option>
                                <option value="8glass">8glass</option>
                            </select>
                        </div>  
                    </div>

                    <div class="row mb-3">
                         <div class="col-md-6"><label for="gender" class="form-label">Gender</label></div>
                        <div class="col-md-6">
                            <select name="gender" id="gender"  class="form-control">
                                <option value="">select one</option>
                                <option value="male">male</option>
                                <option value="female">female</option> 
                            </select>
                        </div> 
                    </div>

                    <div class="row mb-3">
                         <div class="col-md-6"><label for="hour_select" class="form-label">Waking hour</label></div>
                         <div class="col-md-6">
                            <select id="hour_select" name="waking_hour" class="form-control">
                                <option value="">select one</option>
                                <?php
                                for ($hour = 1; $hour <= 24; $hour++) {
                                    // Format the hour with leading zeros for single-digit hours
                                    $hourFormatted = str_pad($hour, 2, '0', STR_PAD_LEFT);
                                    
                                    // Output an option element for each hour
                                    echo "<option value=\"$hourFormatted\">$hourFormatted</option>";
                                }
                                ?>
                            </select>
                        </div>     
                    </div>

                
                    <div class="row mb-3">
                        <div class="col-md-6">              
                            <input type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary btn-lg" value="submit">
                        </div>
                        <!--BACK BUTTON  -->
                        <div class="col-md-3">
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                View goal
                            </button>
                        </div>
                    <!-- BACK BUTTON -->
                    </div>
                </form>
            </div>
        </div>

        </div>

        
      </div>
</div>    
<!-- GOAL CATEGORY -->
<script src="assets/scripts/jquery.js"></script>
<script>
    const timeInput = document.getElementById("time_input");
    const selectedHours = document.getElementById("selected_hours");

    timeInput.addEventListener("input", function () {
        const selectedTime = timeInput.value;
        const hours = selectedTime.split(":")[0];
        selectedHours.textContent = `Selected hours: ${hours}`;
    });
</script>


<?php
include "partials/earlycarefooter.php";
?>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="">
        <?php
            include "partials/earlycarefooter.php";
        ?>
      </div>
    </div>
  </div>
</div>