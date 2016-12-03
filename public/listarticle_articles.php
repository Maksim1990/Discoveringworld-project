
<?php

session_start(); 

include_once "connection.php";
if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
       mysql_query("set names utf8"); 

$query="(SELECT * FROM articles_".$_SESSION['lang']." )
    UNION
        (SELECT * FROM culture_".$_SESSION['lang']." )
    UNION
        (SELECT * FROM travel_".$_SESSION['lang']." ) ORDER BY `publicationDate` DESC limit 0,3";  
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
 if($_SESSION['lang']=='th'){
 $sqldata= htmlspecialchars ($row["title"]); }
else   $sqldata= strtoupper ($row["title"]); 
$sqlname=$row["summary"];
$sqldate=$row["publicationDate"];
$sqlimage=$row["image"];  
$sqlid=$row["id"];

echo "<div class='col-xm-11 col-sm-offset-1 row'><div class=' col-xm-12 artitle'><a href='$href' data-toggle='tooltip' data-placement='left' title='".$sqlname."'>$sqldata</a>"
        ."</div><div class='col-xm-12 article-image' ><a href='$href' data-toggle='tooltip' data-placement='left' title='".$sqlname."'> $sqlimage</a>"."<br/></div></div>"; 


  
}
}} 

?>