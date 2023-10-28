<?php
include "partials/header.php";
?>


<!-- HEALTH TIPS LOG-->
<div class="container" id="about_healthtips">
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
        <h5 class="mb-0">Healthips</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <p id="addtips"><a href="add_healthtip.php">Add Healthips</a></p>
        <p id="view_healthtips"><a href="healthtips_list.php">View Healthtips</a></p>
      </div>
    </div>
  </div>
    </div>
</div>
<!-- HEALTH TIPS LOG -->

<?php
include "partials/earlycarefooter.php";
?>