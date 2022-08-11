<?php
    include '../../../partials/_dbconnect.php';




    $id = $_POST['id'];

    $sql = "DELETE FROM users WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
    if($result){
       
        echo 'user removed';

    }





?>