<?php


session_start();
    
if(!isset($_SESSION['user_email'])){

    if(isset($_COOKIE['user_email'])){
        
        $_SESSION['user_email'] =  $_COOKIE['user_email'];
        $_SESSION['user_name'] =  $_COOKIE['user_name'];
    
    }
    
}

?>