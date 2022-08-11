<?php
  include 'partials/_dbconnect.php';
  

  $foodid = $_POST['foodId'];
  $foodName = $_POST['foodName'];

  $foodPrice = $_POST['foodPrice'];

  $paymentStatus = "pending";


  $userMail = $_POST['userMail'];

  $name = $_POST['name'];

  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $pinCode = $_POST['pinCode']; //need to add
  
  $payOp = $_POST['payOp'];
  $qty = (int)$_POST['qty'];
  $foodImg = $_POST['foodImg'];

// if($_SERVER["REQUEST_METHOD"]=="POST"){



    $foodPrice = $foodPrice * (int)$qty;

      if( $name !=="" && $phone !=="" && $address !=="" && $city !=="" && $pinCode !=="" ){

           
                             
                
                
                $sql = "INSERT INTO `orders`( `food_id`, `user_email`, `user_name`, `food_name`, `food_img`, `qty`, `city`, `pin_code`, `user_address`, `user_phone`, `order_time`, `total_bill`, `payment_type`, `payment_status`, `order_status`) VALUES ('$foodid','$userMail', '$name', '$foodName', '$foodImg', '$qty', '$city', '$pinCode', '$address', '$phone', current_timestamp(), '$foodPrice', '$payOp', 'pending', 'new');";

                $result = mysqli_query($conn, $sql);

                if($result){

                  echo "<script>

                    alert('Order Successfull');

                  </script>";

                  header('location: myorders.php');

                }else{
                  echo $conn->error;
                }
            

      }




?>