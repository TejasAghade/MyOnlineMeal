<?php 


include './partials/_dbconnect.php';

$sql = "select distinct(category) from food";

$result = mysqli_query($conn, $sql) or die("query failed.");






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Menu MyOnlineMeal</title>
    <?php include('css.php'); ?>
    <link rel="stylesheet" href="./css/headercolors.css">




</head>

<body>

    <?php include'partials/_nav.php'?>


    <div id="mid-content">

        <section class="menu our-menu" id="menu">




            <div class="cont ms-5 ps-5 me-5 pe-5">

                <div class="">

                    <h2 class="titleText"><span>F</span>ilter Food </h2>
                    


                    
                   

                </div>

                <!-- <div class="filter-search-wrapper"></div> -->
                <div class="filter mt-2">

                

                    <div class="cost mt-2 me-4">
                        <span>Cost:</span>
                        <a href="filter.php?low-to-high" class="link text-danger ms-3">Low To High</a>
                        <a href="filter.php?high-to-low" class="link text-danger ms-3">Hight To Low</a>                     


                    </div>



                    <div class="sort-category-section">

                        <form>
                            <select class="form-select" id="category-box" aria-label="Default select example">
                                <option selected>Category</option>
                                

                                <?php

                                    while($row = mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$row['category'].'">'.$row['category'].'</option>';
                                    }


                                ?>
                               
                            </select>
                        </form>

                    </div>



                </div>

            </div>









            <div class="content">


                <?php
                    

                    $sql2 = "select * from food";

                    if(isset($_GET['low-to-high'])){

                        $sql2 = "select * from food ORDER BY food_price ASC";

                    }
                    if(isset($_GET['high-to-low'])){

                        $sql2 = "select * from food ORDER BY food_price DESC";

                    }

                    $result = mysqli_query($conn, $sql2);

                    $num = mysqli_num_rows($result);
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
                    
                    
                    ?>










            </div>
            <?php include 'search-modal.php'; ?>     

        </section>
    </div>
    <?php include 'footer.php'?>
    <script src="js/main.js"></script>

</body>

</html>