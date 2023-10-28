<?php
session_start();
require_once("partials/header.php");
//require_once "guards/admin_guard.php";
require_once ("classes/Price.php");
require_once "classes/PlanCategory.php";

$price = new Price();
$prices = $price->fetch_all_prices();
//print_r($users);

$price_deleted = $price->delete_price('price_id');

?>

<!-- VIEW ALL CATEGORY ON A TABLE -->
<div class="container mt-5" id="category_list">
    
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

  <div class="col-md-9 mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">PRICE LIST</h5>
      </div>
        <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["added"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["added"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["added"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
        </div>
        <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["updated"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["updated"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["updated"]); ?>
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
      <div class="card-body" style="min-height:200px">
        <a href="add_price.php" class="btn btn-success">Add New</a>
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>  
      <th scope="col">Price Amount</th>
      <th scope="col">Price Date Created</th>
      <td scope="col">Action</td>
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($prices as $price) {
        $id = $price["cat_price_id"];
        $plans = new PlanCategory();
        $result = $plans->get_category_detail($id);
        //print_r($title);    
    ?>
    <tr>
      <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php  echo $result['plan_cat_title']; ?></td>
        <!-- <td><?php  //echo $price["cat_price_id"]; ?></td>  -->
        <td><?php  echo $price["price_name"]; ?></td>    
        <td><?php  echo $price["date_created"]; ?></td>
        <td style="display:flex !important;">
        
        <!-- DELETE BUTTON -->
          <form action="process/delete_price_process.php" method="post">
            <input type="hidden" name="price_id" value="<?php echo $price["price_id"]; ?>">
            <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <!-- <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp; -->
          
          <!-- editing a tag with the use of query string? -->
          <!-- <a href="edit_price.php?id=<?php //echo $price["cat_id"] ?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a> -->

          <!-- UPDATE BUTTON -->
          <form action="edit_price.php" method="post">
            <input type="hidden" name="price_id" value="<?php echo $price["price_id"]; ?>">
            <button type="submit" name="edit_btn" class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i>&nbsp;Edit</button>
          </form>
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
<!-- VIEW ALL CATEGORY ON A TABLE -->
 



<?php
require_once("partials/earlycarefooter.php");
?>