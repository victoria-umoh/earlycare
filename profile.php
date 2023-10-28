<?php
    session_start();
    require_once "partials/earlycarenav.php";
    //include "guards/user_guard.php";
    require_once "classes/User.php";
    require_once "classes/Goal.php";
    require_once "classes/Healthtip.php";

    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        
        $userr = new User();
        $user = $userr->fetch_user_details($user_id);
        // print_r($user);
    }

    if (isset($_SESSION['update_successful'])) {
        // code...
    }      

    if (isset($_SESSION["weightloss_error_msg"])) {
        $tweight =  $_SESSION["weightloss_error_msg"];
    }

    $goal = new Goal();
    $goals = $goal->fetch_all_goals();

    $healthtip = new Healthtip();
    $healthtips = $healthtip->fetch_all_healthtips();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-dark" style="font-family: serif; font-size: 24px;">
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="dashboard">Dashboard</a>
            <a href="profile.php" class="list-group-item list-group-item-action bg-dark text-light">Set a Goal</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light" data-bs-toggle="modal" data-bs-target="#myModal" style="font-family: serif; font-size: 24px;">
                View goal
            </a>
            <a href="set_progress.php" class="list-group-item list-group-item-action bg-dark text-light">Set Progress</a>
            <a href="index.php" class="list-group-item list-group-item-action bg-dark text-light">Health tips</a>
            <!-- <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Reviews</a> -->
            <!-- <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Community</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light">FAQ</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Rating</a>
            <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Settings</a> -->
        </div>
        
        <div class="col-md-10" style="font-family:serif; font-size: 20px;">
            <div class="row">
                <div class="col-md-10 p-3">
                    <h4>Welcome <?php echo $user["user_firstname"]; ?></h4>
                    <p>Let's create healthy habit!</p>
                </div>
                <div class="col-md-2">
                    <div class="row d-flex align-items-center">

                    <!-- notification -->
                    <div class="col-md-4 d-flex align-items-center">
                        <div><i class="fa-regular fa-bell fa-2xl"></i></div>
                    </div>
                    <!-- notification -->

                    <!-- CHANGE PROFILE PICTURE -->
                    <div class="col-md-4">
                        <div class="rounded-circle" style="border: 1px solid red; width: 50px; height: 50px; border-radius: 50%;" id="changePic">
                            <a href="#" id="">
                                <div class="text-center mb-3">
                                    <img src="uploads/<?php echo $user['user_dp'];  ?>" width="50" class="img-fluid rounded-circle">
                                </div>
                            </a>
                        </div>
                    </div>
                        <!-- CHANGE PROFILE PICTURE -->

                    <div class="col-md-4">
                        <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item d-flex"><a class="nav-link active text-black text-decoration-none" href="#" id=""><b>profile</b></a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#" id="updateProfile">My profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Help</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                    </div>
                    <div>
                            <!--check if error msg is available in session-->
                                        <?php
                                        if (isset($_SESSION["file_upload"])) {                           
                                        ?>
                                        <!-- display/echo error msg -->
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_SESSION["file_upload"]; ?></strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <!-- unset the displayed errored msg -->
                                        <?php unset($_SESSION["file_upload"]); ?>                      
                                        <?php
                                        }
                                        ?>
                                    <!-- End of error message -->
                        </div>
                    </div>
                </div>
            <!-- </div> -->
            <hr>
    <div class="row" id="page_content">
        <div class="col" style="border:1px solid gray;">
            <div class="row">
                <div class="col-md-6">
                    <div><p>To get started on your health journey, select a goal</p></div>
                    <div>
                        <div class="">
                          <label class="form-label" for="form7Example1">Select a Goal</label>
                            <select name="category" id="goalSelect" class="form-control" style="font-size:20px;">
                                <option value="">select one</option>
                                <?php foreach ($goals as $goal) { 
                                    // GENERATE A UNIQUE ID FOR EACH OPTION BASED ON THE GOAL ID
                                    $optionId = "goal_option_{$goal["goal_id"]}";
                                ?>
                                    <option value="<?php echo $goal["goal_id"]; ?>" id="<?php echo $optionId; ?>" class="goal_option">
                                        <?php echo $goal["goal_title"]; ?>
                                    </option>
                                <?php 
                            
                            } ?>
                            </select>
                        </div>
                        <!-- unique form id -->

                        <!-- unique form id -->
                    </div>
                </div>
                <div class="col-md-6" style="border:1px solid gray;">
                    <img src="assets/images/care1.jpg" class="img-fluid">
                </div>
                
            </div>
        </div>


        
    </div>

    <!-- goal cat -->
        <div class="row" id="allCategory" style="display: none;">
            <div class="col">
                <h1 class="text-center">CATEGORIES</h1>
            </div>
        <div class="row text-center">
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <img src="assets/images/weightloss.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Weightloss</h5>
                </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-primary col-md-12">
                        <a class="small text-white stretched-link text-decoration-none" href="weightloss.php" id="">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 17rem;">
                <img src="assets/images/cupofwater.jpg" class="card-img-top img-fluid " alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-0">Hydration</h5>
                </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-primary col-md-12">
                        <a class="small text-white stretched-link text-decoration-none mt-0" href="weightloss.php" id="">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <img src="assets/images/eating.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nutrition & Diet</h5>
                </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-primary col-md-12">
                        <a class="small text-white stretched-link text-decoration-none" href=".php" id="">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                <img src="assets/images/overlay.jpg" class="card-img-top img-fluid" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Fitness & Exercise</h5>
                </div>
                    <div class="card-footer d-flex align-items-center justify-content-between bg-primary col-md-12">
                        <a class="small text-white stretched-link text-decoration-none" href="weightloss.php" id="">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                    <img src="assets/images/weightloss.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Sleep Improvement</h5>
                    </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-primary col-md-12">
                            <a class="small text-white stretched-link text-decoration-none" href="weightloss.php" id="">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                        </div>
            
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                    <img src="assets/images/weightloss.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tobacco & Substance Abuse</h5>
                    </div>
                        <div class="card-footer d-flex align-items-center justify-content-between bg-primary col-md-12">
                            <a class="small text-white stretched-link text-decoration-none" href="weightloss.php" id="">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<!-- goal cat --> 

    <!-- VIEW SET GOAL -->
    <div class="row" id="viewgoal" style="display:none;">
        <div class="col">
            <p><?php //echo $_SESSION["weightloss_error_msg"]; ?></p>
            <h5>View your weightloss goal</h5>
        <?php
            echo "<ul>";
            foreach ($user_weightloss as $key => $value) {
            echo  "<li>$key: $value</li>";
            }
            echo "</ul>";
        ?>
        <p><?php echo $tweight; ?></p>

        </div>
    </div>
    <!-- VIEW SET GOAL -->

    
              

    <!-- EDIT PROFILE DETAILS -->
    <div class="container bg-light mt-5 mb-5 pt-5 pb-5 justify-content-center" id="editProfile" style="display:none;">
        <div class="row">
            <div class="col-md-6 m-auto"> 
                <form method="post" action="process/update_profile_process.php"> 
                    <h3 class="text-center mb-3 mt-3">Your profile</h3>           
                        <!--check if error msg is available in session-->
                            <?php
                            if (isset($_SESSION["updated"])) {                           
                            ?>
                            <!-- display/echo error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["updated"]; ?></strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION["updated"]); ?>                      
                            <?php
                            }
                            ?>
                        <!-- End of error message -->
                        <div class="row">
                            <div class="col">
                                <label for="fname" class="form-label">Firstname</label>
                                <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['user_firstname']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="lname" class="form-label">Lastname</label>
                                <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['user_lastname']; ?>">
                            </div>
                        </div>                      
                        <div class="row">
                            <div class="col">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['user_email']; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="height" class="form-label">Height</label>
                                <input type="number" name="height" id="height" class="form-control" value="<?php echo $user['user_height']; ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="gender" class="form-label mt-4">Select gender</label><br>
                                <input type="radio" class="mb-4" id="male" name="gender" value="male" <?php if ($user['user_gender'] === 'male') echo 'checked'; ?> />
                                <label for="male">male</label>

                                <input type="radio" class=" mb-4" id="female" name="gender" value="female" <?php if ($user['user_gender'] === 'female') echo 'checked'; ?>/>
                                <label for="female">female</label><br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="dob" class="form-label">DOB</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="<?php echo $user['user_dob']; ?>" />
                            </div>
                        </div>
                        <div class="col mt-3 d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-outline-primary btn-lg"> Submit </button>
                        </div> 
                </form>
            </div>
        </div>
     </div>
