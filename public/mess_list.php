<?php
include('config.php');
?>
    <body>
    	
        <div class="content content1">
<?php
//We check if the user is logged
if(isset($_SESSION['username']))
{

//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
//$req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user2read="no" and users.id=m1.user2 )or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req1=  mysql_query('SELECT * FROM pm WHERE user2read="no" AND recepient="'.$_SESSION['username'].'"');
   // $req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');

$req2=  mysql_query('SELECT * FROM pm WHERE user1read="yes" AND sender="'.$_SESSION['username'].'" GROUP BY title ORDER BY user2 DESC');
?>
            <div class="container">
                <div class="col-xs-12 col-sm-6">            
            <span class="foot3">LIST OF YOUR MESSAGES:</span><br /><br />
<?php   $hrefa = '../public/profileTemplate.php?action=newMessage&lang='.$_SESSION['lang'];
  echo '<p><a href="'.$hrefa.'">'.Dict::_('CREATE_MESSAGE').'</a><a href="'.$hrefa.'"><img src="../public/img/message.ico" class="button hover" width="70"></a></p>';  
    $queryImage = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' );  
$row = mysql_fetch_assoc($queryImage);  
$link=$row["id"];
$userImage="data:image;base64,".$row['image']; 
$hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
  ?>
            </div>
      <div class="col-xs-12 col-sm-5"> 
            <div class="left picImage "><a href="<?php echo $hreafUser; ?>"><img src="<?php echo $userImage; ?>" ></a></div>
</div>
      </div>
            <h3><?= Dict::_('UNREAD_MESSAGES');?>(<?php 
 $check = mysql_query('SELECT * FROM pm WHERE recepient="'.$_SESSION['username'].'"'); 
 $ch = mysql_fetch_array($check);
 if($_SESSION['username']==$ch['recepient']){

echo intval(mysql_num_rows($req1)); 
echo ")<br/>";
 }else { echo "0)<br/>";}

?></h3>
<table >
	<tr>
    	<th class="title_cell"><?= Dict::_('TITLE');?></th>
     
        <th><?= Dict::_('MESSAGE_FROM');?></th>
        <th><?= Dict::_('DATE_CREATION');?></th>
    </tr>
<?php
//We display the list of unread messages
while($dn1 = mysql_fetch_array($req1))
{
         $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dn1['sender'].'"' );  
$row = mysql_fetch_assoc($result3);  
$link=$row["id"];

$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
     
?>
	<tr>
  <?php 	echo '<td class="left"><a href="../public/profileTemplate.php?action=readMessage&id='.$dn1['id'].'">'.htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8').'</a></td>' ?>

        <?php 	echo '<td class="left"><a href="'.$hrefa.'">'.htmlentities($dn1['sender'], ENT_QUOTES, 'UTF-8').'</a></td>' ?>
    
    	<td>
        <?php 
             $mesDate = mysql_query('SELECT timestamp FROM pm WHERE title="'.$dn1['title'].'" ORDER BY `timestamp` DESC limit 0,1 ' );  

if (mysql_num_rows($mesDate)>0){  
while ($row1 = mysql_fetch_assoc($mesDate)){        
        echo date(' H:i:s d/m/Y' ,$row1['timestamp']);
      }
 }   
        ?>
        </td>
    </tr>
<?php
}

//If there is no unread message we notice it
if(intval(mysql_num_rows($req1))==0)
{
?>
	<tr>
    	<td colspan="4" class="center"><?= Dict::_('UNREAD_MESSAGES');?></td>
    </tr>
<?php
}


?>
</table>
<br />
<h3><?= Dict::_('SENT_MESSAGES');?>(<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
<table>
	<tr>
    	<th class="title_cell"><?= Dict::_('TITLE');?></th>
        <th><?= Dict::_('NO_REPLIES');?></th>
        <th><?= Dict::_('SENT_TO');?></th>
        <th><?= Dict::_('DATE_CREATION');?></th>
    </tr>
<?php
//We display the list of read messages
while($dn2 = mysql_fetch_array($req2))
{
    $h = mysql_query('SELECT count(title) as number FROM pm WHERE title="'.$dn2['title'].'"'); 
        $cc1 = mysql_fetch_array($h);
     $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dn2['recepient'].'"' );  
$row = mysql_fetch_assoc($result3);  
$link=$row["id"];

$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
     
?>
	<tr>
  <?php 	echo '<td class="left"><a href="../public/profileTemplate.php?action=readMessage&id='.$dn2['id'].'">'.htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8').'</a></td>' ?>

    	<td><?php echo $cc1['number']; ?></td>
        <?php 	echo '<td class="left"><a href="'.$hrefa.'">'.htmlentities($dn2['recepient'], ENT_QUOTES, 'UTF-8').'</a></td>' ?>
    
    	<td><?php 
             $mesDate = mysql_query('SELECT timestamp FROM pm WHERE title="'.$dn2['title'].'" ORDER BY `timestamp` DESC limit 0,1 ' );  

if (mysql_num_rows($mesDate)>0){  
while ($row1 = mysql_fetch_assoc($mesDate)){        
        echo date(' H:i:s d/m/Y' ,$row1['timestamp']);
      }
 }   
        ?></td>

        </tr>
<?php
}
//If there is no read message we notice it
if(intval(mysql_num_rows($req2))==0)
{
?>
	<tr>
    	<td colspan="4" class="center"><?= Dict::_('N_R');?></td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
	echo Dict::_('MUST_SIGNED_IN');
}
$result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
		</div>
        <div class="foot1"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a> </div>
	</body>
