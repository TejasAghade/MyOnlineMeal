<?php

    include 'partials/_dbconnect.php';
    
    $cartid = $_GET['cartid'];
    $userEmail = $_SESSION['user_email'];

    $sql = "delete from cart where id = '$cartid' and user_email= '$userEmail' ";

    $result= mysqli_query($conn, $sql);

    if($result){
        header('location: cart.php');
    }else{
        echo 'failed';
    }



?>