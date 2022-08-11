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

                    <h2 class="titleText"><span>C</span>ategories</h2>

                </div>






                
            </div>









            <div class="content">


            <?php

            include 'partials/_dbconnect.php';

            $sql2 = "SELECT * FROM food_category";

            $result = mysqli_query($conn, $sql2);
            $num = mysqli_num_rows($result);

            while($row= mysqli_fetch_assoc($result)){


            echo '

            
            


            <div class="box  cat-box">

                <a href="browse-category.php?category='.$row['category'].'" class="box-link" >

                    <div class="food-img-box">

                        <img src="foodimg/category/'.$row['cat_img'].'" class="food-img" alt="">

                    </div>

                    <div class="category-text">
                        <span class="box-food-category">'.$row['category'].'</span>
                    </div>

                </a>

                <div class="browse-text">

                    <a href="browse-category.php?category='.$row['category'].'" class="box-link2" >View</a>

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