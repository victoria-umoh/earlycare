<?php
session_start();
include "partials/header.php";
require_once "classes/Price.php";
require_once "classes/PlanCategory.php";


$price_cat = new PlanCategory();
$categories = $price_cat->fetch_category();


?>
<!-- ADD PRICE -->
<div class="container-fluid">
      <div class="row">

    <!--BACK BUTTON  -->
          <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="price_list.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
          </div>
    <!-- BACK BUTTON -->


        <div class="col-md-6">
            <div class="card-header py-3">
                <h5 class="mb-0">Add Price</h5>
            </div>
            
          <form action="process/add_price_process.php" method="post">
                <div class="row mb-4">
                  <div class="col-md-6">
                    <input type="hidden" name="price_id" id="price_id">
                    <div class="form-outline">
                      <label class="form-label" for="form7Example1"> Price Amount</label>
                      <input type="number" id="form7Example1" class="form-control" name="pname" required />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-outline">
                            <label class="form-label" for="form7Example1">Price Category</label>
                            <select name="category" id="category" class="form-control">
                                <?php foreach ($categories as  $cat) { 
                                    
                                ?>
                                <option value="<?php echo $cat["plan_cat_id"];  ?>"><?php echo $cat["plan_cat_title"];  ?></option>
                        
                                <?php  } ?>
                            </select>
                        </div>
                    </div>

                <div class="form-outline mb-4 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" name="add_btn">Add Price</button>
                </div>
       
              </form>
        </div>
      </div>
</div>    
<!-- ADD GOAL -->

<?php
include "partials/earlycarefooter.php";
?>