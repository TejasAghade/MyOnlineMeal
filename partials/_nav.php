<?php 

// include '_header.php';

$user_name = "Login";
    if(isset($_COOKIE['user_name']) || isset($_SESSION['user_name'])){
        $_SESSION['user_name'] = $_COOKIE['user_name'];
        $user_name = $_SESSION['user_name'];
    }


echo '
<header class="header">
<a href="index.php" class="logo">MyOnlineMeal<span>.</span></a>

<div class="menuToggle" onclick="toggleMenu();"></div>

<ul class="navigation">
    <li><a href="#"  data-bs-toggle="modal" data-bs-target="#exampleModal" id="search" onclick="toggleMenu();"> Search</a></li>

    <li><a href="viewall.php" id="allMenue" onclick="toggleMenu();"> Menu</a></li>
    

    <li><a href="contactus.php" onclick="toggleMenu();"> Contact </a></li>
    
    <li><a href="index.php#about" onclick="toggleMenu();"> AboutUs </a></li>
    
    ';


    if(isset($_SESSION['user_name'])){

            
        echo ' 
        <li>
        <div class="action">
    
            <div class="profile " onclick="dMenuToggle();">
                <a><h4 class="user-name">'.$user_name.'</h4></a>
            </div>
    
            <div class="d-menu">
                <h3>'.$user_name.'<br><span>User</span> </h3>
                <ul class="ps-0">

                    <li><img src="images/cart.png"><a href="cart.php" id="car" onclick="toggleMenu();"> Cart</a></li>
                    <li><img src="images/order.png"><a href="myorders.php" id="orders">My Orders</a></li>
                    <li><img src="images/logout.png"><a href="logout.php" >Logout</a></li>
                    
                </ul>
            </div>
        </div>
        </li>';
    }else{
        echo '
        <li><a href="login.php" onclick="toggleMenu();"> Login </a></li>';
    }

    

  echo '  
</ul>
</header>';

?>