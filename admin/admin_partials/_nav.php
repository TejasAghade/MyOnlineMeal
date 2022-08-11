<?php

    

    // $result =mysqli_query($conn, "select * from admin where admin_email='".$_SESSION['email']."'");
    
    // $row = mysqli_fetch_assoc($result);
    $admin_name = "Login";
    if(isset($_COOKIE['admin_name']) || isset($_SESSION['admin_name'])){
        $_SESSION['admin_name'] = $_COOKIE['admin_name'];
        $admin_name = $_SESSION['admin_name'];
    }
    include '../partials/_dbconnect.php';
    $admin_email = $_SESSION['email'];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$admin_email'");
    $row = mysqli_fetch_assoc($result);
?> 


<!-- <header>
    <div class="admin-title">
    <a href="admin-dashboard.php" class="logo">MyOnlineMeal<span>.</span></a>
    </div>
    <div class="menuToggle" onclick="toggleMenu();"></div>

    <ul class="navigation">

        <li><a href="orders.php" onclick="toggleMenu();"> Orders</a></li>

        <li><a href="manage-food.php" onclick="toggleMenu();"> Food </a></li>

        <li><a href="manage-users.php" onclick="toggleMenu();"> Users </a></li>
        <li><a href="manage-admin.php" onclick="toggleMenu();"> Admins </a></li>
        <li>
        <div class="action">

            <div class="profile" style="margin-top: 3px;" onclick="dMenuToggle();">
                <a><h3 style="font-size: 1.1em;"><?php echo $admin_name?></h3></a>
            </div>

            <div class="d-menu" style="top: 60px;">
                <h3><?php echo $admin_name?><br><span>Admin</span> </h3>
                <ul>
                    
                    
                    <li><img src="../images/logout.png"><a href="logout.php">Logout</a></li>
                    
                </ul>
            </div>
        </div>

        </li>

     

        
    </ul>
</header> -->







