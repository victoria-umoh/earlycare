<?php
session_start();
//require_once "guards/admin_guard.php";
require_once "classes/Category.php";
require_once "partials/header.php";

//getting book from query string
//check first if d book exist
//since we are expecting a number, check d value is numeric
//then call d method nd pass d number as an argument

if(isset($_GET["id"])){
  $cat_id = $_GET["id"];
  //if sm1 changes d id to non numeric, redirect
    if(!is_numeric($cat_id)) {
      header("location:category_list.php");
      exit();
    }

    $cat = new Category();
    $category = $cat->get_category_detail($cat_id);
    //print_r($category);
    if(!$category){
      header("location:category_list.php");
      exit();
    }

   
}
else{
  header("location:category_list.php");
  exit();
}






?>

<!-- EDIT CATEGORY -->
<div class="container mt-5" id="edit_category">
      <div class="row">

          <!--BACK BUTTON  -->
          <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="category_list.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
          </div>
    <!-- BACK BUTTON -->


        <div class="col-md-6">
          <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0">Update Category</h5>
            </div>
          <form action="process/edit_category_process.php" method="post" class="m-3">
            
                <div class="row mb-4">
                  <div class="col-md-6">
                    <div class="form-outline">
                      <label class="form-label" for="form7Example1">Category Title</label>
                      <input type="text" id="form7Example1" class="form-control" name="title" value="<?php echo $category['cat_title']; ?>"/>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-outline">
                      <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"> <?php echo  $category['cat_desc'] ?></textarea>
                    <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $category['cat_id']; ?>">
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" name="edit_cat">Update Category</button>
                </div>
       
              </form>
              </div>
        </div>
      </div>
</div>    
<!-- EDIT CATEGORY -->
<?php include_once "partials/earlycarefooter.php"; ?>