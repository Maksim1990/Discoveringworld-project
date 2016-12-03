<?php
session_start(); 
  if (isset($_POST['submit']))
  {
      
         if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
            {
            
             echo  "<script>alert('Please select an image!')</script>";
             
            }  else {
                 $size=  $_FILES['image']['size'];
                 if($size> 2097152)
            {  echo  "<script>alert('Please select an image less than 2 MB! Your picture size is $size bytes')</script>"; }
            else{
         
                $image=  addslashes($_FILES['image']['tmp_name']);
                $name=  addslashes($_FILES['image']['name']);
                $image=  file_get_contents($image);
                $image=  base64_encode($image);
              
            
      
      
      
      $username= $_POST['name'];
    $email =$_POST['email']; 
    if (preg_match("/[0-9a-z]+[0-9a-z_\.\-]*@[0-9a-z_\-\.]+\.[a-z]{2,6}/i",$email)){   
    $password =$_POST['pass'];
    $password2 =$_POST['pass2'];
   if ($password==$password2)
   {   
  $password= md5($password);

if (empty($username)|| empty($email) || empty($password)){
    
}
else{
    // Connecting to Database
    include_once '../public/connection.php';


if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
      

      // before registering we need to check email
   $check_email_sql="SELECT email FROM register WHERE email='$email' LIMIT 1";
   $emailcheck=  mysql_query($check_email_sql);
   if (mysql_num_rows($emailcheck)>0){
       echo "<script>alert ('Email address".$email." is already registered')</script>";
   }
   else{
       
       $date_registered=  date('Y-m-d H:iS');
   $query= mysql_query("INSERT INTO register ( username, email, password, date_registered,imname,image) VALUES('$username','$email','$password','$date_registered','$name','$image')");
   
   $insert= mysql_query($query) ;
   $query1= mysql_query("INSERT INTO users ( username, email, password,avatar) VALUES('$username','$email','$password','$image')");
   $insert1= mysql_query($query1) ;
     // Login of the user
  $logins = "SELECT email, password,username FROM register WHERE email='$email' AND password='$password' AND username='$username'  LIMIT 1";
   $result= mysql_query($logins);
   
   //check the password and email
   if (mysql_num_rows($result)> 0)
   {
       // create seesion for login in
       $_SESSION['is_login_in'] = true;
             $_SESSION['username'] = $username;
              $_SESSION['id']=$row['id'];
      $_SESSION['image']="data:image;base64,".$row['image'];
       $_SESSION['user_email'] = $email;
  header("Location: ". $_SESSION['url']);
     }
   else{
       echo "<script>alert('Provided email or password is invalid!!!')</script>";
   }
   }  
}
}
} else{
       echo "<script>alert('Password does not match. Please try again.')</script>";
   }
    }else{
       echo "<script>alert('Please enter valid email.')</script>";
   }
  }
  }
}
class Dict{
    
    static function _($key){
      $dict=$GLOBALS['dict'];  
        if($dict[$key]){
            return $dict[$key];
            
        }else $key;
    }
   
}

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
$dict=  include '../public/dict/'.$_SESSION['lang'].'.php';
 
      ?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>

<link rel="stylesheet" type="text/css" href="styles.css" />

</head>

<body id="demo1">
    <div class="row">
        <div class="col-xm-12 col-sm-6 col-sm-offset-3">
<div id="carbonForm">
	<h1><?=Dict::_('REGISTER')?></h1>

        <form action="register.php" method="post" id="signupForm" enctype="multipart/form-data">

    <div class="fieldContainer">

        <div class="formRow">
            <div class="label">
                <label for="name"><?=Dict::_('NAME')?></label>
            </div>
            
            <div class="field">
                <input type="text" name="name" maxlength="10" id="name" placeholder="<?=Dict::_('NAME')?>..." required/>
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <label for="email"><?=Dict::_('EMAIL')?></label>
            </div>
            
            <div class="field">
                <input type="text" name="email" id="email" placeholder="<?=Dict::_('EMAIL')?>..." required/>
            </div>
        </div>
        
        <div class="formRow">
            <div class="label">
                <label for="pass"><?=Dict::_('PASS')?> </label>
            </div>
            
            <div class="field">
                <input type="password" name="pass" id="pass" placeholder="<?=Dict::_('PASS')?>..." required/>
            </div>
        </div>
        
         <div class="formRow">
            <div class="label">
                <label for="pass">Repeat password</label>
            </div>
            
            <div class="field">
                <input type="password" name="pass2" id="pass" placeholder="Repeat password..." required/>
            </div>
        </div>
       
         <div class="formRow">
            <div class="label">
                <label for="image"><?=Dict::_('PIC')?></label> <span class="redAt">*</span>
            </div>
            
            <div class="field1 ">
                <input  type="file" name="image" id="image"/>
            </div>
         
             <p class="attention"> <span class="redAt">*</span>Attention: your picture must be less than 2 MB </p>   
        </div>
        
    </div> 
    
    <div class="signupButton">
        <button class="btn-success btn-lg sn" type="submit" name="submit" id="submit" value="Send_Mail" ><?=Dict::_('REGISTER')?></button>
      
    </div>
    
    </form>
        
</div>
    

 
 </div>
        </div>
    <div class="logoRegister imageRotateHorizontal"> <a href="../index.php"><img src="../public/img/logo6.png" width="90" /> </a> </div>
    
    <div id="footer"> <a href="javascript:history.back(1)"><?=Dict::_('BACK')?>  &raquo;</a></div>
  
        </body>
</html>
