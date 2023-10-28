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

    if (isset($_SESSION['deleted_healthtip'])) {
        $healthtip_delete = $_SESSION['deleted_healthtip'];
    }


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
        <link href="assets/css/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500&family=Montserrat:wght@500;700&family=Nunito+Sans:opsz@6..12&family=PT+Serif&family=Roboto+Slab&family=Roboto:wght@300&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='assets/css/styles.css'>
        <title>Profile</title>
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
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col" style="background-color:#143566;">
                        <!-- Navbar -->
                    <nav class="navbar navbar-expand-lg sticky-top navbar_img" style="background-color:#143566;">
                        <div class="container-fluid p-3" style="background-color:#143566;">
                        <h1 class=""><a class="navbar-brand brandname text-white" href="#">EarlyCare</a></h1>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-light custom_nav_link px-5">
                                    <li class="nav-item"><a class="nav-link active text-light" aria-current="page" href="index.php">Home</a></li>
                                    <li class="nav-item"><a class="nav-link active text-light" href="about.php">About</a></li>
                                    <li class="nav-item"><a class="nav-link active text-light" href="contact.php">Contact</a></li>
                                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle text-light" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Plan</a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                        <li><a class="dropdown-item" href="plan.php">Basic</a></li>
                                        <li><a class="dropdown-item" href="plan.php">Standard</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="plan.php">Premium</a></li>
                                    </ul>
                                    </li>
                                </ul> 
                            </div>
                        </div>
                    </nav>
                        <!-- Navbar -->
                </div>
            </div>
                <!-- HOMEPAGE NAVBAR -->

            <div class="row">
                <div class="col-md-2 bg-dark" style="">
                    <a href="profile.php" class="list-group-item list-group-item-action bg-dark text-light">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">View Users</a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Add Category</a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="">Fetch Category</a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light">Publish Articles</a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light"></a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light"></a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light"></a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id=""></a>
                    <a href="#" class="list-group-item list-group-item-action bg-dark text-light" id="">Settings</a>
                </div>

                <div class="col-md-10">
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
                                    <img src="assets/images/community.png" alt="goal photo" width="70" class="">
                                </div>
                                    <a href="#" class="card-link"><h5 class="card-title text-center mt-3">Community</h5></a>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
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
                                        <img src="assets/images/healthtips.png" alt="goal photo" width="70" class="">
                                    </div>
                                    <h5 class="card-title text-center mt-3" id="healthtips"><a href="#" class="card-link">Health Tips</a></h5>
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
                        </div>
                    </div>
                        <div class="row">
                            <div class="col d-flex justify-content-center">

                                <div class="card" style="width: 14rem;">
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
                                </div>

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
      <div class="card-header py-3">
        <h5 class="mb-0">Registered Users</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <a href="addbook.php" class="btn btn-success">Add New</a>
       <table class="table table-striped">
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
            <input type="hidden" name="user_id" value="<?php echo $user["user_id"]; ?>">
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
         <p id="update_tips"><a href="#">Update</a></p>
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
    <p id="healthtip_back">Back</p>
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
                      <option value="<?php echo $cat["cat_id"];  ?>"> <?php echo $cat["cat_title"];  ?></option>
                     
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

            <input type="hidden" name="healthtips_id" value="<?php echo $health["healthtips_id"]; ?>">

            <button type="submit" href='#' name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp;
          <!-- editing a tag with the use of query string? -->
          <a href="editbook.php?id=<?php echo $health["healthtips_id"]?>" class='btn btn-sm btn-success'><i class='fa fa-pencil'></i> Edit</a>
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
         <p id=""><a href="#">Update Category</a></p>
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
<div class="container" id="category_list">
    
    <div class="row">
  <div class="col mb-4">
    <p id="cat_list_back">Back</p>
    <div class="card mb-4">
      <div class="card-header py-3">
        <h5 class="mb-0">All CATEGORIES</h5>
      </div>
      <div class="card-body" style="min-height:200px">
        <a href="addbook.php" class="btn btn-success">Add New</a>
       <table class="table table-striped">
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
          <!-- <a href='delete.php' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</a> -->
          <form action="process/delete_category_process.php" method="post">
            <input type="hidden" name="cat_id" value="<?php echo $cat["cat_id"]; ?>">
            <button type="submit" href='#' name="del_btn" class='btn btn-sm btn-danger'><i class='fa fa-trash'></i>&nbsp;Delete</button>
          </form>
          &nbsp;&nbsp;

          <a href='details.php' class='btn btn-sm btn-info'><i class='fa fa-list'></i>Details</a>
          &nbsp;&nbsp;
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
</div>
            <!--end of col 10  -->
            </div>






                <!-- footer -->
            <div class="row p-5" style="background-color: #E2E2E2;">
                <div class="col-md-4 text-center">
                    <a href="index.html"><img src="assets/images/logo3.png" alt="" width="200"></a> 
                    <h3><a href="#" class="text-decoration-none"> EARLYCARE </a></h3>
                </div>

                <div class="col-md-4">
                    <div class="mx-5 px-5">
                        <h3 class="mt-3">Company</h3>
                        <p><a href="about.php" class="text-decoration-none">About us</a></p>
                        <p><a href="contact.php" class="text-decoration-none">Contact Us</a></p>
                        <p><a href="plan.php" class="text-decoration-none"> plan</a></p>
                    </div>
                </div>

                <div class="col-md-4 d-flex justify-content-center">
                    <div class="mt-3">
                        <div>
                            <h3 class="">Find us on</h3>
                        </div>
                        <div>
                            <a href="https://www.facebook.com"><i class="fa-brands fa-facebook fa-2xl mt-0"></i></a> <span>Facebook</span>
                        </div>
                        <div>
                            <a href="https://www.x-twitter.com"><i class="fa-brands fa-square-x-twitter fa-2xl mt-4"></i></a> <span>Twitter</span>
                        </div>
                        <div>
                            <a href="https://www.instagram.com"><i class="fa-brands fa-square-instagram fa-2xl mt-4"></i></a> <span>Instagram</span>
                        </div>
                        <div>
                            <a href="https://www.linkedin.com"><i class="fa-brands fa-linkedin fa-2xl mt-4"></i></a> <span>Linkedin</span>
                        </div>
                        <div>
                            <a href="https://www.youtube.com"><i class="fa-brands fa-youtube fa-2xl mt-4"></i></a> <span>Youtube</span>
                        </div>
                    </div>
                </div>
                                    
                    <footer class="text-center">
                        <p>&copy; 2023 EarlyCare  |   Terms of use    |   privacy policy</p>
                        <p>Do not Sell or Share My Personal Information</p>
                    </footer>
            </div>    
                <!-- footer -->
                              
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>
            <script src="assets/scripts/jquery.js"></script>
            <script>
                $(document).ready(function(){
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

                });
            </script>
        </div>
    </body>
</html>