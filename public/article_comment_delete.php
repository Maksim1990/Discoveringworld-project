<?php

session_start();
$db=$_GET['d'];
$articId=$_GET['articId'];
$comment=$_GET['comment'];
//echo $lang."<br/>";
//echo $comment."<br/>";
//echo $db."<br/>";
//echo $articId."<br/>";
    include '../public/connection.php';
mysql_select_db($db_name); 	
	

   
     $query= mysql_query("DELETE FROM ".$db." WHERE id=".$articId);
if($query){ 
//echo "SUCCESS!!";
header("Location: ". $_SESSION['url']);
}
else {
        echo 'Sorry, some database error happened';}
    
 
