<?php
    include '../../../partials/_dbconnect.php';




    $id = $_POST['id'];

    $sql = "DELETE FROM delivery_boy WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
       
        echo 'delivery boy removed';

    }





?>