<?php
session_start();
require_once "classes/Progress.php";
require_once "partials/header.php";


?>



<div class="container">
    
<!-- ACHIEVED GOAL -->
    <div class="row">

        <!--BACK BUTTON  -->
        <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="weightloss.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
        </div>
    <!-- BACK BUTTON -->


        <div class="col-md-6">
            <div class="">
                <form action="" method="" id="">
                    <h1>Task achieved</h1>
                    <p>To lose 1 kg in one month, you should aim for a daily caloric intake of approximately calories.</p>
                    <h5>Here are some general recommendations:</h5>
                    
                    <div>
                        <input type="checkbox" name="recommendations[]" id="check1">
                        <label for="">Today, i reduced my caloric intake by about 300-350 calories.</label>
                    </div>

                    <div>
                        <input type="checkbox" name="recommendations[]" id="check2">
                        <label for="">Today, i ate nutrient-dense foods and prioritize vegetables, lean protein, and whole grains.</label>
                    </div>

                    <div>
                        <input type="checkbox" name="recommendations[]" id="check3">
                        <label for="">Today, i engaged in a physical activity, including both cardio and strength training exercises.</label>
                    </div>
                </form>

                    <div>
                        <h3>Rewards</h3>
                        <div id="para"></div>
                    </div>
                </div>
        </div>


    </div>
</div>
    <!-- ACHIEVED GOAL -->




    <script src="assets/scripts/jquery.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
        var score = 0
             $("#check1").click(function() {
                if ($(this).prop("checked")) {
                    score += 20;
                } else {
                    score -= 20;
                }
                updateScore();
                //alert("Score: " + score);
            });

            $("#check2").click(function() {
                if ($(this).prop("checked")) {
                    score += 40; // Add 40 when Checkbox 2 is checked
                } else {
                    score -= 40; // Subtract 40 when Checkbox 2 is unchecked
                }
                updateScore();
                //alert("Score: " + score);
            });

            $("#check3").click(function() {
                if ($(this).prop("checked")) {
                    score += 40; // Add 40 when Checkbox 3 is checked
                } else {
                    score -= 40; // Subtract 40 when Checkbox 3 is unchecked
                }
                updateScore();
                //("Score: " + score);
            });

            function updateScore() {
                $("#para").text("Score: " + score);
            }

        })
    </script>

<?php require_once "partials/earlycarefooter.php"; ?>
