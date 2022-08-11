<?php


$admin_login = false;
$empty = false;
$showError=false;
$found = true;

session_start();
if(isset($_SESSION['email']) && isset($_COOKIE['email'])){
    header('location: index.php');
    die();
}


if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '../partials/_dbconnect.php';

    $admin_email = $_POST['email'];
    $password = $_POST['password'];

    if(($admin_email != "") && ($password != "")){

        $sql = "select * from admin where admin_email ='$admin_email'";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if($num == 1){
            $row = mysqli_fetch_assoc($result);

            if($row){
                //verifying hash
                if(password_verify($password, $row['password'])){
                        
                        $admin_login = true;
                        session_start();
                        // $_SESSION['admin-login'] = true;
                        $_SESSION['email'] = $row['admin_email'];

                        $_SESSION['admin_name'] = $row['admin_name'];

                        setcookie('email', $row['admin_email'], time()+60*60*24*30);
                        
                        setcookie('admin_name', $row['admin_name'], time()+60*60*24*30);

                        echo "<script>alert('Login Successfull')</script>";
                        
                        //redirect
                        header("location: index.php");

                }
                else{
                        $showError = true;
                    }
            }
            

        }
        else{
            // $showError = true;
            $found = false;
        }

    }else{
        $empty = true;
    }

} 



    if($empty){
        echo "<script>alert('Please enter Username And Password To Login')</script>";
    }
    // if($admin_login){
    //     echo "<script>alert('Login Successfull')</script>";

    // }
    if($showError){
        echo "<script>alert('invalid credentials')</script>";

    }




?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | MyOnlineMeal</title>
    <link rel="stylesheet" href="../css/adminlogin.css">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
      
    </style>
</head>

<body>

    <!-- navigation -->
<header class="nav">
<a href="admin-dashboard.php" class="logo">MyOnlineMeal<span>.</span></a>


</header>
    

    
    <div class="container">
       
        <div class="loginform">
            

                <form class="form" action="admin-login.php" method="post">
                    <div class="logintext">

                        <h2>Admin Login</h2>
                    </div>
                    <div class="form-box">
                        <input type="email" name="email" class="email" placeholder="email">
                    </div>

                    <div class="form-box">
                        <input type="password" name="password" class="password" placeholder="Password">
                    </div>

                    <div class="form-box login-btn">
                        <input type="submit" class="btn" value="Login">
                    </div>


                </form>
            
            
        </div>

    </div>
    
    <?php
    
    ?>
    
    <?php include '../footer.php'?>

</body>






</html>