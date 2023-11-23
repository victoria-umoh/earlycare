<?php
session_start();
include "partials/earlycarenav.php";

?>
   <div class="container-fluid">
     <!-- START OF ROW 1 -->

        <div class="row">
            <div class="col justify-content-center d-flex">
                <div class="col-6 justify-content-center mt-5">
                    <form action="process/login_process.php" method="post" class="form-control bg-secondary rounded mt-5 mb-5">
                        <h1 class="text-center">Login</h1>
                        <div>
                                <!--check if error msg is available in session-->
                            <?php
                                if (isset($_SESSION["guard_msg"])) {                           
                                ?>
                                <!-- display/echo error msg -->
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?php echo $_SESSION["guard_msg"]; ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <!-- unset the displayed errored msg -->
                                <?php unset($_SESSION["guard_msg"]); ?>                      
                                <?php
                                }
                            ?>
                            <!-- End of error message -->
                        </div>
                        <div>
                                <!--check if error msg is available in session-->
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
                            <!-- End of error message -->
                        </div>
                        
                        <h3 class="text-center">Admin Only</h3>
                            <label for="email" class="visually-hidden"></label>
                            <input type="text" class="form-control p-3" name="email" placeholder="Email Adrress*" required />
                            <label for="password" class="visually-hidden "></label>
                            <input type="password" id="password" name="password" class="form-control mt-3 p-3" placeholder="Password*" required />
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
   
