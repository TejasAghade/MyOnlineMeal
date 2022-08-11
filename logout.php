<?php

    session_start();
    setcookie('user_email', $row['user_email'],60);
    setcookie('user_name', $row['user_name'],60);

    session_unset();
    session_destroy();
    header('location: login.php');

?>