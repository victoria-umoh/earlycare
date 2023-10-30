<?php
session_start();
include "partials/earlycarenav.php";
include "classes/User.php";
include "classes/Goal.php";



?>

<div class="container">
  <div class="row">
    <!-- BACK BUTTON -->
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
          <a href="add_goal.php" class="btn btn-success">Add New</a>

          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Goal ID</th>
                <th scope="col">Goal Title</th>
                <th scope="col">Goal Description</th>
              </tr>
            </thead>
            <tbody>
              <?php if ($goal) { ?>
                <tr>
                  <td><?php echo $goal['goal_id']; ?></td>
                  <td><?php echo $goal['goal_title']; ?></td>
                  <td><?php echo $goal['goal_description']; ?></td>
                </tr>
              <?php } else { ?>
                <tr>
                  <td colspan="3">No goal details found</td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
