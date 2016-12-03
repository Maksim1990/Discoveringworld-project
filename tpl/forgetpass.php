<?php    
session_start();
//подключаем базу в моём случае

include '../public/connection.php';

if (!$connect){
    
    exit(mysql_error());    
}
else {
    
      mysql_select_db("$db_name",$connect); 
  
if(isset($_POST['restore'])){

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$mail = mysql_real_escape_string($_POST['mail']);

// проверяем, если юзер в таблице с таким же логином
    $query = "SELECT `id`
                FROM `register`
                WHERE `email`='{$username}'
                LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error(""));
    if (mysql_num_rows($sql)==1)
    {
       
//если есть
//генерируем пороль        
$simvols = array ("0","1","2","3","4","5","6","7","8","9",
                        "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z",
                        "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
      for ($key = 0; $key < 6; $key++)
        {
          shuffle ($simvols);
          $string = $string.$simvols[1];

        }

//перегоняем в md5 хэш
$pass = md5($string);

//переписываем пороль в базе уже хэшированый
            
$query = "UPDATE `register`
                    SET
                        `password`='{$pass}'
                                                   WHERE `email`='{$username}' ";
        $sql = mysql_query($query) or die(mysql_error());

//получаем мыло из базы для нашего пользователя

$query = "SELECT `email`,`username`
                FROM `register`
                                 WHERE
                `email`='{$username}'
                LIMIT 1";
    $sql = mysql_query($query) or die(mysql_error());

$row = mysql_fetch_assoc($sql);
$mail = $row['email'];
$user = $row['username'];
//шлём пороль на это мыло

mail($mail, "Restoring password", "Hello $user ! Your new password is : $string \n"
        . "Здравствуйте, $user ! Ваш новый пороль : $string \n\n\n\n\n"
        . "This message was created automatically. Please do not reply this message! \n"
        . "Это сообщение было отправлено автоматически. Пожалуйста, не отвечайте на него!\n" );
header("Location: http://discoveringworld.net/tpl/login.php");
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<head>
<title>Восстановление пароля - Админцентр</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<link rel="shortcut icon" href="images/siteico0.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css" media="all">

body {color:black;
background: url("../public/img/backlog.jpg") 100% 100% no-repeat; 
    background-size: cover;
}
img {border:none;}
#conteiner {width: 50%;max-width:400px;  margin: 7em auto;height: 450px;}
#conteiner .loform {
    padding: 16px 16px 16px 16px;
    font-weight: normal;
    -moz-border-radius: 11px;
    -khtml-border-radius: 11px;
    -webkit-border-radius: 11px;
    border-radius: 5px;
    background: #fff;
    border: 1px solid #e5e5e5;
    -moz-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    -webkit-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    -khtml-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    box-shadow: rgba(200,200,200,1) 0 4px 18px;
}
#conteiner .mess {
    margin-bottom: 10px;
    padding: 10px;
    font-weight: normal;
    -moz-border-radius: 5px;
    -khtml-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    border: 1px solid;
    -moz-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    -webkit-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    -khtml-box-shadow: rgba(200,200,200,1) 0 4px 18px;
    box-shadow: rgba(200,200,200,1) 0 4px 18px;
    color:#000;
    font-family:Verdana, Arial, Helvetica, sans-serif;
    font-size:11px;
}


#conteiner .loform p {color:#808080; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; margin:5px;}
#conteiner .loform input {background:#fafafa; border:1px solid #cccccc; color:#666666; padding:4px; width:98%; font-size:25px; margin-bottom:20px;}
#conteiner .loform input.submit {margin-top:-16px; width:74px; height:64px; border: 1 px; text-align:right; vertical-align:top;}
#conteiner .loform a {color: #bcbcbc; text-decoration: none;}
#conteiner .loform a:hover {color:#d7722f;}

#conteiner .logo {text-align:center; padding-bottom:20px;}
</style>
</head>
<body>
<div id="conteiner">
    <div class="logo">
      <p><strong><?=Dict::_('RESTORE_PASS')?></strong></p>
    </div>

<div class="loform">
    <form name="form1" method="post" action="forgetpass.php">
            <p><?=Dict::_('EMAIL')?>  <input ype="text" name="username" size="40" /></p>
            <p>

                <input type="submit" value="<?=Dict::_('RESTORE')?>" size="40" name="restore">

            </p>
        </form>
        
    </div>
</div>
     <div id="footer"><a href="javascript:history.back(1)"><?=Dict::_('BACK')?> </a></div>
</body>
</html>
    

    
