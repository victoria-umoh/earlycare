<?php
session_start();
include "partials/header.php";

//COMING FROM PROFILE PAGE JAVASCRIPT
if(isset($_GET['id'])){
    $goal_id = $_GET['id'];
}
?>
<div class="container">
    <div class="row mt-5 mb-5">

        <!-- BACK BUTTON -->
        <div class="col-md-2 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3">
                </div>
                    <div class="card-body">
                    <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
                </div>
            </div>
        </div>
        <!-- BACK BUTTON -->

        <div class="col-md-6 mb-4">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h5 class="mb-0">Set Progress</h5>
            </div>
            <div class="">
            <form action="process/set_progress_process.php" method="post" class="mt-5 mb-5 px-5 pe-5">
                <!--check if error msg is available in session-->
                <div>
                            <?php
                            if (isset($_SESSION['progress'])) {                           
                            ?>

                            <!-- display error msg -->
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['progress']; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION['progress']); ?>
                            
                            <?php
                            }
                            ?>
                </div>
                        <!-- End of error message -->
                <!--check if error msg is available in session-->
                <div>
                            <?php
                            if (isset($_SESSION['set_progress'])) {                           
                            ?>

                            <!-- display error msg -->
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong><?php echo $_SESSION['set_progress']; ?></strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>

                            <!-- unset the displayed errored msg -->
                            <?php unset($_SESSION['set_progress']); ?>
                            
                            <?php
                            }
                            ?>
                </div>
                        <!-- End of error message -->

                <div>
                    <input type="hidden" name="goal_id" value="<?php echo $goal_id; ?>">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label for="progress_value">Progress Value</label></div>
                    <div class="col-md-6"><input type="text" name="progress_value" class="form-control" required /></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6"><label for="comment">Comment</label></div>
                    <div class="col-md-6"><textarea name="comment" id="comment" class="form-control" cols="30" rows="10" placeholder="did you reach your goal?"></textarea></div>
                </div>
                <div>
                    <button type="submit" name="submit" class="btn btn-outline-warning col-6">record progress</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>















<?php
include "partials/earlycarefooter.php";
?>