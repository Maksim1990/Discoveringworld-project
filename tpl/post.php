<?php 
// ----------------------------конфигурация-------------------------- // 
//Server
//Database name
//User login
//Password
//Variable to add connection to Database
//Choose Database
   include_once '/public/connection.php';
$redirectURL = '../index.php';

if (!$connect){
    exit(mysql_error());    
}
else {
      mysql_select_db("$db_name",$connect);
}
mysql_query("SET NAMES 'utf-8'");


 if(isset($_POST['submit'])){
    $username= $_POST['name'];
    $email =$_POST['email'];
    $message =$_POST['message'];
  $query= mysql_query("INSERT INTO comment ( name, email, message) VALUES('$username','$email','$message')")or die (mysql_error());
   header("Location: ".$redirectURL);
 }

 echo 'jim';


?>

