<?php
include('config.php');
?>

    <body>
    	
<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{
//We check if the ID of the discussion is defined
if(isset($_GET['id']))
{
$id = intval($_GET['id']);
//We get the title and the narators of the discussion
$query = mysql_query('SELECT * FROM pm WHERE id="'.$_GET['id'].'"'); 
        $session = mysql_fetch_assoc($query );
$help = mysql_query('SELECT title, COUNT(title)as TT FROM pm WHERE id="'.$id.'"'); 
        $cc = mysql_fetch_array($help);
$help3 = mysql_query('SELECT *,MAX(user2)as HH FROM pm WHERE title="'.$cc['title'].'"'); 
        $cc3 = mysql_fetch_array($help3);
$help4 = mysql_query('SELECT *,MIN(user2)as HH2 FROM pm WHERE title="'.$cc['title'].'"'); 
        $cc4 = mysql_fetch_array($help4);        
$help2 = mysql_query('SELECT sender,recepient FROM pm WHERE user2="'.$cc3['HH'].'" and title="'.$cc['title'].'"'); 
        $cc2 = mysql_fetch_array($help2);  
$help22 = mysql_query('SELECT sender,recepient FROM pm WHERE user2="'.$cc4['HH2'].'" and  title="'.$cc['title'].'"'); 
        $cc22 = mysql_fetch_array($help22);        
$req1 = mysql_query('select * from pm where title="'.$cc['title'].'"  and id2="1"');
$dn1 = mysql_fetch_array($req1);
//*****TEST***************
//echo $cc['TT']."<br/>";
//echo $id."<br/>";
//echo mysql_num_rows($req1)."<br/>";
//echo $cc['title']."<br/>";
//echo $cc4['HH2']."<br/>";
//echo $cc22['recepient']."<br/>";
//echo $cc2['sender']."<br/>";
//echo $cc2['recepient']."<br/>";
//echo $_SESSION['username']."<br/>";
//echo $cc3['HH']."<br/>";
//echo $_GET['id']."GGGGGG<br/>";
//We check if the discussion exists
if(mysql_num_rows($req1)==1 && $_SESSION['username']==$cc2['recepient'])
{
   // echo 'SSSSSSSSSSSSSSSS!!!!'.$dn1['user2'];
//We check if the user have the right to read this discussion
if($dn1['user1']==$session['user1'] or $dn1['user2']==$session['user2'])
{

//We get the list of the messages
$req2 = mysql_query('select * from pm where title="'.$cc['title'].'" ORDER BY user2 ASC');
//We check if the form has been sent
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//We protect the variables
	$message = mysql_real_escape_string(nl2br(htmlentities($message, ENT_QUOTES, 'UTF-8')));
        $check = mysql_query('SELECT * FROM pm WHERE id="'.$id.'"'); 
        $ch = mysql_fetch_array($check);
       $check6 = mysql_query('SELECT id FROM register WHERE username="'.$ch['sender'].'"'); 
        $ch6 = mysql_fetch_array($check6);
	//We send the message and we change the status of the discussion to unread for the recipient
	//if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read,sender,recepient)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "","'.$_SESSION['username'].'","Ivan")') and mysql_query('update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	if(mysql_query('INSERT INTO pm (id2,title,user1,user2,message,timestamp,user1read,user2read,senderId,sender,recepient,recepientId)VALUES( "'.(intval(mysql_num_rows($req2))+1).'","'.$ch['title'].'","'.$ch['user1'].'","'.($ch['user2']+1).'","'.$message.'", "'.time().'","yes","no","'.$_SESSION['id'].'","'.$_SESSION['username'].'","'.$ch['sender'].'","'.$ch6['id'].'")')and mysql_query('update pm set user2read="yes" where  user2="'.$ch['user2'].'" and title="'.$ch['title'].'"'))
       // if (mysql_query('UPDATE pm SET id="'.$id.'",user'.$user_partic.'read="yes",id2="'.(intval(mysql_num_rows($req2))+1).'", message="'.$message.'", timestamp="'.time().'" where id="'.$id.'" and id2="1"'))
                {
?>
        <div class="message"><?= Dict::_('MESSAGE_SENT');?><br /></div>
     <?php   
     
     $hrefa = '../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'];
  echo '<a href="../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'].'&id='.$id.'">Go to the discussion</a>';  ?>

<?php
	}
	else
	{
?>
        <div class="message"><?= Dict::_('ERROR_ACCURED');?><br /></div>
       <?php   $hrefa = '../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'];
  echo '<a href=../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'].'&id='.$id.'">Go to the discussion</a>';  ?>

<?php
	}
}
else
{
//We display the messages
?>
<div class="content1">
<h1><?php echo $dn1['title']; ?></h1>
<table class="messages_table">
	<tr>
    	<th class="author"><?= Dict::_('USERNAME');?></th>
        <th><?= Dict::_('MESSAGE');?></th>
    </tr>
<?php
while($dn2 = mysql_fetch_array($req2))
{
?>
	<tr>
    	<td class="author center"><?php
$im = mysql_query('SELECT avatar FROM users WHERE username="'.$dn2['sender'].'"'); 
        $pic = mysql_fetch_array($im);
        $userPic="data:image;base64,".$pic['avatar']; 
	echo '<img src="'.$userPic.'" alt="Image Perso" style="max-width:100px;max-height:100px;" />';
        
 $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dn2['sender'].'"' );  
$row = mysql_fetch_assoc($result3);  
$link=$row["id"];

$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];

