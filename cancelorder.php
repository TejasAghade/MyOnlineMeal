<?php

    include 'partials/_dbconnect.php';
    $orderCancel = "Cancelled";
    $payReturned = "Returned";

    session_start();
    $orderid = $_GET['orderid'];
    $userEmail = $_SESSION['user_email'];

    $sql = "UPDATE ORDERS SET order_status ='$orderCancel', payment_status = '$payReturned' WHERE id = '$orderid'";

    $result= mysqli_query($conn, $sql);

    if($result){
        header('location: myOrders.php');
    }else{
        echo 'failed';
    }



?>