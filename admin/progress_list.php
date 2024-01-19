<?php
session_start();
require_once "partials/header.php";
require_once "classes/Goal.php";
require_once "classes/Progress.php";

$contact = new Progress();
$response = $contact->fetch_all_progress();
//print_r($response);

// $deleted = $contact->delete_contact_us('contact_us_id');

?>

<!-- VIEW ALL CATEGORY ON A TABLE -->
<div class="container-fluid mt-5" id="progress_list">
    
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
        <h5 class="mb-0">All Progress</h5>
      </div>
        
      <div class="card-body" style="min-height:200px">
        <!-- <a href="#" class="btn btn-success">Add New</a> -->
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
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Goal</th>
      <th scope="col">Progress Value</th>  
      <th scope="col">Comment</th>
      <td scope="col">Date Added</td>
      <td scope="col">Action</td>
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($response as $progress) { 
         $id = $progress["goal_id"];
         $goal= new Goal();
         $result = $goal->get_goal_detail($id);
        
        ?>
    <tr>
        <th><?php echo $sn++;  ?></th>
        <td><?php echo $result["goal_title"]; ?></td>    
        <td><?php echo $progress["progress_value"]; ?></td>
        <td><?php echo $progress["comment"]; ?></td>    
        <td><?php echo $progress["progress_date_added"]; ?></td>
        <td style="display:flex !important;">
          <form action="process/delete_progress_process.php" method="post">
            <input type="hidden" name="progress_id" value="<?php echo $progress['progress_id']; ?>">
            <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp; Delete</button>
          </form>
          &nbsp;&nbsp;

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