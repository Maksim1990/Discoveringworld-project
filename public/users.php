<?php
include('config.php');
?>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <body>
    	
        <div class="content ">
            

    

    
      <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab"><span class="foot2"><?= Dict::_('LIST_OF_USERS');?>:</span></a></li>
    <li role="presentation"><a href="#usersOnline" aria-controls="usersOnline" role="tab" data-toggle="tab"><span class="foot2">USERS ONLINE:</span></a></li>
    <li role="presentation"><a href="#friends" aria-controls="friends" role="tab" data-toggle="tab"><span class="foot2">LIST OF FRIENDS:</span></a></li>
  <li role="presentation"><a href="#friendsOnline" aria-controls="friendsOnline" role="tab" data-toggle="tab"><span class="foot2">FRIENDS ONLINE:</span></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content" ng-app="myApp" ng-controller="namesCtrl">
      <div   role="tabpanel" class="tab-pane active" id="users">
          <p><input type="text" ng-model="test" placeholder="Find ..."></p>
     
<p >Find this person:<span ng-bind="test"></span></p>
 
          <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select id, username, email from users ORDER BY id DESC');
while($dnn = mysql_fetch_array($req))
{ ?>
      <table ng-repeat="x in names | filter:test" ng-if="'<?=$dnn['username'] ?>' == x">             
   <?php   $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['username'].'" and (NOT username="Admin")  ');  
while($row = mysql_fetch_assoc($result3)){ 
    if($row["username"=='Admin']){
        continue;
    }
$link=$row["id"];
$userImage="data:image;base64,".$row['image'];
$date=$row['date_registered'];
$status=$row['status'];
$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
 
          <tr>
            <td class="left"><a href="<?php echo $hrefa; ?>"><img src="<?php echo $userImage; ?>" ></a>
        </td>
        
        <td class="left " ><span class="nameUser"><a  href="<?php echo $hrefa; ?>" ng-bind="x"></a>
            </span> <br/>
            <?php echo "<span class='status-text2'>$status</span>"; ?>
            <br/>
            
            <?php 
            $profileName=$dnn['username'];
             $qry="SELECT online FROM register WHERE username='$profileName' AND online >= NOW() - INTERVAL 10 MINUTE" ;
    $resultOnline=mysql_query($qry)or die("Wrong query");
      
    if (mysql_num_rows($resultOnline)>0){
     
echo  '<h4>Online</h4></br>'; 
        
    }else {
        
        $qry6="SELECT * FROM register WHERE username='$profileName' " ;
    $result666=mysql_query($qry6)or die("Wrong query");
   if (mysql_num_rows($result666)>0)
   { $row = mysql_fetch_assoc($result666);   
 echo '<h4>Offline</h4> <p>Last time online at   '.$row['online'].'</p></br>';    
    }
    } 
            
            ?>
            
            
            <?= Dict::_('REGISTERED');?> <?php echo $date; ?>
            
        </td>
        
        <?php 
        $hrefa = '../public/profileTemplate.php?action=sendMessage&toUser='.$link.'&lang='.$_SESSION['lang'];
        $result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
        if($dnn['username']==$_SESSION['username']){
        ?>
        <td class="left"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a></td>
        <?php  } else {?>
        <td class="left"><a href="<?php echo $hrefa; ?>"><?= Dict::_('SENT_MESSAGE_TO');?>  <?php echo $dnn['username']; ?></a></td>
     
        </tr>
          
 <?php
        }
} ?>
    </table>          
<?php }
?>
  


      </div>
 
     <div  role="tabpanel" class="tab-pane" id="usersOnline">
          <p><input type="text" ng-model="test" placeholder="Find ..."></p>
     
<p >Find this person:<span ng-bind="test"></span></p>
    
          <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select id, username, email from users ORDER BY id DESC');
while($dnn = mysql_fetch_array($req))
{ ?>
         <table ng-repeat="x in names | filter:test" ng-if="'<?=$dnn['username'] ?>' == x">           
   <?php  
      $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['username'].'" and (NOT username="Admin") AND online >= NOW() - INTERVAL 10 MINUTE ');  
