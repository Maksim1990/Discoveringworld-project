<?php
session_start(); 
include('config.php');

?>

    <body>
    	
        <div class="content ">
            <aside class="foot2"><?= Dict::_('NEW_FRIEND_REQUESTS');?> :</aside>
<table>
    
<?php
//We get the IDs, usernames and emails of users
$friendName=$_SESSION['username'];
$req = mysql_query("SELECT * FROM friend_list WHERE friendName='$friendName' AND requestSent='1' AND requestAccepted='0'");
if(mysql_num_rows($req)> 0){
while($dnn = mysql_fetch_array($req))
{
      $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['userName'].'"  ');  
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
             <?php echo '<span class="left2 "><span class="btn-sm btn-success confirm_friend'.$link.'"><a href="#" class="bt-sm bt-success ">'. Dict::_('CONFIRM').'</a></span>'; 
             echo '<span class="btn-sm btn-danger decline_friend'.$link.'"><a href="#" class="bt-sm bt-danger ">'. Dict::_('DECLINE').'</a></span></span>'; 
             ?>
        </td>
        <?php 
       $hrefa = '../public/profileTemplate.php?action=sendMessage&toUser='.$link.'&lang='.$_SESSION['lang'];
        $result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link33=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link33.'&lang='.$_SESSION['lang'];
        if($row['username']==$_SESSION['username']){
        ?>
        <td class="left"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a></td>
        <?php  } else {?>
        <td class="left"><a href="<?php echo $hrefa; ?>"><?= Dict::_('SENT_MESSAGE_TO');?>  <?php echo $row['username']; ?></a></td>
        <?php
        } ?>
        
        </tr>

<?php


?>


                                     <script>
   $(function(){ 

   var conf=$('.confirm_friend<?=$link;?>').find('a');
         conf.click(function(){  

         $.ajax({
                type:"POST",
                url:"add_as_friend.php",
                data:'id=<?=$link?>&action2=confirm',
                  beforeSend: function() {
        // setting a timeout
        $('.left2').text('Loading...');
    },
                success: function(html){
         $('.left2').html(html);

                    } 
            });
});
   var conf=$('.decline_friend<?=$link;?>').find('a');
         conf.click(function(){  

         $.ajax({
                type:"POST",
                url:"add_as_friend.php",
                data:'id=51&action2=decline',
                          beforeSend: function() {
        // setting a timeout
        $('.left2').text('Loading...');
    },
                success: function(html){
         $('.left2').html(html);

                    } 
            });
});
 });
           </script>
            <?php
            }
            }
}else    echo "<hr><p class='foot2 st'>You have no new friend requests now!</p><hr>"; ?>
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