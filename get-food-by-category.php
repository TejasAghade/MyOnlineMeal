<?php

include './partials/_dbconnect.php';




    $category = $_POST['category'];

    // echo $category;

    $query = "select * from food where category='".$category."'";

    $result = mysqli_query($conn, $query);


    $response;

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo'

            <div class="box">

                <a href="billing.php?id='.$row['food_id'].'" class="box-link" >

                    <div class="food-img-box">

                        <img src="foodimg/'.$row['food_img'].'" class="food-img" alt="">

                    </div>

                    <div class="name mt-3">

                        <h3 class="box-food-name">'.$row['food_name'].'</h3>
                        

                    </div>
                    
                    <div class="cat-wrap">
                        <span class="box-food-category">'.$row['category'].'</span>
                    </div>

                    <div class="price mt-3">
                        <span class="box-food-price">₹'.$row['food_price'].' for each</span>
                    </div>

                </a>

                <div class="buy-text">

                    <a href="billing.php?id='.$row['food_id'].'" class="box-link2" >BUY</a>

                </div>

            </div>

            
            
            ';
        }
    }
    // else{
    //     $response['status'] = 200;
    //     $response['message'] = "Data Not Found";
    // }

    // echo json_encode($response);






?>