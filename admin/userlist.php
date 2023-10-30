<?php
session_start();
require_once("partials/header.php");
//require_once "guards/admin_guard.php";
require_once ("classes/User.php");

$user = new User();
$users = $user->fetch_all_users();
//print_r($users);

$user_deleted = $user->delete_user("user_id");

?>

<!-- USERL LIST -->
<div class="container-fluid mt-5" id="userlist">
    
    <div class="row">

       <!--BACK BUTTON  -->
          <div class="col-md-1 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
          </div>
    <!-- BACK BUTTON -->

  <div class="col mb-11">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Registered Users</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <!-- <a href="addbook.php" class="btn btn-success">Add New</a> -->
          <div>
            <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["delete_msg"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                           <strong><?php echo $_SESSION["delete_msg"]; ?></strong>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- unset the displayed errored msg -->
                        <?php unset($_SESSION["delete_msg"]); ?>
                        <?php
                        }
                        ?>
                        <!-- End of error message -->
          </div>
       <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">FirstName</th>
              <th scope="col">LastName</th>  
              <th scope="col">Email</th>
              <th scope="col">Height</th>
              <th scope="col">Gender</th>
              <th scope="col">DOB</th>
              <th scope="col">DP</th>
              <th scope="col">Reg Date</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <tbody>
            <?php $sn = 1;  ?>
              <?php foreach($users as $user) { ?>
                <tr>
                  <td scope="row"><?php echo $sn++;  ?></td>
                  <td><?php echo $user["user_firstname"]; ?></td>    
                  <td><?php echo $user["user_lastname"]; ?></td>
                  <td><?php echo $user["user_email"]; ?></td>
                  <td><?php echo $user["user_height"]; ?></td>
                  <td><?php echo $user["user_gender"]; ?></td>
                  <td><?php echo $user["user_dob"]; ?></td>
                  <td><img src="../uploads/<?php echo $user["user_dp"]; ?>" width="50" alt="User Image" /></td>
                  <td><?php echo $user["user_reg_date"]; ?></td>
                  <td><?php echo $user["user_role"]; ?></td>
                  <td style="display:flex !important;">
                    <form action="process/delete_user_process.php" method="post">
                      <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                      <button type="submit" name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
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
<!-- USERL LIST -->
 



<?php
require_once("partials/earlycarefooter.php");
?> -->