<?php
session_start();

require  "dict.php";
include 'functions.php';
if ($_GET['lang']){
    $_SESSION['lang']= trim(strip_tags($_GET['lang']));
    $date=time()+30*24*60*60;
    setcookie('lang',trim(strip_tags($_GET['lang'])),$date);
  
}
else if($_COOKIE['lang']){
   $_SESSION['lang']= $_COOKIE['lang']; 
  
}
else {
    $_SESSION['lang']='en';
}
$dict=  include 'dict/'.$_SESSION['lang'].'.php';


$_SESSION['url'] = $_SERVER['REQUEST_URI'];



?>

