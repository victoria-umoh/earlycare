<?php
session_start();
//require_once "guards/admin_guard.php";
require_once "classes/Healthtip.php";
require_once "partials/header.php";
require_once "classes/Category.php";

//getting category from query string
//check first if d category exist
//since we are expecting a number, check d value is numeric
//then call d method nd pass d number as an argument

$cat = new Category();
  $categories = $cat->fetch_Category();

if(isset($_GET["id"])){
  $healthtips_id = $_GET["id"];
  //if sm1 changes d id to non numeric, redirect
    if(!is_numeric($healthtips_id)) {
      header("location:healthtips_list.php");
      exit();
    }

    $heal = new Healthtip();
    $category = $heal->fetch_healthtip_detail($healthtips_id);
    //print_r($category);
    if(!$category){
      header("location:healthtips_list.php");
      exit();
    }

   
}
else{
  header("location:healthtips_list.php");
  exit();
}






?>

<!-- EDIT CATEGORY -->
<div class="container" id="edit_category">
      <div class="row mt-5">

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
                <h5 class="mb-0">Update Healthtips</h5>
            </div>
          <form action="process/edit_healthtip_process.php" method="post" class="p-3">
            
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="form-outline">
                      <label class="form-label" for="form7Example1">Healthtip Title</label>
                      <input type="text" id="form7Example1" class="form-control" name="title" value="<?php echo $category['healthtips_title'];?>"/>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-outline">
                      <label for="exampleFormControlTextarea1" class="form-label">Healthtip Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"><?php echo $category['healthtips_description'];?></textarea>
                    <input type="hidden" name="healthtips_id" id="healthtips_id" value="<?php echo $category['healthtips_id']; ?>">
                    </div>
                  </div>
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

                <div class="form-outline mb-4 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" name="edit_btn">Update Category</button>
                </div>
       
              </form>
            </div>
        </div>
      </div>
</div>    
<!-- EDIT CATEGORY -->
<?php include_once "partials/earlycarefooter.php"; ?>