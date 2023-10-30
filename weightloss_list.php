<?php
session_start();
include "partials/header.php";
include "classes/User.php";

if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}


$weightloss = new User();
$response = $weightloss->fetch_weightloss($user_id);

?>


<div class="container">
    
        <div class="row">
          <!--BACK BUTTON  -->
        <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="weightloss.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
        </div>
    <!-- BACK BUTTON -->

  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Weightloss List</h5>
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
        <a href="add_goal.php" class="btn btn-success">Add New</a>
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Goal</th>
      <th scope="col">weight</th> 
      <th scope="col">target weight</th> 
      <th scope="col">height</th>
      <th scope="col">activity level</th>
      <th scope="col">age</th>
      <th scope="col">gender</th>
      <th scope="col">date</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($response as $weightloss) { ?>

    <tr>
        <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php   echo $weightloss["goal_id"]; ?></td>    
        <td><?php   echo $weightloss["weight"]; ?></td> 
        <td><?php   echo $weightloss["target_weight"]; ?></td>
        <td><?php   echo $weightloss["height"]; ?></td>    
        <td><?php   echo $weightloss["activity_level"]; ?></td> 
        <td><?php   echo $weightloss["age"]; ?></td>
        <td><?php   echo $weightloss["gender"]; ?></td>
        <td><?php   echo $weightloss["added_date"]; ?></td>
        <td style="display:flex !important;">
          <!-- <a href='delete.php' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</a> -->
          <form action="process/delete_weightloss_process.php" method="post">
            <input type="hidden" name="weightloss_id" value="<?php   echo $weightloss_id["weightloss_id"]; ?>">
            <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <a href='details.html' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp;

          <a href="set_progress.php" class='btn btn-sm btn-success'>Set Progress</a>
      </td>
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