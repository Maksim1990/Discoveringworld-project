<?php 
session_start();
   include_once "../public/connection.php";

if (isset($_POST['submit']))
  {


    if(!empty($_FILES['image']['tmp_name'])){
     if(getimagesize($_FILES['image']['tmp_name'])==FALSE )
            {
             echo  "<script>alert('Please select an image!')</script>";
            }  else {
                $image=  addslashes($_FILES['image']['tmp_name']);
                $imname=  addslashes($_FILES['image']['name']);
                $image=  file_get_contents($image);
                $image=  base64_encode($image);            
            }
if (!$connect){
    exit(mysql_error());    
}
else {
 $nam=$_SESSION['username'];

      mysql_select_db("$db_name",$connect);
      
   $query= mysql_query("UPDATE register SET imname='$imname',image='$image' WHERE username='$nam'");
   $insert= mysql_query($query) ;
 header('Location: ' . $_SERVER['HTTP_REFERER']);
    }          
 }
}  
  