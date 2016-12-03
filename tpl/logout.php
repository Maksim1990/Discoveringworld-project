<?php
session_start(); 

//Unset Session
unset($_SESSION['is_login_in']);
unset($_SESSION['user_email']);
unset($_SESSION['username']);
unset($_SESSION['id']);
    header("Location: /index.php"); 
?>