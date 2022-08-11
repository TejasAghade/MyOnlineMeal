<?php

// echo '<script>alert("Delivery Boy Added")</script>';

include '../../../partials/_dbconnect.php';

// echo '<script>alert("Delivery Boy Added")</script>';


// extract($_POST);


// if (isset($_POST['submit'])){

    $deliverBoyName = $_POST['boy-name'];
    $deliveryBoyPhone = $_POST['boy-phone'];
    $deliveryBoyEmail = $_POST['boy-email'];


    $sql = "insert into delivery_boy( name, phone, email, doj ) values('$deliverBoyName', '$deliveryBoyPhone', '$deliveryBoyEmail', current_timestamp())";
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "Sucess";
    }



// }



?>