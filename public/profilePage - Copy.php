<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: false,
              $AutoPlaySteps: 4,
              $SlideDuration: 160,
              $SlideWidth: 300,
              $SlideSpacing: 3,
              $Cols: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 3
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 309);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
 <script type="text/javascript" src="../public/js/calendar.js"></script>
    <style>
        
        /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        .jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('../templates/travelasia/img/b03.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

        /* jssor slider arrow navigator skin 03 css */
        /*
        .jssora03l                  (normal)
        .jssora03r                  (normal)
        .jssora03l:hover            (normal mouseover)
        .jssora03r:hover            (normal mouseover)
        .jssora03l.jssora03ldn      (mousedown)
        .jssora03r.jssora03rdn      (mousedown)
        */
        .jssora03l, .jssora03r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
            background: url('../templates/travelasia/img/a03.png') no-repeat;
            overflow: hidden;
        }
        .jssora03l { background-position: -3px -33px; }
        .jssora03r { background-position: -63px -33px; }
        .jssora03l:hover { background-position: -123px -33px; }
        .jssora03r:hover { background-position: -183px -33px; }
        .jssora03l.jssora03ldn { background-position: -243px -33px; }
        .jssora03r.jssora03rdn { background-position: -303px -33px; }
    </style>
    <script type="text/javascript" src="../templates/travelasia/js/jssor.slider-21.1.5.mini.js"></script>
<?php

$prof=$_GET['articleId'];

  include 'connection.php';

if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect); 
  
$result = mysql_query("SELECT * FROM register WHERE id='".$prof."'");  
if (mysql_num_rows($result)>0){  
while ($row = mysql_fetch_assoc($result)){  
$profilePic="data:image;base64,".$row['image'];

$profileName=$row['username'];

$profileSurname=$row['secondName'];
$status=$row['status'];
$sex=$row['sex'];
$country=$row['country'];
$city=$row['city'];
$age=$row['age'];
$interests=$row['interests'];
$languages=$row['languages'];
$bio=$row['bio'];
$countryVisited=$row['countryVisited'];
$movies=$row['movies'];
$music=$row['music'];
$link=$row["id"];
$_SESSION['picId']=$link;

?>
<div class="col-xs-12 col-sm-12 backimage">
   <?php 
   if(!empty($row['backimage'])){
     $backPic="data:image;base64,".$row['backimage'];
          echo '<img src="'.$backPic.'" >';  
         }else {
    echo '<img src="../public/img/back1.jpg">';
   }
 }
}
}
           ?> 
