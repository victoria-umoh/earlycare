<?php
session_start();
include "partials/header.php";
require_once "classes/PlanCategory.php";

 // HEALTH TIPS CATEGORY
    $cat = new PlanCategory();
    $categories = $cat->fetch_category();
?>


<!-- ADD CATEGORY -->
<div class="container mt-5" id="add_category">
      <div class="row">

            <!--BACK BUTTON  -->
          <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="plan_category_list.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
          </div>
          <!-- BACK BUTTON -->


        <div class="col-md-6">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0">Add Category</h5>
            </div>
            <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["category_msg"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["category_msg"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["category_msg"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
            </div>
          <form action="process/add_plan_category_process.php" method="post" enctype="multipart/form-data" class="m-3 ">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                  <div class="col-md-6">
                    <input type="hidden" name="cat_id" id="plan_cat_id">
                    <div class="form-outline">
                      <label class="form-label" for="form7Example1">Category Title</label>
                      <input type="text" id="form7Example1" class="form-control" name="title" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-outline">
                      <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" name="add_cat">Add Category</button>
                </div>
       
              </form>
            </div>
        </div>
      </div>
</div>    
<!-- ADD CATEGORY -->

<?php
include "partials/earlycarefooter.php";
?>