<?php

include 'partials/_dbconnect.php';
include 'partials/_header.php';

// session_start();
if(!isset($_SESSION['user_name']) || !isset($_SESSION['user_email'])){
    header('location : login.php');
}

// $prodExist=false;
// $cartInsert = false;
$foodId;
$userEmail = $_SESSION['user_email'];

    if(isset($_GET)){

        $foodId = $_GET['foodid'];


        $result1 = mysqli_query($conn, "select * from food where food_id='$foodId'");
        $row1 = mysqli_fetch_assoc($result1);


        $foodName = $row1['food_name'];
        $foodPrice = $row1['food_price'];
        $foodImg = $row1['food_img'];

        $res = mysqli_query($conn, "select * from cart where user_email='$userEmail' and food_id ='$foodId'");
        $num = mysqli_num_rows($res);

        if($num >= 1){

                echo '<script> alert("item already added to cart") </script>';
            
                header('location: cart.php?');
                

           
        }else{
            
            $result2 = mysqli_query($conn, "INSERT INTO cart (food_id, user_email, food_name, food_price, food_img) VALUES ('$foodId', '$userEmail', '$foodName', '$foodPrice', '$foodImg')");

           
                header('location: cart.php');
                
            
            
        }


    }

?>