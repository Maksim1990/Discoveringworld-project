<?php
session_start(); 


if(isset($_POST['submit']));
{

    $email =  htmlentities($_POST['email']);
    $password =  htmlentities($_POST['pass']);
  $password= md5($password);
  
   // Connecting to Database
   include_once '../public/connection.php';


if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
     // validate email and password 
if ( empty($email) || empty($password)){
    
}
else{
   
   
   // Login of the user
    $logins = "SELECT * FROM register WHERE email='$email' AND password='$password'   LIMIT 1";
   mysql_query("SET NAMES 'utf8'"); 
mysql_query("SET CHARACTER SET 'utf8'");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci'");
    $result= mysql_query($logins);
   
   //check the password and email
   if (mysql_num_rows($result)>0)
   { $row = mysql_fetch_assoc($result);
       // create seesion for login in
       $_SESSION['is_login_in'] = true;
      $_SESSION['username']=$row['username'];
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
<title><?=Dict::_('LOGIN')?></title>

<link rel="stylesheet" type="text/css" href="styles.css" />

</head>

<body id="login">

<div id="carbonForm1">
	<h1><?=Dict::_('LOGIN')?></h1>

        <form action="login.php" method="post" id="signupForm">

    <div class="fieldContainer">

       
        
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
                <label for="pass"><?=Dict::_('PASS')?></label>
            </div>
            
            <div class="field">
                <input type="password" name="pass" id="pass" placeholder="<?=Dict::_('PASS')?>..." required/>
            </div>
        </div>
        
        
    </div> 
    
    <div class="signupButton">
          <button class="btn-success btn-lg sn" type="submit" name="submit" id="submit" value="Send_Mail" ><?=Dict::_('LOGIN')?></button>
    </div>
    
    </form>
        <p style="display:inline-block; float: left;"><a href="forgetpass.php"><?=Dict::_('FORGET_PASSWORD')?> </a></p>
   <p style="display:inline-block; float: right;"><a href="register.php"><?=Dict::_('REGISTER')?> </a></p>
</div>
    
    <div>
    <div class="logoLogin imageRotateHorizontal"> <a href="../index.php"><img src="../public/img/logo6.png" width="90" /> </a> </div>
    <div id="footer"> <a href="javascript:history.back(1)"><?=Dict::_('BACK')?>  &raquo;</a></div>
    </div>
</body>
</html>
