<?php

session_start(); 
   include_once '../public/connection.php';


if (!$connect){
    exit(mysql_error());    
}
else {
     mysql_select_db("$db_name",$connect);
     // validate email and password 
 
    
    $old_password_1 =  htmlentities($_POST['old_pass']);
      $old_password= md5($old_password_1);
      $userId=$_SESSION['id'];
    $query="SELECT password FROM register WHERE id='$userId'";  
        $result= mysql_query($query);
   
   //check the password and email
   if (mysql_num_rows($result)>0)
   { $row = mysql_fetch_assoc($result);
   
   if($row['password']==$old_password){
$new_pass =  htmlentities($_POST['new_pass']);
    $new_pass2 =  htmlentities($_POST['new_pass_2']);
       
   if($new_pass==$new_pass2){   
    
    $newPass= md5($new_pass2);
   $query5= "UPDATE register SET password='$newPass' WHERE id='$userId'";
if(mysql_query($query5)){ 
header("Location: ". $_SESSION['url']);}
else {
        echo 'Sorry, some database error happened';}  
 
   }else {
              echo 'You secondly typed wrong NEW PASSWORD. Please try again.';}
}else {echo "You typed wrong OLD PASSWORD. Please try again.";}
}
}