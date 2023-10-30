<?php
require_once("partials/header.php");
//require_once("guards/admin_guard.php");
require_once "classes/Healthtip.php";
require_once "classes/Category.php";

  $cat = new Category();
  $categories = $cat->fetch_Category();

  $health = new Healthtip();
  //$healths = $health->add_healthtip($category_id, $healthtips_title, $healthtips_description, $cover_image);

?>
<!-- ADD HEALTH TIPS -->
<div class="container mt-5" id="add_healthtips">
  <div class="row">

    <!--BACK BUTTON  -->
    <div class="col-md-3 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
      </div>
      <div class="card-body">
       <p><a href="healthtips_list.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
      </div>
    </div>
  </div>
    <!-- BACK BUTTON -->

  

    <div class="col-md-9 mb-4">
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">New Health Tips Detail</h5>
        </div>
        <div class="card-body">
          <form action="process/add_healthtip_process.php" method="post" enctype="multipart/form-data">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div>
                
            </div>
            <div class="row mb-4">
              <div class="col-md-6">
                <input type="hidden" name="healthips_id" id="healthips_id">
                <div class="form-outline">
                  <label class="form-label" for="form7Example1">Health-Tip Title</label>
                  <input type="text" id="form7Example1" class="form-control" name="title" required />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="form7Example1">Health-Tip Cover Picture</label>
                  <input type="file" id="form7Example1" class="form-control" name="cover" required />
                </div>
              </div>
            </div>


            <div class="row">
               <div class="col-md-6">
                  <label for="exampleFormControlTextarea1" class="form-label">Health-Tip Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
              </div>

              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="form7Example1">Health-Tip Category</label>
                  <select name="category" id="category">
                    <?php foreach ($categories as  $cat) { ?>
                      <option value="<?php echo $cat["cat_id"];  ?>"> <?php echo $cat["cat_title"];  ?></option>
                     
                    <?php  } ?>
                  </select>
                </div>
              </div>
              
            </div>

            <div class="form-outline mb-4 mt-4">
              <button type="submit" class="btn btn-primary btn-lg" name="add_book">Add HealthTips</button>
            </div>
   
          </form>
        </div>
      </div>
    </div>

 
</div>
</div>
<!-- ADD HEALTH TIPS -->
 



<?php
require_once("partials/earlycarefooter.php");
?>