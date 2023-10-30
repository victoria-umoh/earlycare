<?php
session_start();
include "partials/header.php";
require_once "classes/Goal.php";


?>
<!-- ADD GOAL -->
<div class="container mt-5">
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

        <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0">Add Goal</h5>
            </div>
            
              <form action="process/add_goal_process.php" method="post" class="m-3">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                  <div class="col-md-6">
                    <!-- <input type="hidden" name="goal_id" id="goal_id"> -->
                    <div class="form-outline">
                      <label class="form-label" for="form7Example1">Goal Title</label>
                      <input type="text" id="form7Example1" class="form-control" name="title" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-outline">
                      <label for="exampleFormControlTextarea1" class="form-label">Goal Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" name="add_goal">Add Goal</button>
                </div>
       
              </form>
            </div>
        </div>
      </div>
</div>    
<!-- ADD GOAL -->

<?php
include "partials/earlycarefooter.php";
?>