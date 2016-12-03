<?php

session_start();

require  "../public/dict.php";

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
$dict=  include 'dict/'.$_SESSION['lang'].'.php';



if ($_REQUEST['action'])
  {
	//$picUser = htmlentities($picUser);

    $status = $_POST['status'];
    $user = $_POST['user'];
$status = htmlspecialchars($status);
    // Connect to the database
    include '../public/connection.php';
mysql_select_db($db_name); 	
	

   
    mysql_query("UPDATE register SET status='$status' WHERE username='$user'");
if(!mysql_errno()){
    
?>

    <div class="content-comment-1">
    	<p class="status-text"><?php echo $status; ?></p>
       <span >  <a href=''><?= Dict::_('MODIFY');?></a></span>
	</div>

	<?php } ?>
 
<?php } ?>