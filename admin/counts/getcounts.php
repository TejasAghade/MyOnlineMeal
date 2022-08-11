<?php

include '../../partials/_dbconnect.php';

    $response = array();

    $query = "select * from orders where order_status ='new'";

    $result = mysqli_query($conn, $query);

    $num = mysqli_num_rows($result);

    



    $query2 = "select * from users";

    $result2 = mysqli_query($conn, $query2);

    $num2 = mysqli_num_rows($result2);

    
    
    $query3 = "select * from orders where order_status ='delivered'";

    $result3 = mysqli_query($conn, $query3);

    $num3 = mysqli_num_rows($result3);


    // $response['neworders'] = $num;
    // $response['users'] = $num2;
    // $response['dorders'] = $num3;
    
    // echo json_encode($response);


?>