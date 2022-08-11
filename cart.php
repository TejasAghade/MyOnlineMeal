<?php
    include 'partials/_dbconnect.php';
    include 'partials/_header.php';

    // session_start();
    if(!isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])){
        header('location: login.php');
    }

   
  

    $userEmail = $_SESSION['user_email'];

    $sql = "select * from cart where user_email = '$userEmail'";

    $result = mysqli_query($conn, $sql);

    $num= mysqli_num_rows($result);

    $foodId;



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart MyOnlineMeal</title>
    <?php include('css.php'); ?>
    <link rel="stylesheet" href="./css/headercolors.css">

    <style>
        .box a{
            text-decoration: none; 
        }
    </style>

</head>
<body>

    <?php include 'partials/_nav.php'; ?>


    <section class="cart-sec">
    <div class="cart-wrapper">
        
        <div class="head-text-wr">

            <div class="cartTitle">
                <h2>Your <span>C</span>art</h2>
            </div>
            
            <div class="cart-items">
                <?php   
                        if($num > 0){
                        echo '<h4><span>'.$num. '</span> items in cart</h4>';
                        }else{
                            echo '<h4>Your cart is <span>empty</span></h4>';

                        }
                ?>
            </div>
        </div>

        <div class="cart-product-wrapper">


            <!-- use loop to show the product of cart fetch all the cart items using email from session  -->
            <?php
                
            if ($num > 0) {

                while($row = mysqli_fetch_assoc($result)){

                echo '   <div class="box">

                <a href="billing.php?id='.$row['food_id'].'" class="box-link" >

                    <div class="food-img-box">

                        <img src="foodimg/'.$row['food_img'].'" class="food-img" alt="">

                    </div>

                    <div class="name mt-3">

                        <h3 class="box-food-name">'.$row['food_name'].'</h3>
                        

                    </div>                    

                    <div class="price mt-3">
                        <span class="box-food-price">₹'.$row['food_price'].' for each</span>
                    </div>

                </a>

                <div class="buy-text">

                    <a href="billing.php?id='.$row['food_id'].'" class="box-link2" >BUY</a>

                </div>

            </div>'; 
                }
            }else{
                echo '
                    <div class="no-items">                        
                    <img src="images/cart0.png">
                    </div>';
            }
        ?>

        </div>


    </div>
    </section>



    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
    
</body>
</html>