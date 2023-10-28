<?php
    session_start();
    //include "guards/user_guard.php";
    //require_once("partials/header.php");
    require_once "classes/User.php";

    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        
        $userr = new User();
        $user = $userr->fetch_user_details($user_id);

        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
    }
?>
<div class="container" id="uploadprofilepic">   
    <div class="row">
         <div class="col-md-3 mb-4">
            <div class="card mb-4">
          <div class="card-header py-3">

             <h5 class="mb-0">Welcome <?php echo $user["user_firstname"]; ?>!</h5>
          </div>
          <div class="card-body">
           
          </div>
        </div>
      </div>

      <div class="col-md-9 mb-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Profile</h5>
          </div>
          <div class="card-body" style="min-height:200px">
            <form action="process/uploadprofilepic_process.php" method="post" enctype="multipart/form-data">
                <div>
                <label for="profilepic">Change profile picture</label>
                <input type="file" name="profile" id="profile" class="form-control">
                </div>
                <input type="hidden" name="user_id" value="<?php    echo $user_id;  ?>">
                <input type="submit" value="Change" name="uploadpicbtn" class="btn btn-primary mt-3">
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
//require_once("partials/footer.php");
?>