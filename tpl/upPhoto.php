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
                
          $size=  addslashes($_FILES['image']['size']);
                 if($size> 2097152)
            {  
            echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Please select an image less than 2 MB! Your picture size is $size bytes');
 window.history.back();
    </SCRIPT>");
            }
            else{       
           
                $image=  addslashes($_FILES['image']['tmp_name']);
                $imname=  addslashes($_FILES['image']['name']);
                $image=  file_get_contents($image);
                $image=  base64_encode($image);            
            
            
    $description=$_POST['description']; 
     $place=$_POST['place'];
     $userName=$_SESSION['username'];
     $userId=$_SESSION['id'];
if (!$connect){
    exit(mysql_error());    
}
else {
 $nam=$_SESSION['username'];

      mysql_select_db("$db_name",$connect);
      
   $query= ('INSERT INTO user_photos (  userName,userId,photo,description,place )VALUES("'.$userName.'", "'.$userId.'","'.$image.'","'. $description.'","'. $place.'")');
   $insert= mysql_query($query) ;
 header('Location: ' . $_SERVER['HTTP_REFERER']);
    }          
 }

}
 
    }
  }
  