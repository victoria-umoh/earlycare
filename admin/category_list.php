<?php
session_start();
require_once("partials/header.php");
//require_once "guards/admin_guard.php";
require_once ("classes/Category.php");

$cat = new Category();
$categories = $cat->fetch_category();
//print_r($users);

$cat_deleted = $cat->delete_category("cat_id");

?>

<!-- VIEW ALL CATEGORY ON A TABLE -->
<div class="container-fluid mt-5" id="category_list">
    
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
        <h5 class="mb-0">All CATEGORIES</h5>
      </div>
        <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["cat_edit_msg"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["cat_edit_msg"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["cat_edit_msg"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
        </div>
        <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["delete_cat"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["delete_cat"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["delete_cat"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
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
      <div class="card-body" style="min-height:200px">
        <a href="add_category.php" class="btn btn-success">Add New</a>
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Title</th>
      <th scope="col">Category Description</th>  
      <th scope="col">Category Date Created</th>
      <td scope="col">Action</td>
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($categories as $cat) { ?>
    <tr>
      <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php echo $cat["cat_title"]; ?></td>    
        <td><?php echo $cat["cat_desc"]; ?></td>
        <td><?php echo $cat["cat_date_created"]; ?></td>
        <td style="display:flex !important;">
          <form action="process/delete_category_process.php" method="post">
            <input type="hidden" name="cat_id" value="<?php echo $cat["cat_id"]; ?>">
            <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <!-- <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp; -->
          
          <!-- editing a tag with the use of query string? -->
          <a href="edit_category.php?id=<?php echo $cat["cat_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
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