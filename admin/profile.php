<?php
    session_start();
    require_once "../partials/header.php";
    //include "guards/admin_guard.php";
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
    

    $healths = $health->fetch_all_healthtips();

    $health->delete_healthtip("healthtips_id");

    

   // HEALTH TIPS CATEGORY
    $cat = new Category();
    $categories = $cat->fetch_category();
    
    //$cat->delete_category($cat_id);

    // echo "<pre>";
    // print_r($fetch_health);
    // echo "</pre>";

    if (isset($_SESSION['deleted_healthtip'])) {
        $healthtip_delete = $_SESSION['deleted_healthtip'];
    }
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

            body{
                font-size:25px;
                color:black;
                font-family: sans-serif;
            }
            .card-link{
                font-size:25px;
                color: black;
                font-family:serif;
                text-decoration:none;
                font-weight:600px;
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
           
            <div>
                <h5 class="text-center"><a href="profile.php" class="text-light text-center text-decoration-none">Dashboard</a></h5>
            </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <div class="col-12">
                            <!--check if error msg is available in session-->
                                        <?php
                                        if (isset($_SESSION["file_upload"])) {                           
                                        ?>
                                        <!-- display/echo error msg -->
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_SESSION["file_upload"]; ?></strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <!-- unset the displayed errored msg -->
                                        <?php unset($_SESSION["file_upload"]); ?>                      
                                        <?php
                                        }
                                        ?>
                                    <!-- End of error message -->
                        <div class="text-center mb-3" >
                            <img src="uploads/<?php echo $user['user_dp'];  ?>" width="100" class="img-fluid rounded-circle">
                        </div>
                    <a type="button" class="btn btn-warning text-light btn-block btn-sm" id="changePic">
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
                        <a class="collapse-item" id="updateProfile">Edit Profile</a>
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
                        <a class="collapse-item" href="plan_list.php">View Payment</a>
                        
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

                <!-- UPLOADPIC -->
                <div class="container mt-5" id="uploadprofilepic" style="display:none;">   
                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="card mb-4">
                        <div class="card-header py-3">

                            <h5 class="mb-0">Welcome <?php echo $user["user_firstname"]; ?>!</h5>
                        </div>
                        <div class="card-body">
                        <div>
                        <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
                        </div>
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
                </div>
                <!-- UPLOADPIC -->

                <!-- EDIT PROFILE DETAILS -->
                <div class="container bg-light mt-5 mb-5 pt-5 pb-5 justify-content-center" id="editProfile" style="display:none;">
                    <div class="row">
                    <div class="col-md-3 mb-4">
                            <div class="card mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                        <div>
                        <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
                        </div>
                        </div>
                        </div>
                    </div>
                        <div class="col-md-6 m-auto"> 
                            <div class="card">
                                <div class="card-header py-3">
                                    <p class="text-center mb-3 mt-3">Your profile</p> 
                                </div>
                                <div class="card-body">
                            <form method="post" action="process/update_profile_process.php">           
                                    <!--check if error msg is available in session-->
                                        <?php
                                        if (isset($_SESSION["update_successful"])) {                           
                                        ?>
                                        <!-- display/echo error msg -->
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong><?php echo $_SESSION["update_successful"]; ?></strong> 
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                        <!-- unset the displayed errored msg -->
                                        <?php unset($_SESSION["update_successful"]); ?>                      
                                        <?php
                                        }
                                        ?>
                                    <!-- End of error message -->
                                    <div class="row">
                                        <div class="col">
                                            <label for="fname" class="form-label">Firstname</label>
                                            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $user['user_firstname']; ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="lname" class="form-label">Lastname</label>
                                            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $user['user_lastname']; ?>">
                                        </div>
                                    </div>                      
                                    <div class="row">
                                        <div class="col">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['user_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col mt-3 d-flex justify-content-center">
                                        <button type="submit" name="submit" class="btn btn-outline-primary btn-lg"> Submit </button>
                                    </div> 
                            </form>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- EDIT PROFILE DETAILS -->

                <div class="container-fluid" id=allcards>
                    <div class="row">      
                        <div class="col-md-9">
                          <h5 class="mb-0">Hi <?php echo $user["user_firstname"]; ?>!</h5>
                          <p>Welcome to Admin dashboard</p>
                        </div>

                        <div class="col-md-3">
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
                        </div>
                    </div>
                    <hr>
                <div class="row mb-5 mt-5">
                    <div class="col">
                    <p id="ptag"></p>
                    <div class="row">
                        <div class="col d-flex justify-content-center" id="my_dashboard">
                            <div class="card" style="width: 14rem;">
                                <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/users.png" alt="goal photo" width="70" class="">
                                </div>
                                    <h5 class="card-title text-center mt-3" id="all_users">
                                        <a href="userlist.php" class="card-link">All Users</a>
                                    </h5>
                                </div>
                            </div>

                            <div class="card" style="width: 14rem;">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/widget.png" alt="goal photo" width="70" class="">
                                </div>
                                    <h5 class="card-title text-center mt-3" id="category"><a href="category_list.php" class="card-link">Category</a></h5>
                            </div>
                            </div>

                            <div class="card" style="width: 14rem;">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/community.png" alt="goal photo" width="70" class="">
                                </div>
                                <h5 class="card-title text-center mt-3"><a href="price_list.php" class="card-link">Plan Prices</a></h5>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <div class="card" style="width: 14rem;">
                            <div class="card-body">
                                <div class="d-flex justify-content-center">
                                    <img src="assets/images/payment.png" alt="goal photo" width="70" class="">
                                </div>
                                <h5 class="card-title text-center mt-3"><a href="plan_list.php" class="card-link">Plan</a></h5>
                            </div>
                            </div>

                            <div class="card" style="width: 14rem;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/healthtips.png" alt="goal photo" width="70" class="">
                                    </div>
                                    <h5 class="card-title text-center mt-3" id="healthtips"><a href="healthtips_list.php" class="card-link">Health Tips</a></h5>
                                </div>
                            </div>

                            <div class="card" style="width: 14rem;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-center">
                                        <img src="assets/images/rating.png" alt="goal photo" width="70" class="">
                                    </div>
                                    <h5 class="card-title text-center mt-3"><a href="#" class="card-link">Reviews</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">

                                <div class="card" style="width: 14rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/images/email.png" alt="goal photo" width="70" class="">
                                        </div>
                                        <h5 class="card-title text-center mt-3"><a href="contact_us_list.php" class="card-link">Contact us</a></h5>
                                    </div>
                                </div>
                                  
                                <div class="card" style="width: 14rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/images/setgoal.png" alt="goal photo" width="70" class="">
                                        </div>
                                        <h5 class="card-title text-center mt-3"><a href="goal_list.php" class="card-link">Goals</a></h5>
                                    </div>
                                </div>

                                <div class="card" style="width: 14rem;">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <img src="assets/images/options.png" alt="goal photo" width="70" class="">
                                        </div>
                                        <h5 class="card-title text-center mt-3"><a href="plan_category_list.php" class="card-link">Plan Category</a></h5>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>

    <!-- End of Content Wrapper -->

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
                <div class="modal-body">Are you sure you want to log out</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Yes</a>
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
            $("#changePic").click(function(){
                $("#uploadprofilepic").show();
                $("#allcards").hide();
                $("#editProfile").hide(); 
             });

             $("#updateProfile").click(function(){
                $("#uploadprofilepic").hide();
                $("#allcards").hide();
                $("#editProfile").show(); 
             });

        });
    </script>
</body>

</html>