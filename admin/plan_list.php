<?php
session_start();
require_once("partials/header.php");
//require_once "guards/admin_guard.php";
require_once ("classes/Plan.php");
require_once "classes/PlanCategory.php";

    $plan = new Plan();
    $plans = $plan->fetch_all_plan();

    $category = new PlanCategory();
    $categories = $category->fetch_category();


?>
 
<!-- VIEW ALL HEALTH TIPS ON A TABLE -->
<div class="container-fluid mt-5">
    <div class="row">

    <!--BACK BUTTON  -->
        <div class="col-md-1 mb-4">
          <div class="card mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
             <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:20px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
            </div>
          </div>
        </div>
    <!-- BACK BUTTON -->
  

  <div class="col-md-11 mb-4">
    <div class="card mb-4">
      
      <div class="card-header py-3">
        <h5 class="mb-0">Payment List</h5>
      </div>
      <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["add_tips"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["add_tips"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["add_tips"]); ?>
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
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
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
      <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["deleted"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["deleted"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["deleted"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
      </div>

      <div class="card-body">
        <!-- <a href="add_healthtip.php" class="btn btn-success">Add New</a> -->
           <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Plan Category</th>
                <th scope="col">Plan refcode</th>  
                <th scope="col">Plan Amount</th>
                <th scope="col">Plan User_id</th>
                <th scope="col">Plan Status</th>
                <th scope="col">Plan Data</th>
                <th scope="col">Plan Time</th>
                <th scope="col">Plan Timerecorded</th>
                <th scope="col">Action </th>
              </tr>
            </thead>

            <tbody>
              <?php $sn = 1;  ?>

              <?php foreach($plans as $plan) { 
                $id = $plan["plan_cat_id"];
                $plans = new PlanCategory();
                $result = $plans->get_category_detail($id);
                //print_r($title);
                
                ?>
              <tr>
                  <th><?php echo $sn++;  ?></th>
                  <td><?php  echo $result['plan_cat_title']; ?></td>    
                  <td><?php  echo $plan['plan_refcode']; ?></td>
                  <td><?php  echo $plan['plan_amount']; ?></td>
                  <td><?php  echo $plan['plan_userid']; ?></td>
                  <td><?php  echo $plan['plan_status']; ?></td>    
                  <td>click details to view<?php  //echo $plan['plan_data']; ?></td>
                  <td><?php  echo $plan['plan_time']; ?></td>    
                  <td><?php  echo $plan['plan_timerecorded']; ?></td>
                  <td style="display:flex !important;">
                    
                    <form action="process/delete_plan_process.php" method="post">
                      <input type="hidden" name="plan_id" value="<?php echo $health["plan_id"]; ?>">
                      <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
                    </form>
                    &nbsp;&nbsp;

                    <!-- <a href='#' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a> -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class='fa fa-list'></i>
                      Details
                    </button>
                    &nbsp;&nbsp;

                    <!-- <a href="edit_plan.php?id=<?php //echo $health["plan_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a> -->
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
<!-- VIEW ALL PLAN ON A TABLE -->
 



<?php
require_once("partials/earlycarefooter.php");
?>



<!-- Modal start-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">PLAN DATA</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p style=""><?php  echo $plan['plan_data']; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal end-->
