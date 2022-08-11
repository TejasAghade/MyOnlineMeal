<?php

  session_start();
  if(!isset($_SESSION['user_name'])){
    header('location: login.php');
    die();
  }

  include 'partials/_dbconnect.php';
  $paymentMethod = "cod";

  $food_img;

  if(isset($_GET['id'])){
  $foodid= $_GET['id'];
  $result = mysqli_query($conn, "select * from food where food_id = '$foodid'");
  $row = mysqli_fetch_assoc($result);
  $foodPrice = $row['food_price'];
  $foodName=$row['food_name'];

  $food_img=$row['food_img'];
}

$acHolder=$_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing MyOnlineMeal</title>
    <?php  include('css.php'); ?>
    <link rel="stylesheet" href="./css/headercolors.css">
    

</head>
<body> 
  <?php  include 'partials/_nav.php'; ?>


<section class="pers-inf-sec">

  <div class="heading-txt">
    <h2>Checkout</h2>
  </div>


  <div class="b-cont-wrapper">


    <div class="left-sid">

      <div class="personal-info">

        <h2>Shipping Address</h2>

        <form id="form" action="purchase.php"
          method="post">

          <div class="addr-flex">
            <div class="inp-wr">
              <input type="hidden" name="name" id="name" value="<?php echo $acHolder; ?>">

              <input type="hidden" name="foodName" id="foodName" value="<?php echo $foodName; ?>">
              <input type="hidden" name="foodPrice" id="foodPrice" value="<?php echo $foodPrice; ?>">

              <input type="hidden" name="foodImg" id="name" value="<?php echo $food_img; ?>">
              <input type="hidden" name="foodId" value="<?php echo $foodid; ?>">


              <input type="hidden" name="userMail" id="userMail" value="<?php echo $userEmail; ?>">
              <span>Reciever's name:</span><br>
              <div class="receiverName">
                <h3>
                  <?php echo $acHolder; ?>
                </h3>
              </div>
            </div>
          </div>
          <div class="inp-wr">
            <input type="text" name="phone" id="phone" class="phone" max="10" placeholder="Phone">
          </div>


          <div class="inp-wr">
            <textarea name="address" id="addr" cols="40" rows="2" placeholder="Address" style="resize:none;"></textarea>
          </div>

          <div class="addr-flex">
            <div class="inp-wr">
              <input type="text" name="city" id="city" class="small" placeholder="City">
            </div>

            <div class="inp-wr">
              <input type="text" name="pinCode" id="pinCode" class="small" placeholder="Pin Code">
            </div>
          </div>

          <div id="addrError"></div>

      </div> <!-- personal info end-->
      <hr>

      <!-- payment information section -->

      <div class="payment-info">

        <h2>Select Payment Option</h2>

        <div class="options-wrapper">

          <div class="option">
            <input type="radio" name="payOp" id="cod-op" value="cod" checked > <span> Cash On
              Delivery</span>
          </div>

          <!-- <div class="option">
            <input type="radio" name="payOp" id="upi-op" value="upi" onclick="desablebtn(); showUpi();"> <span>
              UPI</span>
          </div>

          <div class="option">
            <input type="radio" name="payOp" id="card-op" value="card" onclick="desablebtn(); showPayForm();"> <span>
              Credit, Debit & ATM cards</span>
          </div> -->

        </div>



<!-- 
        <div class="payment-form" id="pay-form">


          <div class="upi" id="upi">

            <div class="upi-title-wr">
              <p>Add New UPI</p>

              <div class="upi-icons-wr">
                <img src="images/paytm.png" class="upi-ico">
                <img src="images/gpay.png" class="upi-ico">
                <img src="images/phonepe.png" class="upi-ico phonepe">
              </div>
            </div>

            <input type="text" name="upiId" placeholder="example@upi" oninput="payoption(this.value);">
            <div class="upi-id-err"></div>



          </div>


          <div class="card-sec" id="card-sec">

            <div class="acc-cards">

              <p>Accepted Cards</p>

              <div class="card-ico">

              </div>
            </div>



            <div class="card-info-wr">



              <div class="card-input">
                <h4>Name Of Card Holder</h4>
                <input type="text" name="cardHName" id="cardHName" placeholder="Name on Card" oninput="">
              </div>

              <div class="card-input">
                <h4>Card No</h4>
                <input type="text" name="cardNo" id="" placeholder="1111-2222-3333-4444" oninput="">

              </div>

              <div class="card-input exp-m">
                <h4>Exp Month</h4>
                <input type="text" name="expMonth" id="" placeholder="september" oninput="">

              </div>



              <div class="inp-flex">

                <div class="card-input exp">
                  <h4>Exp Year</h4>
                  <input type="text" name="expYear" id="" placeholder="2022" oninput="">
                </div>

                <div class="card-input cvv">
                  <h4>cvv</h4>
                  <input type="text" name="cvv" id="" placeholder="325" onkeyup="payoption(this.value);">
                </div>

              </div>
              <div id="cardError"></div>
            </div>

          </div>

        </div> -->

      </div>

    </div>

    <div class="right-sid">
      <div class="prod-box">

        <div class="prod-img-bx">
          <img src="foodimg/<?php echo $row['food_img'] ?>">
        </div>

        <div class="prod-txt-wrapper">
          <div class="text txt1">
            <h3>
              <?php echo $row['food_name'] ?>
            </h3>
          </div>
        </div>

      </div>

      <div class="qty-wr">

        <!-- <form action=""> -->
        <div class="qty">
          <span>qty : </span>



          <input type="number" id="qty" name="qty" value="1" max="5" min="1" oninput="showHint(this.value)"
            onkeyup="showHint(this.value)">



        </div>
        <!-- </form> -->
        <p>Total : ₹ <span id="txtHint"></span></p>
        <hr>
      </div>
      <div class="checkout-btn">
        <input type="submit" class="checkout" name="checkout" id="checkout" value="Checkout">
      </div>
      </form>
    </div>
  </div>
  <?php include 'search-modal.php'; ?>     

