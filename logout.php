<?php
    session_start();
    if($_SESSION['auth'] == true) {
        session_destroy();
        $_SESSION['auth']= false;
        header('Location:login.php');
    }
    
