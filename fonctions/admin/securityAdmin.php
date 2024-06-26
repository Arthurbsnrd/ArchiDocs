<?php 
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
if(!isset($_SESSION['auth']) || $_SESSION['role'] !== "admin")
    {
        header('Location: ../../index.php');
    }   else {
        // Ne rien faire car on est admin
    }
?>