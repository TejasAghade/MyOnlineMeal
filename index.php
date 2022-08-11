
<?php 
// include 'partials/_header.php';

include 'partials/_dbconnect.php';


?>
 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyOnlineMeal.</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link href="css/style.css? <?=filemtime("css/style.css")?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/dropdown.css">
    <link href="css/dropdown.css? <?=filemtime("css/dropdown.css")?>" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="./images/favicon-32x32.png">
    <link rel="stylesheet" href="css/style3.css" type="text/css" />



</head>

<body>
    <!-- header -->
    <?php include'partials/_nav.php'?>


<!-- home section -->

    <section class="banner home" id="banner">

        <div class="content">
            <h2>Tasty, Hot and Hygienic</h2>
                <p>
                    Discover the best food & drinks
                </p>

            <div class="searchbox">

                <div class="wrapper">

                    <form action="search.php" method="get">
                        <input type="text" class="food-search " name="search" placeholder="Search for a Dish">
                        <input type="submit" class="btn btn-danger" value="Search">
                    </form>

                </div>

            </div>


        </div>

    </section>


<!-- food menu -->

    <section class="menu" id="menu">
    
        <div class="title">
            <h2 class="titleText"><span>C</span>ategories</h2>
            <p>Browse our popular Categories. </p>
        </div>

        <div class="content mb-3">

            


            <?php

                include 'partials/_dbconnect.php';
                
                $sql2 = "SELECT * FROM food_category LIMIT 4";

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


        <div class="title">

            <a href="all-categories.php" id="viewall" class="btn btn-danger">all Categories</a>

        </div>


    </section>




    <section class="about" style="margin-bottom: 30px ; " id="about">

<div class="title">
    <h2 class="titleText"><span>A</span>boutUs</h2>            
</div>

<div class="row">

    <div class="col50">
        <!-- <h2 class="titleText"><span>A</span>bout Us</h2> -->
        <p>MyOnlineMeal is an Indian online food ordering and delivery platform launched in 2022.
        Users can read menus, order, and buy food through a web browser.
        Meals are delivered by couriers using cars, scooters, bikes, or on foot.</p>

        <p>This food ordering website is basically India based company.
        It provides you the complete food solution through ordering and delivery facilities from your neighborhood restaurants.
        They also have the facilities like online payment and also believe in fast delivery</p>
        <p>Good things happen when people can move, whether across town or toward their dreams. Opportunities appear, open up, become reality. What started as a way to tap a button to get a ride has led to billions of moments of human connection as people around the world go all kinds of places in all kinds of ways with the help of our technology.</p>
        
    </div>
    <div class="col50">
        <div class="imgbx">
            <img src="images/img1.jpg">
        </div>

    </div>

</div>
<?php include 'search-modal.php'; ?>     

</section>


    

<!-- footer -->

    <?php include 'footer.php'?>



</body>



</html>