</div>
<div class="col-xs-12  col-sm-6 leftprof">
  <?php 
  
  echo  '<div class="col-xs-12 col-sm-10 col-sm-offset-1 yyy1" style="width:300px;height:300px;"><a  data-toggle="modal" data-target=".bs-example-modal-sm"><img src="'.$profilePic.'" ></a></div>';

  
    if($_SESSION['username']==$profileName){
        echo "<p class='hidden-lg'><a class='md-trigger btn btn-success button wobble-vertical lll' data-modal='modal-6'> Change background</a></p>";
  echo "<p><a class='md-trigger btn btn-success button wobble-vertical' data-modal='modal-5'> ".Dict::_('CHANGE_PROF_PIC')."</a></p>"
        . " <div class='md-modal md-effect-3 row' id='modal-5'>
			<div class='md-content3 jj col-xm-12 col-sm-8 col-sm-offset-2 '>
                        
<form action='../tpl/upPic.php' method='post' enctype='multipart/form-data' name='form1' id='form1'>


<label for='image1'>".Dict::_('CHANGE_PROF_PIC').":</label>
            
                <input  type='file' name='image' id='image1' />
                <input type='submit' name='submit' id='submit' value='".Dict::_('UPDATE')."'/>
                
                </form>
                <button class='md-close btn-success  btn-sm '>".Dict::_('CLOSE')."</button> 
</div></div> ";     
    } 
    if($_SESSION['username']==$profileName){
    $count = mysql_query('SELECT * FROM pm WHERE recepient="'.$_SESSION['username'].'" and user2read="no"'); 
        $messNumb = mysql_fetch_array($count);
       $messNumb2= intval(mysql_num_rows($count));
    $hrefa = '../public/profileTemplate.php?action=listMessage&articleId='.$link.'&lang='.$_SESSION['lang'];
         echo "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='$hrefa' class='button hover men'><img src='../public/img/messageall.png'></a>"
    . "<a href='$hrefa'>".Dict::_('YOUR_MESSAGES');
         if ($messNumb2>=0){echo "(".$messNumb2.")";}
          echo "</a></div>";
         $fQuery2 = mysql_query('SELECT * FROM friend_list WHERE friendName="'.$_SESSION['username'].'" and requestAccepted="0"'); 
        if (mysql_num_rows($fQuery2)>0){
            
         $fRow2 = mysql_fetch_array($fQuery2);     
       echo  "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='../public/profileTemplate.php?action=acceptFriend&lang=".$_SESSION['lang']."' class='button hover men'><img src='../public/img/picAdd.png'></a>"
                 . "<a href='../public/profileTemplate.php?action=acceptFriend&lang=".$_SESSION['lang']."'>".Dict::_('YOU_HAVE').mysql_num_rows($fQuery2).Dict::_('NEW_F_REQ')."</div>";     
        
        }
          
    } else {
    $hrefa = '../public/profileTemplate.php?action=sendMessage&toUser='.$link.'&lang='.$_SESSION['lang'];
         echo "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='$hrefa' class='button hover men'><img src='../public/img/message1.png'></a>"
                 . "<a href='$hrefa'>".Dict::_('MESSAGE_TO_USER')."</a></div>";
  
            $fQuery = mysql_query('SELECT * FROM friend_list WHERE (userName="'.$_SESSION['username'].'" OR friendName="'.$_SESSION['username'].'")  and (friendId="'.$link.'" or userId="'.$link.'")'); 
        $fRow = mysql_fetch_array($fQuery);
    if($fRow['requestSent']==1 && $fRow['requestAccepted']==0){
    echo  "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='../public/add_as_friend.php?lang=".$_SESSION['lang']."&id=".$link."' class='button hover men'><img src='../public/img/perSent2.png'></a>"
                 . "<a href='#'>".Dict::_('FRIEND_REQUEST_SENT')."</div>";     
    }  elseif ($fRow['requestSent']==1 && $fRow['requestAccepted']==1) {
     echo  "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='#' class='button hover men'><img src='../public/img/users.png'></a>"
                 . "<a href='#'>".strtoupper($profileName).Dict::_('IS_YOUR_FRIEND')."</div>";   
     echo  "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='../public/add_as_friend.php?lang=".$_SESSION['lang']."&id=".$link."&action2=delete' class='button del hover men'><img src='../public/img/deletePerson.png'></a>"
                 . "<a class='button del ' href='#'> ".Dict::_('DELETE2').strtoupper($profileName).Dict::_('FROM_FRIENDLIST2')."</div>"; 
    }else {
      echo  "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='../public/add_as_friend.php?lang=".$_SESSION['lang']."&id=".$link."&action2=add' class='button hover men'><img src='../public/img/picAdd.png'></a>"
                 . "<a href='../public/add_as_friend.php?lang=".$_SESSION['lang']."&id=".$link."&action2=add'>".Dict::_('ADD_AS_FRIEND')."</a></div>";        
    }    
    }
    $hrefUser = '../public/profileTemplate.php?action=userMessage&lang='.$_SESSION['lang'];
  
         echo "<div class='col-xs-12 col-sm-10 col-sm-offset-1'><a href='$hrefUser' class='button hover men'><img src='../public/img/persons.png' ></a>"
                 . "<a href='$hrefUser'>".Dict::_('LIST_OF_USERS')."</a></div>";
     
        
