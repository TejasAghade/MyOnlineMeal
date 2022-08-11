<?php

    include './partials/_dbconnect.php';

    $sql = "select distinct(category) from food";
    // $sql = "select * from food_category";

    $result = mysqli_query($conn, $sql) or die("query failed.");

    

    

    // echo json_encode($output);
    
   




?>