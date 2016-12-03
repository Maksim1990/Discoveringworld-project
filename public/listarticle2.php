<?php

session_start(); 
include_once "connection.php";

if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
      

$query="(SELECT * FROM articles_".$_SESSION['lang']." )
    UNION
        (SELECT * FROM culture_".$_SESSION['lang']." )
    UNION
        (SELECT * FROM travel_".$_SESSION['lang']." ) ORDER BY `publicationDate` DESC limit 3,3";  
$result=mysql_query($query)or die("Wrong query");  
if (mysql_num_rows($result)>0){  
while ($row = mysql_fetch_assoc($result)){  
$sqlid=$row["id"];  
$sqlmark=$row["mark"]; 
if($sqlmark=="art"){
$href = '../cms/art.php?action=viewArticle&articleId='.$row["id"].'&lang='.$_SESSION['lang'];
}elseif ($sqlmark=="travel") {
       $href = '../cms1/travel.php?action=viewArticle&articleId='.$row["id"].'&lang='.$_SESSION['lang'];         
            }
 else {$href = '../cms2/culture.php?action=viewArticle&articleId='.$row["id"].'&lang='.$_SESSION['lang'];}
$sqldata=$row["title"];  
$sqlname=$row["summary"];
$sqldate=$row["publicationDate"];
$sqlimage=$row["image"];  
$sqlid=$row["id"];
echo "<p class='imline'>$sqldate</p>";
echo "<div class='immain1 row'><a href='$href'> $sqlimage</a><a href='$href'><p>$sqldata</p></a><br /><h2><span>$sqlname </span></h2><br /></div>"; 

}
}} 

?>