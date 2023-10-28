<?php
session_start();
//include_once "guards/user_guard.php";
     require_once "partials/header.php";
     require_once "classes/User.php";
     require_once "classes/Plan.php";
     require_once "classes/PlanCategory.php";

     $user_id=$_SESSION["user_id"];
     
     $user1= new User();
     $user=$user1->fetch_user_details($user_id);

     $plancat1 = new PlanCategory();
     $response = $plancat1->fetch_category();
    
?>

<section>
    <div class="container">
        
        <div class="row">
            <div class="col text-center">
                <h1>PRICE & PAYMENT</h1>
                <p>Select a plan that suites your need</p>
            </div>
        </div>

        <div class="row">
            <!--BACK BUTTON  -->
          <div class="col-md-3 mb-4">
            <div class="card mb-4">
              <div class="card-header py-3">
              </div>
              <div class="card-body">
               <p><a href="profile.php" class="text-decoration-none text-dark" style="font-size:25px;"><i class="fa-solid fa-arrow-right-arrow-left"></i>Back</a></p>
              </div>
            </div>
          </div>
        <!-- BACK BUTTON -->
            <div class="col-md-6 mb-4 card">
            <form id="paymentForm">
  <div class="form-group mt-2 mb-3">
    <label for="email" class="form-label">Email Address</label>
    <input type="email" class="form-control" id="email-address" value="<?php  echo $user["user_email"];?>" disabled required />
  </div>

  <div class="form-group mb-3">
    <label for="category" class="form-label">Select Category</label>
    <select class="form-control" name="plan_category" id="plan_category">
          <?php foreach ($response as $plancategory) { ?>
            <option value="<?php echo $plancategory['plan_cat_id']; ?>"><?php echo $plancategory['plan_cat_title']; ?></option>
            
          <?php  } ?>
    </select>
  </div>

  <div class="form-group mb-3">
    <label for="amount" class="form-label">Amount</label>
    <input type="number" class="form-control" id="amount" name="amount" value="200" readonly />
  </div>

  <input type="hidden" name="plans_cat" value="1" id="plans_cat" readonly/>

  <input type="hidden" name="user_id" value="<?php echo $user["user_id"];?>" id="user_id" />
  <div class="form-group">
    <label for="first-name" class="form-label">First Name</label>
    <input type="text" class="form-control" id="first-name" />
  </div>

  <div class="form-group mb-3">
    <label for="last-name" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="last-name" />
  </div>

  <div class="form-submit mt-3 mb-3">
    <button type="submit" class="btn btn-outline-primary" onclick="payWithPaystack()"> Pay </button>
  </div>
</form>
            </div>
        </div>
    </div>
</section>
<!-- <footer class="bg-primary py-3">
    <p class="text-center text-white">&#169;<?php echo date("Y"); ?> ALL RIGHT RESERVED </p>
</footer> -->

<script src="assets/script/pooper.js" crossorigin="anonymous"></script>
<script src="assets/script/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="assets/script/script.js" crossorigin="anonymous"></script>
<script src="assets/script/jquery313.js"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<script>
  $(document).ready(function(){
    $("#plan_category").change(function(){
      var fixedamount = $(this).val();
      // alert(fixedamount);
      $("#plans_cat").val(fixedamount);
      // AJAX CALL
      $("#amount").load("process/price_process.php", {"xyz":fixedamount}, function(response, status, xhr){
        $("#amount").val(response);
      });
    }); 
  });
var paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener('submit', payWithPaystack, false);
function payWithPaystack(e){
    e.preventDefault();
  var handler = PaystackPop.setup({
    key: 'pk_test_06a68fcb115734baf1107749edcd6773bb881c1e', // Replace with your public key
    email: document.getElementById('email-address').value,
    amount: document.getElementById('amount').value * 100, // the amount value is multiplied by 100 to convert to the lowest currency unit
    currency: 'NGN', // Use GHS for Ghana Cedis or USD for US Dollars
    // ref: 'YOUR_REFERENCE', // Replace with a reference you generated
    callback: function(response){
      //this happens after the payment is completed successfully
     var reference = response.reference;
      alert('Payment complete! Reference: ' + reference);
    var user_id = document.getElementById("user_id").value;
    var category = document.getElementById("plans_cat").value;

          // Make an AJAX call to your server with the reference to verify the transaction
          $.ajax({
           type: "post",
           url: "process/verify.php",
           data: {"reference": reference, "user_id":user_id, "category":category},
           success: function(response){
                      //alert(response);
                      var data = JSON.parse(response);
                           if(data.success){
                             alert("payment successfully");
                           }else{
                            alert("payment not successfully");
                           }

           }


          });


    },
    onClose: function() {
      alert('Transaction was not completed, window closed.');
    },
  });
  handler.openIframe();
}

</script>
<?php include "partials/earlycarefooter.php";?>
</body>
</html>