<?php
session_start();
error_reporting(E_ALL);
include "partials/earlycarenav.php";
//require_once "guards/user_guard.php";
?>



   <div class="container-fluid">
     <!-- START OF ROW 1 -->

        <div class="row">
            <div class="col justify-content-center d-flex">
                <div class="col-6 justify-content-center mt-5">
                    <form action="process/login_process.php" method="post" class="form-control alert alert-secondary rounded mt-5 mb-5">
                            <h1 class="text-center">Login</h1>
                            <!--check if error msg is available in session-->
                            <div>
                                <?php
                                if (isset($_SESSION["login_error"])) {                           
                                ?>
                                <!-- display/echo error msg -->
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?php echo $_SESSION["login_error"]; ?></strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <!-- unset the displayed errored msg -->
                                <?php unset($_SESSION["login_error"]); ?>                      
                                <?php
                                }
                                ?>
                            </div>
                            <!-- End of error message -->
                            <!--check if error msg is available in session-->
                        <div>
                            <?php
                            if (isset($_SESSION["signup_error"])) {                           
                            ?>

                            <!-- display error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["signup_error"]; ?></strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION["signup_error"]); ?>
                            
                            <?php
                            }
                            ?>
                        </div>
                        <!-- End of error message -->
                            <p class="text-center">New to EarlyCare? <a href="signup.php">Sign up for free</a></p>
                            <label for="email" class="visually-hidden"></label>
                            <input type="email" class="form-control p-3" name="email" placeholder="Email Adrress*">
                            <label for="password" class="visually-hidden "></label>
                            <input type="password" id="password" name="password" class="form-control mt-3 p-3" placeholder="Password*">
                            <p class=""><a href="">Forgot password?</a></p>

                        
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="loginbtn" class="col-6 btn btn-lg btn-danger mt-3 mb-3 rounded-pill">Log in</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>    
   </div>
<?php 
   include "partials/earlycarefooter.php";
?>
   
