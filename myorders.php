<?php

include 'partials/_dbconnect.php';
include 'partials/_header.php';

if(!isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])){
    header('location: login.php');
}


$userEmail = $_SESSION['user_email'];
$userName = $_SESSION['user_name'];

$sql = "select * from orders where user_email = '$userEmail'";

$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders MyOnlineMeal</title>
    <?php include('css.php'); ?>
    <link rel="stylesheet" href="./css/headercolors.css">

</head>
<body>

    <?php include 'partials/_nav.php'; ?>

<section class="order-sec">
<div class="order-wrapper">
    
            <div class="head-text-wr">

                    <div class="orderTitle">
                        <h2>My <span>o</span>rders</h2>
                    </div>

                    <div class="order-items">

                    <?php 

                            if($num > 0){
                                echo '<h2><span>'.$num.'</span> orders</h2>';
                            }else{
                                echo '<h2><span>NO</span> orders</h2>';

                            }

                        ?>

                    </div>
            </div>

    <div class="order-product-wrapper">
        <?php
            if($num > 0){
                while($row = mysqli_fetch_assoc($result)){
                        
                echo '<div class="order-product-box">

                        <div class="right">
                                <div class="product-img">
                                    <img src="foodimg/'.$row['food_img'].'" class="cart-p-img">
                                </div>

                                <div class="name-price-wr">

                                    <div class="product-name">
                                        <h4>'.$row['food_name'].'</h4>
                                    </div>

                                    

                                </div>

                                <div class="buttons cl-dl">';

                                    if($row['order_status']== "Cancelled"){

                                    echo  '<h4 class="cancelled">Order Cancelled</h4>';

                                    }elseif ($row['order_status'] == "Delivered") {

                                        echo  '<h4 class="delivered">Order Delivered</h4>';

                                    }else{

                                        echo '<a href="cancelorder.php?orderid='.$row['id'].'">
                                                <img src="images/cancel.png" class="ico-crt-buy buy">
                                            </a>';
                                    }

                                echo '</div>
                        </div>

                        <div class="left">                    
                                <div class="det-wrapper">
                                    <div class="order-time ml">
                                        <h4><span>Order Time : </span>'.$row['order_time'].'</h4>
                                    </div>';



                                    echo '<div class="deliver-status ml">
                                        <h4><span>Delivery Status : </span>'.$row['order_status'].'</h4>
                                    </div>

                                    <div class="product-price  ml">
                                        <h4><span>Payment Type : </span>'.$row['payment_type'].'</h4>                                 
                                    </div>
                                    
                                    <div class="product-price  ml">
                                        <h4><span>Payment Status : </span>'.$row['payment_status'].'</h4>                                 
                                    </div>

                                    <div class="product-price  ml">
                                        <h4> <span>Qty :</span>  '.$row['qty'].'</h4>
                                    </div>
                                    
                                

                                <div class="bill-price  ml">
                                    <h4><span>Total Bill :</span> ₹ '.$row['total_bill'].'</h4>
                                </div>
                            </div>
                        </div>

                    </div>';
                }

            }else{
                echo '<div class="no-items">                        
                <img src="images/cart0.png">
                </div>';
            }
        
        ?>

        
    </div>

</div>
<?php include 'search-modal.php'; ?>     

</section>


    <script src="js/main.js"></script>
    <?php include 'footer.php'; ?>
    <script>
            var preUrl = window.location.href;
    if (preUrl == null)
      alert( "The previous page url is empty");





  window.onpopstate = function () {

    window.location.replace(preUrl);

  }; history.pushState({}, '');

    </script>
</body>
</html>