<?php

session_start();

if ($_REQUEST['action'])
  {
	//$picUser = htmlentities($picUser);

    $user = $_POST['user'];
  $id = $_POST['id'];
    // Connect to the database
    include '../public/connection.php';
mysql_select_db($db_name); 	
	

   
      mysql_query("DELETE FROM `profileComment` WHERE id =".$id);
if(!mysql_errno()){
    
?>

    <div class="content-comment-1">
    	<p><?= Dict::_('YOUR_COM_DELETED');?></p>
       
	</div>

	<?php } ?>
 
<?php } ?>