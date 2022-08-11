<?php

    session_start();

    if(!isset($_SESSION['email']) && !isset($_COOKIE['admin_email'])){

        header('location: admin-login.php');
        die("Accesss Denied");
    }

    if(!isset($_SESSION['email']) && isset($_COOKIE['admin_email'])){

        $_SESSION['email'] =  $_COOKIE['admin_email'];
        header("location : index.php");
        
    }

?>





