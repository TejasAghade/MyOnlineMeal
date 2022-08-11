<?php
    include '../../../partials/_dbconnect.php';


    $id =$_POST['id'];
    $name = $_POST['boy-name'];
    $phone = $_POST['boy-phone'];
    $email = $_POST['boy-email'];


    $sql = "update delivery_boy set `name`='$name', `phone`='$phone', `email`='$email' where `id`=$id";

    $result = mysqli_query($conn, $sql);
    if($result){
       
        echo 'delivery boy removed';

    }





?>