<!-- EDIT PROFILE DETAILS -->

    <!-- UPLOADPIC -->
    <div class="container" id="uploadprofilepic" style="display:none;">   
        <div class="row">
             <div class="col-md-3 mb-4">
                <div class="card mb-4">
              <div class="card-header py-3">

                 <h5 class="mb-0">Welcome <?php echo $user["user_firstname"]; ?>!</h5>
              </div>
              <div class="card-body">
               
              </div>
            </div>
          </div>

          <div class="col-md-9 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
                <h5 class="mb-0">Profile</h5>
              </div>
              <div class="card-body" style="min-height:200px">
                <form action="process/uploadprofilepic_process.php" method="post" enctype="multipart/form-data">
                    <div>
                    <label for="profilepic">Change profile picture</label>
                    <input type="file" name="profile" id="profile" class="form-control">
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $user_id;  ?>">
                    <input type="submit" value="Change" name="uploadpicbtn" class="btn btn-primary mt-3">
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    <!-- UPLOADPIC -->
    </div>
</div>


                      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="assets/script/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="assets/scripts/jquery.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        
        $("#category").click(function(){
            $("#allCategory").show();
            $("#viewgoal").hide();
            $("#achievedGoal").hide();
            $("#editProfile").hide();
            $("#insertPic").hide();
            $("#uploadprofilepic").hide();
            $("#page_content").hide();
         });
     
        $("#viewgoalset").click(function(){
             $("#viewgoal").show();
             $("#achievedGoal").hide();
             $("#allCategory").hide();
             $("#editProfile").hide();
             $("#insertPic").hide();
             $("#uploadprofilepic").hide();
             $("#page_content").hide();

        });

        $("#achievement").click(function(){
            $("#achievedGoal").show();
            $("#viewgoal").hide();
            $("#allCategory").hide();
            $("#editProfile").hide();
            $("#insertPic").hide();
            $("#uploadprofilepic").hide();
            $("#page_content").hide();
        });

        $("#updateProfile").click(function(){
            $("#editProfile").show();
            $("#achievedGoal").hide();
            $("#viewgoal").hide();
            $("#allCategory").hide();
            $("#insertPic").hide();
            $("#uploadprofilepic").hide();
            $("#page_content").hide();
        });

        $("#changePic").click(function(){
            $("#uploadprofilepic").show();
            $("#editProfile").hide();
            $("#achievedGoal").hide();
            $("#viewgoal").hide();
            $("#allCategory").hide();
            $("#insertPic").hide();
            $("#page_content").hide();
        });

         $("#dashboard").click(function(){
            $("#page_content").show();
            $("#updateProfile").hide();
            $("#uploadprofilepic").hide();
            $("#changePic").hide();
            $("#achievedGoal").hide();
            $("#viewgoal").hide();
            $("#allCategory").hide();
            $("#insertPic").hide();
            $("#editProfile").hide();
         });


        $("#goalSelect").change(function(){
            const goalSelect = document.getElementById('goalSelect').value;
            if(goalSelect == 1){
                window.location.href="user_goals.php?id=" + goalSelect;
            }else if(goalSelect == 2){
                window.location.href="user_goals.php?id=" + goalSelect;
            }else if(goalSelect == 3){
                window.location.href="user_goals.php?id=" + goalSelect;
            }else if(goalSelect == 4){
                window.location.href="user_goals.php?id=" + goalSelect;
            }else if(goalSelect == 5){
                window.location.href="user_goals.php?id=" + goalSelect;
            }else if(goalSelect == 6){
                window.location.href="user_goals.php?id=" + goalSelect;
            }
        });

    });


    // Get references to select and form elements
        // const goalSelect = document.getElementById('goalSelect');
        // const weightLossForm = document.getElementById('weightLossForm');
        // const fitnessForm = document.getElementById('fitnessForm');
        // const nutritionForm = document.getElementById('nutritionForm');

        // Add an event listener to the select element

        // function goalTrack(){

        //     goalSelect.addEventListener('change', () => { 
        //     // Hide all forms initially
        //     // weightLossForm.style.display = 'none';
        //     // fitnessForm.style.display = 'none';
        //     // nutritionForm.style.display = 'none';

        //     // Determine which form to display based on the selected category
        //     const selectedCategory = goalSelect.value;
        //     alert(selectedCategory + " Hello ")
        //     if (selectedCategory == 1) {
        //         alert("hello");
        //         weightLossForm.style.display = 'block';
        //      } 
        //      //else if (selectedCategory == 2) {
        //     //     fitnessForm.style.display = 'block';
        //     // } else if (selectedCategory == 3) {
        //     //     nutritionForm.style.display = 'block';
        //     // }
        //     // Add more cases for additional categories
        // });
        // }

        
