<!-- Navbar  -->
<?php
session_start();
require_once "partials/earlycarenav.php"; 

?>
<!-- Navbar -->

<div class="container-fluid">
        <!-- START OF ROW 1 -->
    <div class="row">
        
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <h2>Let's help improve your health</h2>
            <div>
                <!--check if error msg is available in session-->
                <?php
                            if (isset($_SESSION["contact"])) {                           
                            ?>
                            <!-- display/echo error msg -->
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION["contact"]; ?></strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION["contact"]); ?>                      
                            <?php
                            }
                            ?>
                <!-- End of error message -->
            </div>
            <form action="process/contact_process.php" method="post" class="form-control alert alert-secondary">
                <h3 class="text-center">Get in touch</h3>
                <label for="validationDefault01" class="visually-hidden"></label>
                <input type="text" class="form-control mt-4" id="validationDefault01" name="firstname" placeholder="First Name*" required/>

                <label for="validationDefault02" class="visually-hidden"></label>
                <input type="text" class="form-control mt-4" id="validationDefault02" name="lastname" placeholder="Last Name*" required />

                <label for="validationDefault03" class="visually-hidden"></label>
                <input type="email" class="form-control mt-4" id="validationDefault03" name="email" placeholder="Email Adrress*" required />

                <label for="validationDefault04" class=""></label>
                <textarea name="comment" id="validationDefault04" cols="30" rows="10" class="form-control" placeholder="Comment..." required></textarea>                
                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" class="col-6 btn btn-lg btn-primary mt-5 mb-5 rounded-pill">Submit</button>
                </div>
                
            </form>
        </div>
    </div>


    
    <!--  footer  -->
    <?php  include("partials/earlycarefooter.php"); ?>
    <!-- footer -->
 