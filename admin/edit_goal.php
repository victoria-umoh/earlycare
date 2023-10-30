<?php
session_start();
//require_once "guards/admin_guard.php";
require_once "classes/Goal.php";
require_once "partials/header.php";

//getting goal from query string
//check first if d goal exist
//since we are expecting a number, check d value is numeric
//then call d method nd pass d number as an argument

if(isset($_GET["id"])){
  $goal_id = $_GET["id"];
  //if sm1 changes d id to non numeric, redirect
    if(!is_numeric($goal_id)) {
      header("location:category_list.php");
      exit();
    }

    $goal = new Goal();
    $goals = $goal->get_goal_detail($goal_id);

    if(!$goals){
      header("location:goal_list.php");
      exit();
    }

   
}
else{
  header("location:goal_list.php");
  exit();
}






?>

<!-- EDIT CATEGORY -->
<div class="container mt-5" id="edit_category">
      <div class="row">
        <!--BACK BUTTON  -->
          <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="goal_list.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
          </div>
    <!-- BACK BUTTON -->
        <div class="col-md-6 mb-4 card">
            <div class="card-header py-3">
                <h5 class="mb-0">Update Goal</h5>
            </div>
          <form action="process/edit_goal_process.php" method="post">
            
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="form-outline">
                      <label class="form-label" for="form7Example1">Goal Title</label>
                      <input type="text" id="form7Example1" class="form-control" name="title" value="<?php echo $goals['goal_title']; ?>"/>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-outline">
                      <label for="exampleFormControlTextarea1" class="form-label">Goal Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"> <?php echo  $goals['goal_description'] ?></textarea>
                    <input type="hidden" name="goal_id" id="goal_id" value="<?php echo $goals['goal_id']; ?>">
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" name="edit_goal">Update Category</button>
                </div>
       
              </form>
        </div>
      </div>
</div>    
<!-- EDIT CATEGORY -->
<?php include_once "partials/earlycarefooter.php"; ?>