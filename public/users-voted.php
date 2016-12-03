<?php
include('config.php');
?>

    <body>
    	
        <div class="content ">
            <aside class="foot2"><?= Dict::_('WHO_LIKE_2');?>:</aside>
<table>
    
<?php
//We get the IDs, usernames and emails of users
$idVoted=$_GET['id'];

$req = mysql_query('select * from rating where id_item='.$idVoted.' and rate=1 ORDER BY id DESC');
if(mysql_num_rows($req)> 0){
while($dnn = mysql_fetch_array($req))
{
      $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['user'].'"  ');  
while($row = mysql_fetch_assoc($result3)){ 
$link=$row["id"];
$userImage="data:image;base64,".$row['image'];
$date=$row['date_registered'];
$status=$row['status'];
$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
	<tr>
            <td class="left"><a href="<?php echo $hrefa; ?>"><img src="<?php echo $userImage; ?>" ></a>
        </td>
        
        <td class="left "><span class="nameUser"><a href="<?php echo $hrefa; ?>"><?php echo htmlentities($row['username'], ENT_QUOTES, 'UTF-8'); ?></a>
            </span> <br/>
            <?php echo $status; ?>
            <br/>
            <?= Dict::_('REGISTERED');?> <?php echo $date; ?>
        </td>
        <?php 
       $hrefa = '../public/profileTemplate.php?action=sendMessage&toUser='.$link.'&lang='.$_SESSION['lang'];
        $result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
        if($row['username']==$_SESSION['username']){
        ?>
        <td class="left"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a></td>
        <?php  } else {?>
        <td class="left"><a href="<?php echo $hrefa; ?>"><?= Dict::_('SENT_MESSAGE_TO');?>  <?php echo $row['username']; ?></a></td>
        <?php
        } ?>
        </tr>
<?php
}
}
}else    echo "<hr><p class='foot2 st'>There are no yet users who like this picture</p><hr>";
?>
</table>
            <?php
$result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
		</div>
        <div class="foot1"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a> </div>
	</body>