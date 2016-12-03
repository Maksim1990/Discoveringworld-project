<?php

session_start();

if ($_REQUEST['action'])
  {
	//$picUser = htmlentities($picUser);

    $comment1 = $_POST['comment'];
    $comment=  strip_tags($comment1);
$picUser = $_POST['picUser'];
$picId = $_POST['picId'];
    include '../public/connection.php';
mysql_select_db($db_name); 	
	
    //insert the comment in the database
      $user= $_SESSION['username'];
      $userImage=$_SESSION['image'];
   $userId=$_SESSION['id'];
    mysql_query("INSERT INTO profileComment (picId,picUser,userId,user, comment,userImage )VALUES('$picId', '$picUser','$userId', '$user', '$comment','$userImage')");
if(!mysql_errno()){
    
?>

    <div class="content-comment">
    	<img src="<?php echo $userImage; ?>" alt="" />
		<div class="cont11">
                    <span data-utime="1371248446" class="span" ><span class="prName"><?php echo $user; ?></span><?php echo date('d-m-Y H:i'); ?></span>
	       	<p><?php echo $comment; ?></p>
	    </div>
	</div>

	<?php } ?>
 
<?php } ?>