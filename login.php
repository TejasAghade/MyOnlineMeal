<?php



$empty = false;
$showError=false;
$found = true;

    session_start();

    if(isset($_SESSION['user_email']) && isset($_COOKIE['user_email'])){
        header('index.php');
        
    }

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(($email != "") && ($password != "")){

        $sql = "select * from users where email ='$email'";
        $result = mysqli_query($conn, $sql);

        $num = mysqli_num_rows($result);

        if($num == 1){
            $row = mysqli_fetch_assoc($result);

            if($row){
                //verifying hash
                if(password_verify($password, $row['password'])){
                     
                        session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['user_email'] = $row['email'];                       
                        $_SESSION['user_name'] = $row['name'];

                        setcookie('user_email', $_SESSION['user_email'], time()+60*60*24*30);

                        setcookie('user_name', $_SESSION['user_name'], time()+60*60*24*30);

                        //redirect
                        header("location: index.php");

                }
                else{
                        $showError = true;
                    }
            }
            

        }
        else{
            $found = false;
        }

    }

}



?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MyOnlineMeal</title>
    <?php include('css.php'); ?>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    
<header class="nav">
<a href="index.php" class="logo">MyOnlineMeal<span>.</span></a>

<ul class="navigation">        
    <li><a href="signup.php"> Signup </a></li>
</ul>

</header>
    
   
    <div class="container">
       
        <div class="loginform">
            

                <form id='form' class="form" action="login.php" method="post">
                    <div class="logintext">
                        <img src="images/user.png" class="icon-login">
                        <h2>Login</h2>
                    </div>
                    <div class="form-box">
                        <input type="email" name="email" class="email" id="email" placeholder="email">
                        <div id="no-email"></div>
                    </div>

                    <div class="form-box">
                        <input type="password" name="password" class="password" id="password" placeholder="Password">
                        <div id="no-pass"></div>
                    </div>
                    <div id="error"></div>
                    <div class="form-box login-btn">

                        <input type="submit" class="btn btn-danger px-5" value="Login">

                    </div>
                    <div class="signup-link ">
                        <p>don't have an account? <a href="signup.php">Signup</a><p>
                    </div>

                </form>
            
            
        </div>

    </div>
    
    <?php
    if($showError){
        echo "<script>alert('Invalid Password')</script>";
    }
    
    if(!$found){
        echo "<script>alert('Account Not Found!')</script>";
    }
    ?>

    <?php include 'footer.php'?>
    <script src="js/main.js"></script>
    <script src="js/loginvalidation.js"></script>
</body>



</html>