?><br />
 
<a href="<?php echo $hrefa; ?>"><?php echo $dn2['sender']; ?></a></td>
    	<td class="left"><div class="date"><?= Dict::_('SENT');?>: <?php echo date('m/d/Y H:i:s' ,$dn2['timestamp']); ?></div>
    	<?php echo $dn2['message']; ?></td>
    </tr>
<?php
}
//We display the reply form
?>
</table><br />
<h2>Reply</h2>
<div class="center">
    <form action="../public/profileTemplate.php?action=readMessage&id=<?php echo $id; ?>" method="post">
    	<label for="message" class="center"><?= Dict::_('MESSAGE');?></label><br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
        <input type="submit" value="Send" />
    </form>
</div>
</div>
<?php
}
}
else
{
	echo '<div class="message">'.Dict::_('MUST_SIGNED_IN').'</div>';
}
}
//************************************************
elseif ( $_SESSION['username']==$cc2['sender']) {
   // echo 'YYYYYYYYYYYYY!!!';
//We check if the user have the right to read this discussion
if($dn1['user1']==$session['user1'] or $dn1['user2']==$session['user2'])
{

//We get the list of the messages
$req3 = mysql_query('select * from pm where title="'.$cc['title'].'" ORDER BY user2 ASC');
//We check if the form has been sent
if(isset($_POST['message']) and $_POST['message']!='')
{
	$message = $_POST['message'];
	//We remove slashes depending on the configuration
	if(get_magic_quotes_gpc())
	{
		$message = stripslashes($message);
	}
	//We protect the variables
	$message = mysql_real_escape_string($message);
        $check4 = mysql_query('SELECT *, MAX(user2)as Muser2 FROM pm WHERE id="'.$id.'"'); 
        $ch4 = mysql_fetch_array($check4);
        $check5 = mysql_query('SELECT id FROM register WHERE username="'.$ch4['recepient'].'"'); 
        $ch5 = mysql_fetch_array($check5);
	//We send the message and we change the status of the discussion to unread for the recipient
	//if(mysql_query('insert into pm (id, id2, title, user1, user2, message, timestamp, user1read, user2read,sender,recepient)values("'.$id.'", "'.(intval(mysql_num_rows($req2))+1).'", "", "'.$_SESSION['userid'].'", "", "'.$message.'", "'.time().'", "", "","'.$_SESSION['username'].'","Ivan")') and mysql_query('update pm set user'.$user_partic.'read="yes" where id="'.$id.'" and id2="1"'))
	if(mysql_query('INSERT INTO pm (id2,title,user1,user2,message,timestamp,user1read,user2read,senderId,sender,recepient,recepientId)VALUES( "'.($ch4['id2']+1).'","'.$ch4['title'].'","'.$ch4['user1'].'","'.$cc3['HH'].'","'.$message.'", "'.time().'","yes","no","'.$_SESSION['id'].'","'.$_SESSION['username'].'","'.$ch4['recepient'].'","'.$ch5['id'].'")'))
       // if (mysql_query('UPDATE pm SET id="'.$id.'",user'.$user_partic.'read="yes",id2="'.(intval(mysql_num_rows($req2))+1).'", message="'.$message.'", timestamp="'.time().'" where id="'.$id.'" and id2="1"'))
                {
?>
        <div class="message"><?= Dict::_('MESSAGE_SENT');?><br /></div>
     <?php   $hrefa = '../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'];
  echo '<a href="../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'].'&id='.$id.'">Go to the discussion</a>';  ?>

<?php
	}
	else
	{
?>
        <div class="message"><?= Dict::_('ERROR_ACCURED');?><br /></div>
       <?php   $hrefa = '../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'];
  echo '<a href=../public/profileTemplate.php?action=readMessage&lang='.$_SESSION['lang'].'&id='.$id.'">Go to the discussion</a>';  ?>

<?php
	}
}
else
{
//We display the messages
?>
<div class="content1">
<h1><?php echo $dn1['title']; ?></h1>
<table class="messages_table">
	<tr>
    	<th class="author"><?= Dict::_('USERNAME');?></th>
      <th><?= Dict::_('MESSAGE');?></th>
    </tr>
<?php
while($dn3 = mysql_fetch_array($req3))
{
?>
	<tr>
    	<td class="author center"><?php
$im3 = mysql_query('SELECT avatar FROM users WHERE username="'.$dn3['sender'].'"'); 
        $pic3 = mysql_fetch_array($im3);
        $userPic3="data:image;base64,".$pic3['avatar']; 
	
  $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dn3['sender'].'"' );  
$row = mysql_fetch_assoc($result3);  
$link=$row["id"];

$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
echo '<span class="left"><a href="'.$hrefa.'"><img src="'.$userPic3.'"  /></a></span>';
?><br />
 
<a href="<?php echo $hrefa; ?>"><?php echo $dn3['sender']; ?></a></td>
    	<td class="left"><div class="date"><?= Dict::_('SENT');?>: <?php echo date('m/d/Y H:i:s' ,$dn3['timestamp']); ?></div>
    	<?php echo $dn3['message']; ?></td>
    </tr>
<?php
}
//We display the reply form
?>
</table><br />
<h2>Reply</h2>
<div class="center">
    <form action="../public/profileTemplate.php?action=readMessage&id=<?php echo $id; ?>" method="post">
    <br />
        <textarea cols="40" rows="5" name="message" id="message"></textarea><br />
    
        <input type="submit" value="Send" />
    </form>
</div>
</div>
<?php
}
}
else
{
	echo '<div class="message">'.Dict::_('MUST_SIGNED_IN').'</div>';
}
}




else
{
	echo '<div class="message">'.Dict::_('D1').'</div>';
}
}
else
{
	echo '<div class="message">'.Dict::_('D2').'</div>';
}
}
else
{
	echo '<div class="message">'.Dict::_('MUST_SIGNED_IN').'</div>';
}
?>
       <?php
$result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
		
        <div class="foot1"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a> </div>
<script type='text/javascript'>
var foo = function(param)
{
   var temp= param.classList;
   var mes=document.getElementById('message');
 
   
   var newI = document.createElement('i');
 newI.className=temp;
var test33=document.getElementById('test33');
test33.appendChild(newI);
};
</script>	
    
    </body>