</section>

    

<?php
include 'footer.php'; 
?>




<script>


  document.getElementById("txtHint").innerHTML = "<?php echo $foodPrice; ?>";


  function showHint(str) {

    if (str.length == 0) {

      document.getElementById("txtHint").innerHTML = "";
      return;

    } else {

      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {

        if (this.readyState == 4 && this.status == 200) {

          document.getElementById("txtHint").innerHTML = this.responseText;
        }

      };

      xmlhttp.open("GET", "getprice.php?q=" + str + "&prc=" + <?php echo $foodPrice; ?>, true);
      xmlhttp.send();

    }
  }






  // let checkout_button = document.getElementById('checkout');
  // checkout_button.style.backgroundColor = "#924660";
  // checkout_button.disabled = true;

  function cash() {
    checkout_button.style.backgroundColor = "#ff075a";
    checkout_button.disabled = false;

  }

  // function desablecheckout_button() {
  //   checkout_button.style.backgroundColor = "#924660";
  //   checkout_button.disabled = true;

  // }

  // function payoption(str) {

  //   if (str.value != '') {
  //     checkout_button.style.backgroundColor = "#ff075a";
  //     checkout_button.disabled = false;


  //   } else {
  //     checkout_button.style.backgroundColor = "#924660";
  //     checkout_button.disabled = true;

  //   }

  // }




  // payment form show hide

  var payForm = document.getElementById("card-sec");
  var upi = document.getElementById("upi");

  // function showPayForm() {


  //   payForm.style.display = "block";
  //   upi.style.display = "none";

  // }

  // function showUpi() {

  //   upi.style.display = "block";
  //   payForm.style.display = "none";

  // }

  // function hideOther() {
  //   payForm.style.display = "none";
  //   upi.style.display = "none";

  // }


  // address details


  // upi payment detail



  // payment Option

  // let payOp = document.getElementsByName('payOp');

  let upiId = document.getElementsByName('upiId');


  let form = document.getElementById('form');
  let addrError = document.getElementById('addrError');
  let cardError = document.getElementById('cardError');

  let username = document.getElementById('name');
  //    let userMail = document.getElementById('userMail');
  let phone = document.getElementById('phone');
  let addr = document.getElementById('addr');
  let city = document.getElementById('city');
  let pinCode = document.getElementById('pinCode');

  form.addEventListener('submit', (e) => {



    let messages = []
    let cardMessages = []

    if (username.value === '' && phone.value === '' && addr.value === '' && city.value === '' && pinCode.value === '') {
      messages.push("*all fields are required!");

    } else {


      if (username.value === '' || username.value === null) {
        messages.push("*Name ");
      }

      if (phone.value === '' || phone.value === null) {
        messages.push("*Phone No ");
      }

      if (addr.value === '' || addr.value === null) {
        messages.push("*Address ");
      }

      if (city.value === '' || city.value === null) {
        messages.push("*City ");
      }

      if (pinCode.value === '' || pinCode.value === null) {
        messages.push("Pin Code is required!");
      }


    }



    if (messages.length > 0) {
      e.preventDefault();
      addrError.innerText = messages.join(', ')
    }


  })





    var preUrl = window.location.href;
    if (preUrl == null)
      alert( "The previous page url is empty");





  window.onpopstate = function () {

    window.location.replace(preUrl);

  }; history.pushState({}, '');




</script>

   
</body>
</html>