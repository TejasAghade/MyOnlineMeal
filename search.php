<?php

$search;
include 'partials/_dbconnect.php';
include 'partials/_header.php';

if (isset($_GET)) {

    $search = $_GET['search'];


    $sql2 = "select * from food where food_name like '%$search%' or food_desc like '%$search%' or category like '%$search%'";

    $result = mysqli_query($conn, $sql2);

    $num = mysqli_num_rows($result);
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search </title>
    <?php include('css.php'); ?>
    <link rel="stylesheet" href="./css/headercolors.css">



</head>
<body>

<?php include'partials/_nav.php'?>





<section class="menu our-menu" id="menu">

    <div class="cont">
        
        <div class="title">
            <h2 class="titleText"><span>F</span>ood Search</h2>
            <p>Your Search for <?php echo '<span>'.$search.',</span> <b>'.$num.'</b>'?> dish found! </p>
        </div>
    </div>


    
        
        
        

        <div class="content">


            <?php
                    
                    

                    if($num>0){

                        $count = 0;
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['food_id'];
                            $count+=1;
                                echo '
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
                                    <a href="addToCart.php?foodid='.$row['food_id'].'" class="box-link2" >Cart+</a>

                                </div>

                            </div>
                                ';
                                
                        }

                }else{
                    echo '
                    <div class="nf-msg">
                        <p> we can\'t find anything related to your search</p>
                    </div> ';

                }

                
                    
                    ?>

           


                        

            



        </div>
        <?php include 'search-modal.php'; ?>     

    </section>

    <?php include 'footer.php'?>
</body>
<script src="js/main.js"></script>

</html>