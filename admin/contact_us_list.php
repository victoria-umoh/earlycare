<?php
session_start();
require_once "partials/header.php";
//require_once "guards/admin_guard.php";
require_once "classes/Contact.php";

$contact = new Contact();
$response = $contact->fetch_contact_us();
//print_r($response);

$deleted = $contact->delete_contact_us('contact_us_id');

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
        <h5 class="mb-0">All CONTACT US</h5>
      </div>
        <div>
                <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["delete"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["delete"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["delete"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
        </div>
      <div class="card-body" style="min-height:200px">
        <!-- <a href="#" class="btn btn-success">Add New</a> -->
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>  
      <th scope="col">Email</th>
      <th scope="col">Comment</th>
      <td scope="col">Date Added</td>
      <td scope="col">Action</td>
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($response as $contact) { ?>
    <tr>
      <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php   echo $contact["firstname"]; ?></td>    
        <td><?php   echo $contact["lastname"]; ?></td>
        <td><?php   echo $contact["email"]; ?></td>    
        <td><?php   echo $contact["comment"]; ?></td>
        <td><?php   echo $contact["date_added"]; ?></td>
        <td style="display:flex !important;">
          <form action="process/delete_contact_us_process.php" method="post">
            <input type="hidden" name="contact_us_id" value="<?php echo $contact['contact_us_id']; ?>">
            <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <!-- <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp; -->
          
          <!-- editing a tag with the use of query string? -->
          <!-- <a href="edit_category.php?id=<?php //echo $cat["cat_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a> -->
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