</script>
</div>

<?php //include "partials/earlycarefooter.php"; ?>


<!-- MODAL START -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-body">
            <?php
                include "partials/header.php";
                require_once "utilities/DateDiff.php";
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
                  
                  if(isset($_SESSION['days_difference'])) {
                     $days_difference = $_SESSION['days_difference'];
                    echo "Difference in days: $days_difference days";
                  } 
                ?>

                <div class="container-fluid">
                  <div class="row">
                    <!-- BACK BUTTON -->
                    <div class="col-md-2 mb-4">
                      <div class="card mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                          <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
                        </div>
                      </div>
                    </div>
                    <!-- BACK BUTTON -->

                    <div class="col-md-10 mb-4">
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
                          <a href="user_goals.php" class="btn btn-success">Add New</a>

                          <table class="table table-striped table-dark">
                            <thead>
                              <tr>
                                <th scope="col">user</th>
                                <th scope="col">goal title</th>
                                <th scope="col">current value</th>
                                <th scope="col">target value</th>
                                <th scope="col">height</th>
                                <th scope="col">activity level</th>
                                <th scope="col">age</th>
                                <th scope="col">gender</th>
                                <th scope="col">goal start date</th>
                                <th scope="col">goal finish date</th>
                                <th scope="col">Date</th>
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
                                  <td><?php echo $weightloss['user_id']; ?></td>
                                  <td><?php echo $response['goal_title']; ?></td>
                                  <td><?php echo $weightloss['current_value']; ?></td>
                                  <td><?php echo $weightloss['target_value']; ?></td>
                                  <td><?php echo $user['user_height']; ?></td>
                                  <td><?php echo $weightloss['activity_level']; ?></td>
                                  <td><?php echo $user['user_dob']; ?></td>
                                  <td><?php echo $user['user_gender']; ?></td>
                                  <td><?php echo $weightloss['start_date']; ?></td>
                                  <td><?php echo $weightloss['finish_date']; ?></td>
                                  <td><?php echo $weightloss['added_date']; ?></td>
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
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<?php include "partials/earlycarefooter.php"; ?>
<!-- MODAL END -->