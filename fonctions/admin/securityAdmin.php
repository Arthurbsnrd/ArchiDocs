<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['auth']) || $_SESSION['role'] !== "admin")
    {
        header('Location: ../../index.php');
    }   else {
        print_r($_SESSION);
    }
?>