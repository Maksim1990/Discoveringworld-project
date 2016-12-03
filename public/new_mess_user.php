<?php
include('config.php');
?>

    <body>
    
<?php

//We check if the user is logged
if(isset($_SESSION['username']))
{
$toUserId=$_GET['toUser']; 

$result = mysql_query('SELECT * FROM register WHERE id="'.$toUserId.'"' );  
$row = mysql_fetch_assoc($result);  
$toUserName = $row['username'];
    
$form = true;
$otitle = '';

$omessage = '';
//We check if the form has been sent
if(isset($_POST['title'], $_POST['message']))
{
    
	$otitle = $_POST['title'];
      
	$orecip = $_POST['recip'];
        
	$omessage = $_POST['message'];
       
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$otitle = stripslashes($otitle);
		$orecip = stripslashes($orecip);
		$omessage = stripslashes($omessage);
	}
	//We check if all the fields are filled
	if($_POST['title']!='' and $_POST['message']!='')
	{
		//We protect the variables
		$title = mysql_real_escape_string($otitle);
		$recip = mysql_real_escape_string($orecip);
		$message = mysql_real_escape_string($omessage);
		//We check if the recipient exists
               
		$dn1 = mysql_fetch_array(mysql_query('select count(id) as recip, id as recipid, (select max(id) from pm) as npm from users where username="'.$recip.'"'));
                $userId = mysql_fetch_array(mysql_query('SELECT * FROM users WHERE username="'.$_SESSION['username'].'"'));
		if($dn1['recip']==1)
		{
			//We check if the recipient is not the actual user
			if($dn1['recipid']!=$userId['id'])
			{
				$id = $dn1['npm']+1;
				//We send the message
   $recepientId = mysql_fetch_array(mysql_query('SELECT id FROM register WHERE username="'.$recip.'"'));                              
				if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read,senderId, sender,recepient,recepientId)values("'.$id.'", "1", "'.$title.'", "1", "1", "'.$message.'", "'.time().'", "yes", "no","'.$_SESSION['id'].'","'.$_SESSION['username'].'","'.$recip.'","'.$recepientId['id'].'")'))
				{
?>
        <div class="message"><?= Dict::_('MESSAGE_SENT');?><br /></div>
    <?php   $hrefa = '../public/profileTemplate.php?action=listMessage&lang='.$_SESSION['lang'];
  echo '<p><a href="'.$hrefa.'">List of my personnal messages</a></p>';  ?>

<?php
					$form = false;
				}
				else
				{
					//Otherwise, we say that an error occured
					$error = Dict::_('ERROR_ACCURED');
				}
			}
			else
			{
				//Otherwise, we say the user cannot send a message to himself
				$error = Dict::_('MESSAGE_TO_YOURSELF');
			}
		}
		else
		{
			//Otherwise, we say the recipient does not exists
			$error = Dict::_('NO_RECEPIENT');
		}
	}
	else
	{
		//Otherwise, we say a field is empty
		$error = Dict::_('FILL_IN_FIELD');
	}
}
elseif(isset($_GET['recip']))
{
	//We get the username for the recipient if available
	$orecip = $_GET['recip'];
}
if($form)
{
//We display a message if necessary
if(isset($error))
{
	echo '<div class="message">'.$error.'</div>';
}
//We display the form
?>
<div class="content1">
	<h1><?= Dict::_('NEW_PERSONEL_MESSAGE');?></h1>
    <form action="../public/profileTemplate.php?action=sendMessage" method="post">
		<?= Dict::_('FILL_IN_FIELD_2');?><br />
        <label for="title"><?= Dict::_('TITLE');?></label><input type="text" value="<?php echo htmlentities($otitle, ENT_QUOTES, 'UTF-8'); ?>" id="title" name="title" /><br />
        <label for="recip"><?= Dict::_('RECEPIENT');?><span class="small">(<?= Dict::_('USERNAME');?>)</span></label><input type="text" value="<?php echo htmlentities($toUserName, ENT_QUOTES, 'UTF-8'); ?>" placeholder="<?php echo $toUserName; ?>" id="recip" name="recip" /><br />
        <label for="message"><?= Dict::_('MESSAGE');?></label><textarea cols="40" rows="5" id="message" name="message"><?php echo htmlentities($omessage, ENT_QUOTES, 'UTF-8'); ?></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
<?php
}
}
else
{
	echo '<div class="message">You must be logged to access this page.</div>';
}
?>
    <?php   
    $result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
		
        <div class="foot1"><a href="<?php echo $hreafUser; ?>">Go to my profile</a> </div>
	</body>
   