while($row = mysql_fetch_assoc($result3)){ 
    if($row["username"=='Admin']){
        continue;
    }
$link=$row["id"];
$userImage="data:image;base64,".$row['image'];
$date=$row['date_registered'];
$status=$row['status'];
$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
          <tr>
            <td class="left"><a href="<?php echo $hrefa; ?>"><img src="<?php echo $userImage; ?>" ></a>
        </td>
        
        <td class="left "><span class="nameUser"><a href="<?php echo $hrefa; ?>" ng-bind="x"></a>
            </span> <br/>
            <?php echo "<span class='status-text2'>$status</span>"; ?>
            <br/>
            
            <?php 
            $profileName=$dnn['username'];
             $qry="SELECT online FROM register WHERE username='$profileName' AND online >= NOW() - INTERVAL 10 MINUTE" ;
    $resultOnline=mysql_query($qry)or die("Wrong query");
      
    if (mysql_num_rows($resultOnline)>0){
     
echo  '<h4>Online</h4></br>'; 
        
    }else {
        
        $qry6="SELECT * FROM register WHERE username='$profileName' " ;
    $result666=mysql_query($qry6)or die("Wrong query");
   if (mysql_num_rows($result666)>0)
   { $row = mysql_fetch_assoc($result666);   
 echo '<h4>Offline</h4> <p>Last time online at   '.$row['online'].'</p></br>';    
    }
    } 
            
            ?>
            
            
            <?= Dict::_('REGISTERED');?> <?php echo $date; ?>
            
        </td>
        
        <?php 
        $hrefa = '../public/profileTemplate.php?action=sendMessage&toUser='.$link.'&lang='.$_SESSION['lang'];
        $result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
        if($dnn['username']==$_SESSION['username']){
        ?>
        <td class="left"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a></td>
        <?php  } else {?>
        <td class="left"><a href="<?php echo $hrefa; ?>"><?= Dict::_('SENT_MESSAGE_TO');?>  <?php echo $dnn['username']; ?></a></td>
               </tr>
 <?php
        }
} ?>
      </table>            
<?php }
?> 
       
    </div>
      
      <div role="tabpanel" class="tab-pane" id="friends">
               <p><input type="text" ng-model="test" placeholder="Find ..."></p>
     
<p >Find this person:<span ng-bind="test"></span></p>
         
          <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from friend_list WHERE (friendName="'.$_SESSION['username'].'" OR userName="'.$_SESSION['username'].'") AND requestAccepted="1" ORDER BY id DESC');
    
while($dnn = mysql_fetch_array($req))
{     ?>
      <table ng-repeat="x in names | filter:test" ng-if="'<?=$dnn['userName'] ?>' == x" ng-if="'<?=$dnn['friendName'] ?>' == x">             
   <?php 
   if ($dnn['userName']!=$_SESSION['username'] ){
     
      $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['userName'].'" and (NOT username="Admin") '); 
      $profileName=$dnn['userName'];
}   else { $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['friendName'].'" and (NOT username="Admin") ');
                 $profileName=$dnn['friendName']; }
               
while($row = mysql_fetch_assoc($result3)){ 
    if($row["username"=='Admin']){
        continue;
    }
    
$link=$row["id"];
$userImage="data:image;base64,".$row['image'];
$date=$row['date_registered'];
$status=$row['status'];
$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
  
          <tr>
            <td class="left"><a href="<?php echo $hrefa; ?>"><img src="<?php echo $userImage; ?>" ></a>
        </td>
        
      <td class="left "><span class="nameUser"><a href="<?php echo $hrefa; ?>" ><?php echo htmlentities($profileName, ENT_QUOTES, 'UTF-8'); ?></a>
            </span> <br/>
            <?php echo "<span class='status-text2'>$status</span>"; ?>
            <br/>
            
            <?php 
            
             $qry="SELECT online FROM register WHERE username='$profileName' AND online >= NOW() - INTERVAL 10 MINUTE" ;
    $resultOnline=mysql_query($qry)or die("Wrong query");
      
    if (mysql_num_rows($resultOnline)>0){
     
echo  '<h4>Online</h4></br>'; 
        
    }else {
        
        $qry6="SELECT * FROM register WHERE username='$profileName' " ;
    $result666=mysql_query($qry6)or die("Wrong query");
   if (mysql_num_rows($result666)>0)
   { $row = mysql_fetch_assoc($result666);   
 echo '<h4>Offline</h4> <p>Last time online at   '.$row['online'].'</p></br>';    
    }
    } 
            
            ?>
            
            
            <?= Dict::_('REGISTERED');?> <?php echo $date; ?>
            
        </td>
        
        <?php 
        $hrefa = '../public/profileTemplate.php?action=sendMessage&toUser='.$link.'&lang='.$_SESSION['lang'];
        $result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
        if($profileName==$_SESSION['username']){
        ?>
        <td class="left"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a></td>
        <?php  } else {?>
        <td class="left"><a href="<?php echo $hrefa; ?>"><?= Dict::_('SENT_MESSAGE_TO');?>  <?php echo $profileName; ?></a></td>
     </tr>   <?php
        }
}?> </table>  
<?php }
?>
     
      </div>
  
            <div  role="tabpanel" class="tab-pane" id="friendsOnline">
          <p><input type="text" ng-model="test" placeholder="Find ..."></p>
     
