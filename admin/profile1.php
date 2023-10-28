<?php
    session_start();
    //include "guards/user_guard.php";
    require_once "classes/User.php";
    require_once ("classes/Healthtip.php");
    require_once "classes/Category.php";


    if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
        
        $userr = new User();
        $user = $userr->fetch_user_details($user_id);

        $users = $userr->fetch_all_users();

        $user_deleted = $userr->delete_user("user_id");
        // echo "<pre>";
        // print_r($user);
        // echo "</pre>";
    }

    $health = new Healthtip();
    //$add_health = $health->add_healthtip($category_id, $healthtips_title, $healthtips_description, $cover_image);

    //$update_health = $health->update_healthtip($healthtips_title, $healthtips_description, $healthtips_id);

    //$fetch_health = $health->fetch_healthtip($healthtips_id);

    $healths = $health->fetch_all_healthtips();

    $health->delete_healthtip("healthtips_id");

    

   // HEALTH TIPS CATEGORY
    $cat = new Category();
    $categories = $cat->fetch_category();
    
    //$cat->delete_category($cat_id);

    // echo "<pre>";
    // print_r($fetch_health);
    // echo "</pre>";

    // if (isset($_SESSION['deleted_healthtip'])) {
    //     $healthtip_delete = $_SESSION['deleted_healthtip'];
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500&family=Montserrat:wght@500;700&family=Nunito+Sans:opsz@6..12&family=PT+Serif&family=Roboto+Slab&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='assets/css/styles.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="assets/css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
        <style type="text/css">
            .list-group-item{
                font-size: 20px;
                padding: 30px;
            }

            div{
/*                border: 1px solid red;*/
            }
        </style>

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Profile Image -->
           
            <div class="sidebar-brand-text mx-3">
                <img src="assets/icons/business.png" class="img-fluid rounded-circle mt-2" alt="">
            </div>
           

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <div class="col-12">
                        <div class="text-center mb-3">
                            <img src="assets/img/dp.png" class="img-fluid rounded-circle">
                        </div>
                    <a href="uploadprofilepicture.php" type="button" class="btn btn-warning text-light btn-block btn-sm">
                        Change Picture
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Activity Log
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Edit Profile</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Edit:</h6>
                        <a class="collapse-item" href="buttons.html">Edit Profile</a>
                        <a class="collapse-item" href="cards.html">Change password</a>
                    </div>
                </div>
            </li>

            <!-- Views -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Views</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">View Lists:</h6>
                        <a class="collapse-item" href="table.php">View Donations</a>
                        
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

           

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>Log out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="login.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- <div class="col-md-12 mb-4">
                    <div class="card mb-4 bg-primary">
                      <div class="card-header py-3 bg-primary" >
                        <h5 class="mb-0 text-center text-light">Profile</h5>
                      </div>
                      <div class="card-body text-light" style="min-height:50px">
                       <p class=" text-light">You can use the navigation at the top of the page to move around the site and the navigations below to carry out tasks on the platform okkkkk</p>


                       <p><a href="editprofile.php">Edit My Profile</a></p>
                        <p><a href="changepassword.php">Change Password</a></p>
                         <p><a href="logout.php">Logout</a></p>
                      </div>
                    </div>
                  </div> -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">      
                        <div class="col">
                          <h5 class="mb-0">Welcome <?php echo $user["user_firstname"]; ?>!</h5>
                          <p>Welcome to Admin dashboard</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row"  id="dashboard" style="">
                <div class="col">
                            
                        
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <div class="card" style="width: 14rem;">
                                <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/setgoal.png" alt="goal photo" width="70" class="">
                                </div>
                                    <h5 class="card-title text-center mt-3" id="all_users"><a href="#" class="card-link">All Users</a></h5>
                                </div>
                            </div>

                        <div class="card" style="width: 14rem;">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/setgoal.png" alt="goal photo" width="70" class="">
                                </div>
                                    <h5 class="card-title text-center mt-3" id="category"><a href="#" class="card-link">Category</a></h5>
                            </div>
                        </div>
                        <div class="card" style="width: 14rem;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/healthtips.png" alt="goal photo" width="70" class="">
                                    </div>
                                    <h5 class="card-title text-center mt-3" id="healthtips"><a href="#" class="card-link">Health Tips</a></h5>
                                </div>
                            </div>

                        

                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col d-flex justify-content-center">
                            <div class="card" style="width: 14rem;">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/trophy.png" alt="goal photo" width="70" class="">
                                </div>
                                <a href="#" class="card-link"><h5 class="card-title text-center mt-3">Plan</h5></a>
                            </div>
                            </div>

                            <div class="card" style="width: 14rem;">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/community.png" alt="goal photo" width="70" class="">
                                </div>
                                    <a href="#" class="card-link"><h5 class="card-title text-center mt-3">Community</h5></a>
                            </div>
                        </div>

                            <div class="card" style="width: 14rem;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/review.png" alt="goal photo" width="70" class="">
                                    </div>
                                    <a href="#" class="card-link"><h5 class="card-title text-center mt-3">Reviews</h5></a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">

                                <!-- <div class="card" style="width: 14rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/images/progressbar.png" alt="goal photo" width="70" class="">
                                        </div>
                                        <a href="#" class="card-link"><h5 class="card-title text-center mt-3">Progress</h5></a>
                                    </div>
                                </div>
                                  
                                <div class="card" style="width: 14rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/images/setgoal.png" alt="goal photo" width="70" class="">
                                        </div>
                                        <a href="#" class="card-link"><h5 class="card-title text-center mt-3">Goals</h5></a>
                                    </div>
                                </div>

                                <div class="card" style="width: 14rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/images/setgoal.png" alt="goal photo" width="70" class="">
                                        </div>
                                        <a href="#" class="card-link"><h5 class="card-title text-center mt-3">Goals</h5></a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        
                    </div>

                    </div>
            <!-- col 10 -->
