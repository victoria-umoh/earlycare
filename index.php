<?php 
include "partials/earlycarenav.php";
require_once "classes/Healthtip.php";

$healthtip = new Healthtip();
$healthtips = $healthtip->fetch_all_healthtips();

 ?>

    <div class="container-fluid">
        <div class="">
            <!-- Row 1 -->
            <div class="row overlay">
              <div class="col-md-6">
              <div class="p-5 mt-5 row1content text-white">
                <h4 class="text-decoration-underline pt-5">HEALTH, FITNESS & WELLNESS</h4>
                <h1>Preventive care leads to Early detection</h1>
                <p>With EarlyCare, you can monitor and track your health status/metrics by setting reminders for proper care 
                 and receive recommendations and support from our community.</p>
            </div>
        </div>
        <div class="col-md-6">
               
        </div>
        </div>
        <!-- End of Row 1 -->

        <!-- Row 2 -->
        <div class="row">
            <div class="col-md-6">
              <img src="assets/images/care1.jpg" class="img-fluid">
            </div>
            <div class="col-md-6">
              <h1 class="mt-5 pt-5">Let's helps you form healthy habits, stay accountable and track your progress</h1>
              <div class="row2content">
                <p>Deliver better outcomes with powerful enterprise solutions. Inform health decisions, 
                enhance triage to appropriate care, reduce avoidable costs. </p>
              </div>
            </div>
        </div>
        <!-- End of Row 2 -->

        <!-- Row 3 -->
        <div class="row text-center">
          <div class="col">
            <div class="mx-5 p-3">
              <h1>The Tools for Your Goals</h1>
              <p>Trying to lose weight, tone up, lower your BMI, or invest in your overall health? We give you the right features to get there.</p>
            </div>
          </div>
        </div>
        <!-- Row 3 -->

        <!-- Row 4 -->
        <div class="row text-center">
          <div class="d-flex justify-content-center wrapper">
            <div class="col-md-3 text-center">
              <div class="m-5 pt-5 pb-5 d-flex justify-content-center row4content">
                <img src="assets/images/setgoal.png" width="100" class="">
              </div>
              <p><strong> Set Goals & Receive Reminders</strong></p>
              <p>Schedule and receive timely reminders for hydration, medication intake, appointments, self-care routines, better sleep, or any health related tasks.</p>
            </div>

            <div class="col-md-3">
              <div class="m-5 pt-5 pb-5 d-flex justify-content-center row4content" style="width:200px; height:200px; border-radius: 50%;">
                <img src="assets/images/pulse1.png" width="100" class="">
              </div>
              <p><strong> Monitor and Track </strong></p>
              <p>Track and manage various health metrics, such as weight, BMI, blood pressure, heart rate, sleep patterns, and more. It might integrate with wearables and health devices to automatically sync data.</p>
            </div>

            <div class="col-md-3">
              <div class="m-5 pt-5 pb-5 d-flex justify-content-center row4content" style="width:200px; height:200px; border-radius: 50%;">
                <img src="assets/images/food.png" width="100" class="">
              </div>
              <p><strong> Record and Track </strong></p>
              <p>Record your dietary intake, monitor calorie consumption, track macronutrients, and set nutritional goals. Let's helps you form healthy habits, stay accountable and tracks your progress.</p>
            </div>

            <div class="col-md-3">
              <div class="m-5 pt-5 pb-5 d-flex justify-content-center row4content" style="width:200px; height:200px; border-radius: 50%;">
                <img src="assets/images/community.png" width="100" class="">
              </div>
              <p><strong> Stay Motivated</strong></p>
              <p>Connect with a community of individuals who share similar health and wellness goals. Share your achievements, challenges, and experiences.</p>
            </div>
          </div>
        </div>
        <!-- Row 4 -->

       
        
        

    <!-- footer -->
    <?php include "partials/earlycarefooter.php"; ?>
    <!-- footer -->