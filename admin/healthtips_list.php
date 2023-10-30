<?php
session_start();
require_once("partials/header.php");
//require_once "guards/admin_guard.php";
require_once "classes/Healthtip.php";
require_once "classes/Category.php";

$health = new Healthtip();
$healths = $health->fetch_all_healthtips();
// echo "<pre>";
// print_r($healths);
// echo "</pre>";

?>

<!-- VIEW ALL HEALTH TIPS ON A TABLE -->
<div class="container-fluid mt-5">
    <div class="row">


            <!--BACK BUTTON  -->
        <div class="col-md-2 mb-4">
          <div class="card mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
             <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
            </div>
          </div>
        </div>
    <!-- BACK BUTTON -->
  

  <div class="col-md-10 mb-4">
    <div class="card mb-4">
      
      <div class="card-header py-3">
        <h5 class="mb-0">All Health-Tips</h5>
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
                        if (isset($_SESSION["deleted_healthtip"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["deleted_healthtip"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["deleted_healthtip"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
      </div>

      <div class="card-body" style="min-height:200px">
        <a href="add_healthtip.php" class="btn btn-success">Add New</a>
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Health-Tips Title</th>
      <th scope="col">Health-Tips Description</th>  
      <th scope="col">Health-Tips Cover Image</th>
      <th scope="col">Added Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($healths as $health){
      $id = $health["category_id"];
      $health_title = new Category();
      $title = $health_title->get_category_detail($id);
      //print_r($title);
      ?>
    <tr>
        <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php   echo $title["cat_title"] ; ?></td>
        <td><?php   echo $health["healthtips_title"]; ?></td>    
        <td><?php   echo $health["healthtips_description"]; ?></td>
        <td><img src="../uploads/<?php echo $health["cover_image"]; ?>" width="50" alt="healthtips photo" /></td>
        <td><?php   echo $health["added_date"]; ?></td>
        <td style="display:flex !important;">
          
          <form action="process/delete_healthtip_process.php" method="post">
            <input type="hidden" name="healthtips_id" value="<?php echo $health["healthtips_id"]; ?>">
            <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <!-- <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp; -->

          <a href="edit_healthtips.php?id=<?php echo $health["healthtips_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
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
<!-- VIEW ALL HEALTH TIPS ON A TABLE -->
 



<?php
require_once("partials/earlycarefooter.php");
?>