<!-- USERL LIST -->
<div class="container" id="userlist" style="display:none">
    <p><a href="profile.php" class="text-decoration-none">Back</a></p>
    <div class="row">
  <div class="col mb-4">
    <div class="card mb-4">
      <div class="card-header py-3 bg-black">
        <h5 class="mb-0">Registered Users</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <a href="addbook.php" class="btn btn-success">Add New</a>
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>  
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($users as $user) { ?>
    <tr>
      <th scope="row"><?php echo $sn++;  ?></th>
      <!-- <td>The Devil returns</td> -->
        <td><?php   echo $user["user_firstname"]; ?></td>    
        <td><?php   echo $user["user_firstname"]; ?></td>
        <td><?php   echo $user["user_email"]; ?></td>
        <td><?php   echo $user["user_role"]; ?></td>
        <td style="display:flex !important;">
          <!-- <a href='delete.php' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</a> -->
          <form action="process/delete_user_process.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
            <button type="submit" href='delete.php' name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp;
          <!-- editing a tag with the use of query string? -->
          <!-- <a href="editbook.php?id=<?php //echo $user["user_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a> -->
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
<!-- USERS LIST -->

<!-- HEALTH TIPS LOG-->
<div class="container" id="about_healthtips" style="display:none">
    <div class="row">
        <div class="col-md-6 mb-4">
    <p id="healthtip_log_back">Back</p>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Healthips</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <p id="addtips"><a href="#">Add Healthips</a></p>
        <p id="view_healthtips"><a href="#">View Healthtips</a></p>
      </div>
    </div>
  </div>
    </div>
</div>
<!-- HEALTH TIPS LOG -->

<!-- ADD HEALTH TIPS -->
<div class="container" id="add_healthtips" style="display:none;">
  <div class="row">
    <div class="col mb-4">
    <p id="add_healthtip_back">Back</p>
      <div class="card mb-4">
        <div class="card-header py-3">
          <h5 class="mb-0">New Health Tips Detail</h5>
        </div>
        <div class="card-body">
            <!-- SESSION MSGS -->
            <div>
                <?php
                    if (isset($_SESSION['tips'])) {
                        ?>
                        <!-- Display "tips" error message -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["tips"]; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        // Unset the "tips" error message
                        unset($_SESSION["tips"]);
                        } 
                ?>
                <?php
                    if (isset($_SESSION["invalid_file"])) {
                        ?>
                        <!-- Display "invalid_file" error message -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["invalid_file"]; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        // Unset the "invalid_file" error message
                        unset($_SESSION["invalid_file"]);
                    }
                ?>
                <?php
                    if (isset($_SESSION['picture_size'])){
                        ?>
                        <!-- Display "picture_size" error message -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["picture_size"]; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        // Unset the "picture_size" error message
                        unset($_SESSION["picture_size"]);
                    }
                ?>
                <?php
                    if (isset($_SESSION["image_type"])) {
                        ?>
                        <!-- Display "image_type" error message -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["image_type"]; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        // Unset the "image_type" error message
                        unset($_SESSION["image_type"]);
                    }
                ?>
            </div>

          <form action="process/add_healthtip_process.php" method="post" enctype="multipart/form-data">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col-md-6">
                <input type="hidden" name="healthips_id" id="healthips_id">
                <div class="form-outline">
                  <label class="form-label" for="form7Example1">Health-Tip Title</label>
                  <input type="text" id="form7Example1" class="form-control" name="title" />
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="form7Example1">Health-Tip Cover Picture</label>
                  <input type="file" id="form7Example1" class="form-control" name="cover" />
                </div>
              </div>
            </div>


            <div class="row">
               <div class="col-md-6">
                  <label for="exampleFormControlTextarea1" class="form-label">Health-Tip Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
              </div>
              <div class="col-md-6">
                <div class="form-outline">
                  <label class="form-label" for="form7Example1">Health-Tip Category</label>
                  <select name="category" id="category">
                    <?php foreach ($categories as  $cat) { ?>
                      <option value="<?php echo $cat['cat_id'];  ?>"> <?php echo $cat["cat_title"];  ?></option>
                     
                    <?php  } ?>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-outline mb-4 mt-4">
              <button type="submit" class="btn btn-primary btn-lg" name="add_book">Add HealthTips</button>
            </div>
   
          </form>
        </div>
      </div>
    </div>
</div>
</div>
<!-- ADD HEALTH TIPS -->

<!-- VIEW ALL HEALTH TIPS ON A TABLE -->
<div class="container" id="show_healthtips" style="display:none">
    <a href="view_healthtips_back">Back</a>
    
    <div class="row">
  <div class="col mb-4">
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">All Health-Tips</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <a href="#" class="btn btn-success">Add New</a>
        <!--check if error msg is available in session-->
                        <?php
                        if(isset($_SESSION["deleted_healthtip"])) {                           
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
       <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Health-Tips Title</th>
      <th scope="col">Health-Tips Description</th>  
      <th scope="col">Health-Tips Cover Image</th>
      <th scope="col">Added Date</th>
      <!-- <th scope="col">Action</th> -->
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($healths as $health) { ?>
    <tr>
      <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php   echo $health["healthtips_title"]; ?></td>    
        <td><?php   echo $health["healthtips_description"]; ?></td>
        <td><?php   echo $health["cover_image"]; ?></td>
        <td><?php   echo $health["added_date"]; ?></td>
        <td style="display:flex !important;">


          <form action="process/delete_healthtip_process.php" method="post">

            <input type="hidden" name="healthtips_id" value="<?php echo $health['healthtips_id']; ?>">

            <button type="submit" href='#' name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <a href='#' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp;
          <!-- editing a tag with the use of query string? -->
          <a href="edit_healthtips.php?id=<?php echo $health['healthtips_id'];?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
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


<!-- CATEGORY LOG -->
<div class="container" id="category_log" style="display:none">
    <div class="row">
        <div class="col-md-6 mb-4">
            <p id="cat_log_back">Back</p>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">Category</h5>
      </div>
      <div class="card-body" style="min-height:200px">
       <p id="add_cat"><a href="#">Add Category</a></p>
        <p id="view_cat"><a href="#">View Category</a></p>
      </div>
    </div>
  </div>
    </div>
</div>
<!-- CATEGORY LOG -->


<!-- ADD CATEGORY -->
<div class="container" id="add_category" style="display:none;">
      <div class="row">
        <div class="col-md-6">
            <p id="add_cat_back">Back</p>
            <div class="card-header py-3">
                <h5 class="mb-0">Add Category</h5>
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
          <form action="process/add_category_process.php" method="post" enctype="multipart/form-data">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row mb-4">
                  <div class="col-md-6">
                    <input type="hidden" name="cat_id" id="cat_id">
                    <div class="form-outline">
                      <label class="form-label" for="form7Example1">Category Title</label>
                      <input type="text" id="form7Example1" class="form-control" name="title" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-outline">
                      <label for="exampleFormControlTextarea1" class="form-label">Category Description</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="desc" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="form-outline mb-4 mt-4">
                  <button type="submit" class="btn btn-primary btn-lg" name="add_cat">Add Category</button>
                </div>
       
              </form>
        </div>
      </div>
</div>    
<!-- ADD CATEGORY -->

<!-- VIEW ALL CATEGORY ON A TABLE -->
<div class="container" id="category_list" style="display:none">
    
    <div class="row">
  <div class="col mb-4">
    <p id="cat_list_back">Back</p>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">All CATEGORIES</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <a href="addbook.php" class="btn btn-success">Add New</a>
        <div>
            <!--check if error msg is available in session-->
                        <?php
                        if (isset($_SESSION["cat_edit_msg"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
            <?php
                        if (isset($_SESSION["delete_cat"])) {                           
                        ?>
                        <!-- display error msg -->
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
       <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Title</th>
      <th scope="col">Category Description</th>  
      <th scope="col">Category Date Created</th>
    </tr>
  </thead>

  <tbody>
  <?php $sn = 1;  ?>
    <?php foreach($categories as $cat) { ?>
    <tr>
      <th scope="row"><?php echo $sn++;  ?></th>
        <td><?php   echo $cat["cat_title"]; ?></td>    
        <td><?php   echo $cat["cat_desc"]; ?></td>
        <td><?php   echo $cat["cat_date_created"]; ?></td>
        <td style="display:flex !important;">
          <form action="process/delete_category_process.php" method="post" id="myform">
            <input type="hidden" name="cat_id" value="<?php echo $cat['cat_id']; ?>">

            <button type="submit" href='delete.php' name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>

          &nbsp;&nbsp;

          <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>

          &nbsp;&nbsp;

          <!-- editing a tag with the use of query string? -->
          <a href="edit_category.php?id=<?php echo $cat['cat_id']; ?>" class='btn btn-sm btn-success'>
            <i class='fa fa-pencil'></i> Edit</a>

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

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="assets/scripts/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/demo/chart-area-demo.js"></script>
    <script src="assets/js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="assets/scripts/jquery.js"></script>
            <script>
                $(document).ready(function(){
                    // $("profile.php").load(function(){
                    //     $("#userlist").hide();
                    //     $("#show_healthtips").hide();
                    //     $("#about_healthtips").hide();
                    //     $("#dashboard").show();
                    //     $("#add_healthtips").hide();
                    //     $("#add_category").hide();
                    //     $("#category_log").hide();
                    //     $("#category_list").hide();
                    // });

                    $("#all_users").click(function(){
                        $("#userlist").show();
                        $("#show_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#add_healthtips").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#category_list").hide();
                    });

                    $("#healthtips").click(function(){
                        $("#about_healthtips").show();
                        $("#show_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                        $("#add_healthtips").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#category_list").hide();

                    });

                    $("#addtips").click(function(){
                        $("#add_healthtips").show();
                        $("#show_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#category_list").hide();
                    });

                    $("#view_healthtips").click(function(){
                        $("#show_healthtips").show();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#category_list").hide();

                    });

                     $("#category").click(function(){
                        $("#category_log").show();
                        $("#add_category").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                        $("#category_list").hide();
                     });

                     $("#add_cat").click(function(){
                        $("#add_category").show();
                        $("#category_log").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                        $("#category_list").hide();

                     });

                     $("#view_cat").click(function(){
                        $("#category_list").show();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();

                     });

                     $("#cat_log_back").click(function(){
                        $("#category_list").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").show();
                        $("#userlist").hide();
                     });


                     $("#add_cat_back").click(function(){
                        $("#category_list").hide();
                        $("#add_category").hide();
                        $("#category_log").show();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                     });

                     $("#cat_list_back").click(function(){
                        $("#category_list").hide();
                        $("#add_category").hide();
                        $("#category_log").show();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                     });

                      $("#healthtip_log_back").click(function(){
                        $("#category_list").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").hide();
                        $("#dashboard").show();
                        $("#userlist").hide();
                     });

                      $("#healthtip_back").click(function(){
                        $("#category_list").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").show();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                     });

                       $("#view_healthtips_back").click(function(){
                        $("#category_list").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").show();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                     });

                       $("#add_healthtip_back").click(function(){
                        $("#category_list").hide();
                        $("#add_category").hide();
                        $("#category_log").hide();
                        $("#show_healthtips").hide();
                        $("#add_healthtips").hide();
                        $("#about_healthtips").show();
                        $("#dashboard").hide();
                        $("#userlist").hide();
                     });

                       // $("#healthtip_back").submit(function(){
                       //      $("#category_list").hide();
                       //      $("#add_category").hide();
                       //      $("#category_log").hide();
                       //      $("#show_healthtips").hide();
                       //      $("#add_healthtips").hide();
                       //      $("#about_healthtips").show();
                       //      $("#dashboard").hide();
                       //      $("#userlist").hide();
                       // });

                });
            </script>

</body>

</html>