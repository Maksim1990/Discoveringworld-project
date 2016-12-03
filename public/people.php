
<?php 

    include 'connection.php';

if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect); 
  

$result = mysql_query("SELECT * FROM register ORDER BY `date_registered` DESC limit 0,11" );  
if (mysql_num_rows($result)>0){  
while ($row = mysql_fetch_assoc($result)){  
$profilePic="data:image;base64,".$row['image'];
$profileName=$row['username'];

$link=$row["id"];
if($_SESSION['username']){
$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
}else {
 $hrefa = '../tpl/login.php?lang='.$_SESSION['lang'];     
}

 if($row['username']!='Admin'){
     if(!empty($row['username'])){
echo '<span><h4><a class="button " href='.$hrefa .'>'.$profileName.'</a></h4>'
        . '<a class="button grow" href='.$hrefa .'><img src="data:image;base64,'.$row['image'].'" >'
        . '</a></span>';
 }
 }

}
}
}
?>