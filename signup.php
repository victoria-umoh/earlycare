<?php
session_start();
 include("partials/earlycarenav.php"); 

?>

   <div class="container-fluid">

        <!-- start of row 1 -->
    <div class="row signup">
            <div class="col-md-6 justify-content-center d-flex container-fluid">
                <div class="justify-content-center mt-2">
                    <form action="process/signup_process.php" id="signup" method="post" class="form-control alert alert-secondary rounded-3">
                        <h1 class="text-center">Sign up</h1>
                        <!--check if error msg is available in session-->
                        <div>
                            <?php
                            if (isset($_SESSION["signup_error"])) {                           
                            ?>

                            <!-- display error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["signup_error"]; ?></strong> You should check in on some of those fields below.
                            </div>

                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION["signup_error"]); ?>
                            
                            <?php
                            }
                            ?>
                        </div>
                        <!-- End of error message -->
                        
                        <p class="text-center">Already have an account? <a href="login.php">Login</a></p>
                        <label for="fname" class="visually-hidden"></label>
                        <input type="text" class="form-control mt-4" id="fname" name="firstname" placeholder="First Name*">
    
                        <label for="lname" class="visually-hidden"></label>
                        <input type="text" class="form-control mt-4" id="lname" name="lastname" placeholder="Last Name*">
    
                        <label for="email" class="visually-hidden"></label>
                        <input type="email" class="form-control mt-4" id="email" name="email" placeholder="Email Address*">
    
                        <label for="pwd" class="visually-hidden"></label>
                        <input type="password" class="form-control mt-4" id="pwd" name="password" placeholder="Password*">
    
                        <label for="confirmpwd password" class="visually-hidden"></label>
                        <input type="password" class="form-control mt-4" id="confirmpwd" name="confirmpassword" placeholder="Confirm password*">
                        
                        <label for="height" class="visually-hidden"></label>
                        <input type="number" class="form-control mt-4" id="height" name="height" placeholder="Height in cm*">

                        <label for="gender" class="form-label mt-4">Select gender</label><br>

                        <input type="radio" class="mb-4" id="male" name="gender" value="male">
                        <label for="male">male</label>

                        <input type="radio" class=" mb-4" id="female" name="gender" value="female">
                        <label for="female">female</label><br>

                        <label for="dob" class="form-label">DOB</label>
                        <input type="date" class="form-control" id="dob" name="dob"/>
                        
                        
                        
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="signup_btn" class="col-6 btn btn-lg btn-danger mt-5 rounded-pill">Create account</button>
                        </div>  
                       
                        <div class="d-flex justify-content-center mt-3">
                            <p>By continuing, you agree to EarlyCare <a href=""><a href="">terms & conditions</a></a> and <a href="">privacy policy</a></p>
                    </div>
                    </form>
                </div>
            </div>

    </div>
    <!-- End OF ROW 1 -->
    <?php 
        include "partials/earlycarefooter.php";
    ?>
  
    