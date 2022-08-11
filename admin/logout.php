<?php

    session_start();
    setcookie('email', 'admin_email',60);
    setcookie('admin_name', 'admin_name',60);
    session_destroy();
    header('location: admin-login.php');

?>