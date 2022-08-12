<?php 
    
    $exist = false;
    $empty = false;
    $err=true;
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../partials/_dbconnect.php';

        
        $admin_name = $_POST['name'];
        $admin_email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];


        if(($admin_name !="") && ($password !="") && ($admin_email !="")){
         //checking if the record the information is available in database
            $sql2 = "select * from admin where admin_email ='$admin_email'";

            $result2 = mysqli_query($conn, $sql2);

            // validation if record is available or not the in database
            if(mysqli_num_rows($result2) == 0){
                
            
                if($password == $cpassword){
                    
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "insert into admin (admin_name, admin_email, password) VALUES ('$admin_name', '$admin_email','$hash')";
                        $result = mysqli_query($conn, $sql);
                        
                    if($result){

                        echo "<script>alert('Registration Successfull')</script>";
                        header("location:admin-login.php");
                        
                    }else{
                        echo "<script>alert('Something goes wrong')</script>";

                    }
                }

            }
            else{
                echo "<script>alert('User Already Exist')</script>";

            }

        }    
        else{
            echo "<script>alert('All fields are required')</script>";

        }

    }



    




?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup | MyOnlineMeal</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="../css/adminlogin.css">
    <link rel="icon" type="image/x-icon" href="../images/favicon-32x32.png">

</head>

<body>

<header class="nav">
<a href="admin-dashboard.php" class="logo">MyOnlineMeal<span>.</span></a>

<ul class="navigation">        
    <li><a href="admin-login.php"> Login </a></li>
</ul>

</header>

    <div class="container container2">
        
        <div class="signupform">


                <form class="form" action="admin-signup.php" method="post">
                    <div class="signuptext">
                        <h2>Admin Signup</h2>
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
                        <input type="submit" class="btn" value="Signup">
                    </div>
                    <div class="login-link">
                        <p>Already have an account? <a href="admin-login.php">Login</a><p>
                    </div>

                </form>

            
        </div>
        
    </div>


    <?php include '../footer.php'?>

</body>
</html>