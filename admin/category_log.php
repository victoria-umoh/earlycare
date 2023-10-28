<?php

error_reporting(E_ALL);
include_once "partials/header.php";
?>


<!-- CATEGORY LOG -->
<div class="container">
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
    
        <div class="col-md-6 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Category</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <!-- <p id="add_cat"><a href="add_category.php">Add Category</a></p> -->
        <p id="view_cat"><a href="category_list.php">View Category</a></p>
      </div>
    </div>
  </div>
    </div>
</div>
<!-- CATEGORY LOG -->
<?php
include "partials/earlycarefooter.php";
?>