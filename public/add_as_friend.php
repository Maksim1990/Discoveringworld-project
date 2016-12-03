<?php
session_start(); 
   
   include_once 'connection.php';


if (!$connect){
    exit(mysql_error());    
}
else {
     mysql_select_db("$db_name",$connect);
     // validate email and password 
 

if($_POST['action2']=="add"){
   extract($_POST);
$userId=$_SESSION['id'];
$userName=$_SESSION['username'];
$friendId=$_POST['id'];
$query=mysql_query("SELECT * FROM register WHERE id='$friendId'");
if (mysql_num_rows($query)>0)
   { $row = mysql_fetch_assoc($query);
$friendName=$row['username'];
$add="insert into friend_list (userId,userName,friendName,friendId,requestSent,requestAccepted)values( '$userId', '$userName','$friendName','$friendId','1','0')";
if(mysql_query($add)){ 
header("Location: ". $_SESSION['url']);}
else {
        echo 'Sorry, some database error happened';}
}
}
  
if($_POST['action2']=="confirm"){
      extract($_POST);
    $idVoted2=$_POST['id'];
    $friendName=$_SESSION['username'];
  
    $query5= "UPDATE friend_list SET requestAccepted='1' WHERE userId='$idVoted2' AND friendName='$friendName'";
   if(mysql_query($query5)){ 
    echo "<h4>CONFIRMED</h4>";
   }
}
if($_POST['action2']=="decline"){
      extract($_POST);
    $idVoted2=$_POST['id'];
    $friendName=$_SESSION['username'];
  
    $query5= "UPDATE friend_list SET requestAccepted='2' WHERE userId='$idVoted2' AND friendName='$friendName'";
   if(mysql_query($query5)){ 
    echo "<h4>DECLINED</h4>";
   }
    
}
if($_POST['action2']=="delete"){
      extract($_POST);
    $idVoted2=$_POST['id'];
    $idSession=$_SESSION['id'];
    $friendName=$_SESSION['username'];
    $query5= mysql_query("DELETE FROM friend_list WHERE (userId='$idVoted2' AND friendId='$idSession')OR (friendId='$idVoted2' AND userId='$idSession')  AND requestAccepted = '1' ");
echo "<h2>DELETED FROM FRIENDLIST</h2>";
    
}
}









      ?>