<p >Find this person:<span ng-bind="test"></span></p>
      
          <?php
//We get the IDs, usernames and emails of users
$req = mysql_query('select * from friend_list WHERE friendName="'.$_SESSION['username'].'" OR userName="'.$_SESSION['username'].'" AND requestAccepted="1" ORDER BY id DESC');
while($dnn = mysql_fetch_array($req))
{    ?>
      <table ng-repeat="x in names | filter:test" ng-if="'<?=$dnn['userName'] ?>' == x" ng-if="'<?=$dnn['friendName'] ?>' == x">             
   <?php 
if ($dnn['userName']!=$_SESSION['username'] ){
   
      $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['userName'].'" and (NOT username="Admin") AND online >= NOW() - INTERVAL 10 MINUTE'); 
      $profileName=$dnn['userName'];

}   else { 
   
    $result3 = mysql_query('SELECT * FROM register WHERE username="'.$dnn['friendName'].'" and (NOT username="Admin") AND online >= NOW() - INTERVAL 10 MINUTE');
                 $profileName=$dnn['friendName'];
 }     
while($row = mysql_fetch_assoc($result3)){ 
    if($row["username"=='Admin']){
        continue;
    }
$link=$row["id"];
$userImage="data:image;base64,".$row['image'];
$date=$row['date_registered'];
$status=$row['status'];
$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
          <tr>
            <td class="left"><a href="<?php echo $hrefa; ?>"><img src="<?php echo $userImage; ?>" ></a>
        </td>
        
    <td class="left "><span class="nameUser"><a href="<?php echo $hrefa; ?>" ><?php echo htmlentities($profileName, ENT_QUOTES, 'UTF-8'); ?></a>
            </span> <br/>
            <?php echo "<span class='status-text2'>$status</span>"; ?>
            <br/>
            
            <?php 
            
             $qry="SELECT online FROM register WHERE username='$profileName' AND online >= NOW() - INTERVAL 10 MINUTE" ;
    $resultOnline=mysql_query($qry)or die("Wrong query");
      
    if (mysql_num_rows($resultOnline)>0){
     
echo  '<h4>Online</h4></br>'; 
        
    }else {
        
        $qry6="SELECT * FROM register WHERE username='$profileName' " ;
    $result666=mysql_query($qry6)or die("Wrong query");
   if (mysql_num_rows($result666)>0)
   { $row = mysql_fetch_assoc($result666);   
 echo '<h4>Offline</h4> <p>Last time online at   '.$row['online'].'</p></br>';    
    }
    } 
            
            ?>
            
            
            <?= Dict::_('REGISTERED');?> <?php echo $date; ?>
            
        </td>
        
        <?php 
        $hrefa = '../public/profileTemplate.php?action=sendMessage&toUser='.$link.'&lang='.$_SESSION['lang'];
        $result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($result);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
        if($profileName==$_SESSION['username']){
        ?>
        <td class="left"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a></td>
        <?php  } else {?>
        <td class="left"><a href="<?php echo $hrefa; ?>"><?= Dict::_('SENT_MESSAGE_TO');?>  <?php echo $profileName; ?></a></td>
      </tr>  <?php
        }
} ?></table> 
<?php } 
?>
       
      </div>
  </div>
	



		</div>
        <div class="foot1"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a> </div>

   <script>
var app=angular.module('myApp', []);
        app.controller('namesCtrl', function($scope) {
    $scope.names = [
        <?php 
$req = mysql_query('select username from users ORDER BY id DESC');
while($dnn = mysql_fetch_array($req))
{
?>
'<?=$dnn['username'] ?>',   
 <?php } ?>   
    ];  

});
</script> 
    </body>