echo '<div class="col-xs-12 col-sm-10 col-sm-offset-1"><hr>'
         . '<div class="col-xm-6 col-sm-6"><a href="../public/profileTemplate.php?id='.$prof.'&action=photogallery&lang='.$_SESSION['lang'].'"><h3>Photogallery</h3></a></div><div class="col-xm-6 col-sm-3 col-sm-offset-3">';
if($_SESSION['username']==$profileName){
  echo '<a class="md-trigger btn btn-success button wobble-vertical" data-modal="modal-4">'.Dict::_('ADD_PHOTO').'</a></div><br/><br/>';  
}else  echo '</div><br/><br/>';
echo '             <div id="jssor_1"  >
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url(\'img/loading.gif\') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
            ';
$result = mysql_query("SELECT * FROM user_photos WHERE userId='".$prof."'");  
 
if (mysql_num_rows($result)>0){  
while ($row23 = mysql_fetch_assoc($result)){  
$photo="data:image;base64,".$row23['photo'];
$description=$row23['description'];
$place=$row23['place'];
$id= $row23['id'];   
echo '<div data-p="144.50" style="display: none;">
    <a  data-toggle="modal" data-target=".bs-example-modal-sm'.$id.'">
<img  src="'.$photo.'" />
</a>
                <img data-u="thumb" src="'.$photo.'" /></div>';
}
}
  echo' <a data-u="add" href="http://www.jssor.com/demos/image-gallery.slider" style="display:none">Image Gallery</a>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l" style="top:158px;left:8px;width:50px;height:70px;"></span>
        <span data-u="arrowright" class="jssora03r" style="top:158px;right:8px;width:50px;height:70px;"></span>
    </div>'
        . '</div>';
$result = mysql_query("SELECT * FROM user_photos WHERE userId='".$prof."'");  
if (mysql_num_rows($result)>0){  
while ($row23 = mysql_fetch_assoc($result)){
    $photo="data:image;base64,".$row23['photo'];
$description=$row23['description'];
$place=$row23['place'];
$id= $row23['id'];
	

  echo '<div class="modal fade bs-example-modal-sm'.$id.'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
				<div class="modal-content my-img">
                                	<div class="grid1">
					<figure class="effect-honey">  <img  src="'.$photo.'" />
						<figcaption>
                                                
							<h2>'.$description.' <i>Now';
  echo '</i></h2>
						
				</figcaption>			
					</figure></div>
                          
			
				</div>
			</div>
		</div>';  
}
}

     echo " <div class='md-modal md-effect-3 row' id='modal-4'>
			<div class='md-content3 jj col-xm-12 col-sm-8 col-sm-offset-2 '>
                        
<form action='../tpl/upPhoto.php' method='post' enctype='multipart/form-data' name='form1' id='form1'>


<label for='image1'>Photo:</label>
                <input type='text' name='description' placeholder='Description...'>
                <input type='text' name='place' placeholder='Place...'>
                <input  type='file' name='image' id='image1' required/> 
               <p class='attention' style='font-weight:bold;'> <span class='redAt' style='color:red;
font-size:25px;
padding-left: 10px;'>*</span>Attention: your picture must be less than 2 MB </p>   
                <input type='submit' name='submit' id='submit' value='".Dict::_('UPDATE')."'/>       
                </form>
                <button class='md-close btn-success  btn-sm '>".Dict::_('CLOSE')."</button> 
</div></div> "; 
     
       
  
 ?>   
</div>
<?php

  echo '<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm ">
                        
				<div  class=" modal-content modalProfil2">
                             
                            <div class="likePicMain"> <img src="'.$profilePic.'" >
                                 <span class="likePic"><a href="#" class="button pulse "><i class=" fa fa-heart" aria-hidden="true"></i></a></span></div>
                                
                            <div class="modalProfil1">
                                  <h2>'.$profileName.' '.$profileSurname.'</h2></br>';
                      //           <p><i class="fa fa-heart" aria-hidden="true"></i> Like</p>';
 
  include '../tpl/rating/rating.php';
  
                           echo' <div class="comments">';
  $sql = mysql_query("SELECT * FROM profileComment WHERE picUser = '$profileName'   ORDER BY id DESC ") or die(mysql_error());
    while($row = mysql_fetch_assoc($sql)){ 
        $user = $row['user'];
        $comment = $row['comment'];
    $userImage=$row['userImage'];
    $date=$row['date'];
       $id=$row['id'];                         
echo     '<div class="content-comment" class="'.$id.'">
        <img src="'.$userImage.'" />
        <div class="cont11">
            <span data-utime="1371248446" class="span" ><span class="prName">'.$user.'</span>  '.$date.'</span>
             <p>'.$comment.'</br>';  
  if ($_SESSION['username']==$user){
      
   echo "<span class='dComment'><a name='deleteC' id='$id' class='bt-delete-comment'>".Dict::_('DELETE_COMMENT')."</a><cpan>";
  }     
echo '</p> </div>
    </div>';
    }
                              echo  '</div>';
		echo '		<div class="comment-form">
                                <input type="text" class="comm" name="comment" placeholder="Type your comment...">
                                <button name="submitC" class="btn btn-small btn-success bt-add-com">'.Dict::_('SEND').'</button>
                          </div>';
			echo	'</div>
                             </div>  
			</div>
		</div>';

  

  
?>
<div class="col-xs-12 col-sm-6 rightprof">
    <?php 
       if($_SESSION['username']==$profileName){
  echo "<p class='hidden-xs'><a class='md-trigger btn btn-success button wobble-vertical lll' data-modal='modal-6'>".Dict::_('CHANGE_BACK')."</a></p>"
        . " <div class='md-modal md-effect-2 row' id='modal-6'>
			<div class='md-content3 jj col-xm-12 col-sm-8 col-sm-offset-2 '>
                        
<form action='../tpl/upPicBackground.php' method='post' enctype='multipart/form-data' name='form1' id='form2'>


<label for='image1'>".Dict::_('CHANGE_PROF_PIC')." :</label>
                 
                <input  type='file' name='image' id='image1' />
                <input type='submit' name='submit' id='submit' value='".Dict::_('UPDATE')."'/>
                
                </form>
                <button class='md-close btn-success btn-sm '>".Dict::_('CLOSE')."</button> 
</div></div> "; 
        
    }    
    $qry="SELECT online FROM register WHERE username='$profileName' AND online >= NOW() - INTERVAL 10 MINUTE" ;
    $resultOnline=mysql_query($qry)or die("Wrong query");
      
    if (mysql_num_rows($resultOnline)>0){
     
    echo '<h1>'.$profileName.'  '.$profileSurname.'</h1>'
            . '<img src="../public/img/online.png" width="40"><h4>Online</h4></br>'; 
        
    }else {
        $qry6="SELECT * FROM register WHERE username='$profileName' " ;
    $result666=mysql_query($qry6)or die("Wrong query");
   if (mysql_num_rows($result)>0)
   { $row = mysql_fetch_assoc($result666);   
 echo '<h1>'.$profileName.'  '.$profileSurname.'</h1>'
            . '<img src="../public/img/offline.png" width="40"> <h4>Offline</h4> <p>Last time online at   '.$row['online'].'</p></br>';    
    }
    }  

    echo  '<div class="statusMain">';
    if(empty($status) || $status==" "){
        if($_SESSION['username']==$profileName){
            if(isset($status)){
        echo  "<div class='status'>
                                <input type='text' class='comm1' name='comment' placeholder='Type your status...'>
                                <button name='submitS' class='btn btn-small btn-success bt-add-status'>".Dict::_('UPDATE')."</button>
                          </div>";
        echo " <div class='content-comment-1'>
             	<p class='status-text'>$status</p>
           	</div>  ";
    }  else {
        echo " <div class='content-comment-1'>
    	<p class='status-text'>  $status </p>
	</div>";
    }
    }
    else {
        echo "<p class='status-text'>".Dict::_('USER_STATUS')."</p> ";
        
    }
    } 
 elseif($_SESSION['username']==$profileName){       
 echo " <div class='content-comment-1'>
    	<p class='status-text'>$status 
        
	</p> <span class='buttonStatus' style='display:none;'>   <a name='editS'  class='bt-edit-status'>". Dict::_('EDIT')."</a>   
         <a name='deleteS' class='bt-delete-status'> ".Dict::_('DELETE')."</a></span></div>";
 }  else {
    echo " <div class='content-comment-1'>
    	<p class='status-text'> $status</p>
	</div>";
    }
    echo '</div>';
    echo '<hr><span class="info">';
    if($_SESSION['username']==$profileName){
        
    echo "<h5 class='edit'><a href='../tpl/profil.php'>". Dict::_('EDIT')."</a></h5>";
    }
    
    
    function personInfo($val1,$val2,$fill){
 
       echo "<p><aside class='info-row'><h2><i>$val2</i></h2></aside><aside class='info-row-2'><h2><b>";
         if(empty($val1)){
             echo "<span style='color:#424945;font-size:15px;'>$fill</span>";
         }else {
              if($val1=="Male"){
            $sexPic='../public/img/male.png';
            echo "<img src='".$sexPic."' width='40' height='40'>";
            }elseif($val1=="Female"){
            $sexPic='../public/img/female.png';
            echo "<img src='".$sexPic."' width='40' height='40'>";
            }else { echo $val1;}
            
            }
        echo "</b></h2></aside></p>"; 
  
    };
    
    $nameLink=[$sex,$age,$country,$city,$languages,$interests,$music,$movies,$countryVisited];
    $nameValue=[Dict::_('SEX'),Dict::_('AGE'),Dict::_('COUNTRY'),Dict::_('CITY'),Dict::_('LANGUAGES2'),
    Dict::_('INTERESTS'),Dict::_('MUSIC'),Dict::_('MOVIES'),Dict::_('CO_VISITED')];
    
    
        for ($i=0; $i<count($nameValue);$i++){
            
            $fill=Dict::_('FILL');
           personInfo($nameLink[$i],$nameValue[$i],$fill); 
        }
  
        echo '</span>';
 
 ?> 
</div>
<script type="text/javascript">
 $(function(){    
 $('.info').mouseover(function(){
     $('.edit').show();
 })
  $('.info').mouseout(function(){
     $('.edit').hide();
 })
    })
    </script>
  
<script type="text/javascript">
 $(function(){    
 $('.statusMain').mouseover(function(){
     $('.buttonStatus').show();
  
 })
 $('.statusMain').mouseout(function(){
     $('.buttonStatus').hide();
  
 })

    })
    </script>
<script type="text/javascript">
    $(function(){ 
         $('.bt-add-com').click(function(){
            var theCom = $('.comm');
           

            if( !theCom.val()){ 
                alert('<?= Dict::_('WRITE_COMMENT');?>'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "CommentProf.php?action=submitC",
                     data:  { comment: theCom.val(),picUser:"<?php echo $profileName; ?>",picId:"<?php echo $link; ?>" },
                    
                    success: function(html){
                         theCom.val('');
                            
                            $('.content-comment:first-child').before(html);  
                       
                    }  
                });
            }
        });
        
        });
    </script>
    <script type="text/javascript">
    $(function(){ 
         $('.bt-add-status').click(function(){
            var theStat = $('.comm1');
           

            if( !theStat.val()){ 
                alert('You need to write a status!'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "../public/ajax_status.php?action=submitS",
                     data:  { status: theStat.val(),user:"<?php echo $profileName; ?>" },
                  
                    success: function(html){
                         theStat.val('');
                         
                   
                    $('.status').hide('fast', function(){
                            $('.content-comment-1').show('fast');
                            $('.content-comment-1').append(html);  
                        })
                    }  
                   
                });
            }
        });
        
        });
    </script>
        <script type="text/javascript">
    $(function(){ 
         $('.bt-edit-status').click(function(){ 
        $('.content-comment-1').hide();
        var htmlStr = '<div class="status"><input type="text" class="comm1" name="comment" placeholder="<?= $status; ?>"><button name="submitS" class="btn btn-small btn-success bt-add-status"><?= Dict::_('UPDATE');?></button></div>';

$('.statusMain')[0].innerHTML = htmlStr;
  $('.bt-add-status').click(function(){
            var theStat = $('.comm1');
           

            if( !theStat.val()){ 
                alert('<?= Dict::_('WRITE_STATUS');?>'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "../public/ajax_status_edit.php?action=editS",
                     data:  { status: theStat.val(),user:"<?php echo $profileName; ?>" },
                  
                    success: function(html){
                         theStat.val('');
                         
                   
                    $('.status').hide('fast', function(){
                            $('.statusMain').show('fast');
                            $('.statusMain').append(html);  
                        })
                    }  
                   
                });
            }
        });
             });
        
        });
    </script>
         <script type="text/javascript">
    $(function(){ 
         $('.bt-delete-status').click(function(){
               var check=confirm('<?= Dict::_('YOUR_STATUS_DELETED');?>'); 
               if(check){
               
        $('.content-comment-1').hide();
      
        
                $.ajax({
                    type: "POST",
                    url: "../public/ajax_status_delete.php?action=deleteS",
                     data:  { user:"<?php echo $profileName; ?>" },
                  
                    success: function(html){
                    $('.statusMain').hide();
                    }  
                   
                });
        var htmlStr = '<p><?= Dict::_('YOUR_STATUS_DELETED');?></p>';

$('.statusMain')[0].innerHTML = htmlStr;
            };
             });
             
        });
    </script>
             <script type="text/javascript">
    $(function(){ 
         $('.bt-delete-comment[id]').click(function(){ 
     
      var deleteCom=confirm('<?= Dict::_('WANT_DELETED');?>');
      
       var id =$(this).attr('id');
       if(deleteCom){
                $.ajax({
                    type: "POST",
                    url: "../public/ajax_comment_delete.php?action=deleteC",
                     data:  { user:"<?php echo $user; ?>",id:$(this).attr('id') },
                  
                    success: function(html){
                //    $('.statusMain').hide();
                    }  
                   
                })
        var htmlStr = '<p><?= Dict::_('YOUR_COM_DELETED');?></p>';

$('.content-comment:has(.bt-delete-comment[id='+id+']) ').html(htmlStr);
        
} });
        
        });
    </script>
  
    <script>
         $(function(){ 
             $('.modalProfil2 ').mouseover(function(){
              $('.likePic').css("display","inline-block");   
             });
        $('.modalProfil2 ').mouseout(function(){
              $('.likePic').css("display","none");   
             });
         });
        </script>
        <script>
        jssor_1_slider_init();
    </script>
    <script>
        [].slice.call( document.querySelectorAll('a[href="#"') ).forEach( function(el) {
				el.addEventListener( 'click', function(ev) { ev.preventDefault(); } );
			} );
		</script>
                

 <!--    '../public/add_as_friend.php?lang=".$_SESSION['lang']."&id=".$link."&action2=delete'-->
       <script>
         $(function(){ 
            $('.del').click(function(){  
            var friend='<?=$profileName?>';
            var conf=confirm('<?= Dict::_('REALLY_WANT');?>'+friend+'<?= Dict::_('FROM_FRIENDLIST');?>');
            var lang='<?= $_SESSION['lang']?>';
            var link='<?= $link?>';
            if(conf){
             window.location.href = '../public/add_as_friend.php?lang='+lang+'&id='+link+'&action2=delete';   
            }
         
            });
         });
        </script>