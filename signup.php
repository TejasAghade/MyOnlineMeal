<?php 
    
    $exist = false;
    $empty = false;
    $err=true;
    
    session_start();

    if(isset($_SESSION['user_email']) && isset($_COOKIE['user_email'])){
        header('index.html');
        die();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';

        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        if(($name !="") && ($password !="") && ($email !="")){
         //checking if the record the information is available in database
            $sql2 = "SELECT * FROM `users` WHERE `email` = '$email'";

            $result2 = mysqli_query($conn, $sql2);

            // validation if record is available or not the in database
            if(mysqli_num_rows($result2) == 0){
                
            
                if(($password == $cpassword) && ($exist == false)){
                    // $hash = password_hash($password, PASSWORD_DEFAULT);
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "insert into users (name, email, password, doj) VALUES ('$name', '$email','$hash', current_timestamp())";
                        $result = mysqli_query($conn, $sql);
                        header("location: login.php");

                    if($result){
                        $err=false;
                    }
                }

            }
            else{
                $exist = true;
                
            }

        }    
        else{
                $empty = true;
        }

    }
?>

















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | MyOnlineMeal</title>
    <?php include('css.php'); ?>
    <link rel="stylesheet" href="./css/login.css">

    
</head>
<body>



<header class="nav">
<a href="index.php" class="logo">MyOnlineMeal<span>.</span></a>

<ul class="navigation">        
    <li><a href="login.php"> Login </a></li>
</ul>

</header>

    <div class="container container2">
        
        <div class="signupform">


                <form class="form" action="signup.php" method="post">
                
                    <div class="signuptext py-4">
                        <img src="images/user.png" class="icon-login">
                        <h2>Signup</h2>
                    </div>

                    <div class="form-box">
                        <input type="text" name="name" class="name" placeholder="Name" >
                    </div>
                    <div class="form-box">
                        <input type="email" name="email" class="email" placeholder="Email" >
                    </div>

                    <div class="form-box">
                        <input type="password" name="password" class="password" placeholder="Password" >
                    </div>
                    <div class="form-box">
                        <input type="password" name="cpassword" class="cpassword" placeholder="Confirm Password" >
                    </div>

                    <div class="form-box signup-btn">
                        <input type="submit" class="btn btn-info px-5" value="Sign-up">
                    </div>
                    <div class="login-link">
                        <p>Already have an account? <a href="login.php" >Login</a><p>
                    </div>

                </form>

            
        </div>
        
    </div>

<?php
        if(!$err){
            
            header('loacation: index.php');       
        }
        
        if($exist){
            echo '<script>alert("User Already Exist")</script>';

        }
        if($empty){
            echo '<script>alert("All fileds Required")</script>';

        }
    
?>
    <?php include 'footer.php'?>
</body>
</html>