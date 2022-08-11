<?php

include '../../../partials/_dbconnect.php';

if(isset($_POST['id']) && isset($_POST['id']) != ""){

    $id = $_POST['id'];


    $query = "select * from orders where id='".$id."'";

    $result = mysqli_query($conn, $query);

    // if(!$result){
    //     exit(mysqli_error());
    // }

    $response = array();

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
    }else{
        $response['status'] = 200;
        $response['message'] = "Data Not Found";
    }

    echo json_encode($response);



}else{
    $response['status'] = 200;
    $response['message'] = "Invalid Request";
}



?>