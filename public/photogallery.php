<div class="col-xs-12 col-sm-10 col-sm-offset-1" style="padding-top:40px ;">
    <div class="col-xm-6 col-sm-6"><h1>Photogallery</h1><br></div>
    <div class="col-xs-12 col-sm-12 " >
<?php

session_start(); 
   include 'connection.php';


if (!$connect){
    exit(mysql_error());    
}
else {
      mysql_select_db("$db_name",$connect);
    $prof=$_GET['id'];

$result = mysql_query("SELECT * FROM user_photos WHERE userId='".$prof."' LIMIT 6 ");  
 
if (mysql_num_rows($result)>0){  
while ($row23 = mysql_fetch_assoc($result)){  
$photo="data:image;base64,".$row23['photo'];
$description=$row23['description'];
$place=$row23['place'];
$id= $row23['id']; ?>
        <div class="col-xs-12 col-sm-6 sep">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1">    

<?php

 echo '<a  data-toggle="modal" data-target=".bs-example-modal-sm'.$id.'">'
         . '<img data-u="thumb" id="pic-'.$id.'" src="'.$photo.'" /></a>';
 
 include '../tpl/rating/rating2.php';
 
 echo '</div></div>';
 
   echo '<div class="modal fade bs-example-modal-sm'.$id.'" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
				<div class="modal-content my-img">
                                	<div class="grid1">
					<figure class="effect-honey">  <img  src="'.$photo.'" />
						<figcaption>
                                                
							<h2>'.$description.'<br/> <i>Now</i></h2>
						
				</figcaption>			
					</figure></div>
                          
			
				</div>
			</div>
		</div>'; 
}
}  
}  ?>
                  <?php   
    $resultP = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' ); 
        $ref = mysql_fetch_assoc($resultP);
        $link=$ref["id"];
        $hreafUser='../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
?>
		
        <div class="foot1"><a href="<?php echo $hreafUser; ?>"><?= Dict::_('GO_TO_PROFILE');?></a> </div>            
</div>

        </div>