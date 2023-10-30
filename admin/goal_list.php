<?php
session_start();
require_once "partials/header.php";
//require_once "guards/admin_guard.php";
require_once ("classes/Goal.php");

$goal = new Goal();
$goals = $goal->fetch_all_goals();

?>



<div class="container-fluid mt-5">
    
        <div class="row">
          <!--BACK BUTTON  -->
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
        <h5 class="mb-0">All Goals</h5>
      </div>
      <!-- SESSION MSG -->
            <div>
                <!--check if msg is available in session-->
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
                        if (isset($_SESSION["goal_edit"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["goal_edit"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["goal_edit"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
            </div>
            <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["delete_goal"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["delete_goal"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["delete_goal"]); ?>
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
      <th scope="col">Title</th>
      <th scope="col">Description</th> 
      <th scope="col">Date Created</th> 
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($goals as $allgoal) { ?>

    <tr>
      <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php   echo $allgoal["goal_title"]; ?></td>    
        <td><?php   echo $allgoal["goal_description"]; ?></td> 
        <td><?php   echo $allgoal["added_date"]; ?></td>
        <td style="display:flex !important;">
          <!-- <a href='delete.php' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</a> -->
          <form action="process/delete_goal_process.php" method="post">
            <input type="hidden" name="goal_id" value="<?php   echo $allgoal["goal_id"]; ?>">
            <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <!-- <a href='details.html' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a> -->
          &nbsp;&nbsp;

          <!-- editing a tag with the use of query string? -->
          <a href="edit_goal.php?id=<?php echo $allgoal["goal_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
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

 



<?php
require_once("partials/earlycarefooter.php");
?>