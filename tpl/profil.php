<?php 

$title="Profil";


include_once '../public/header.php';
   include_once "../public/connection.php";


if (isset($_POST['submit']))
  {

if(!empty($_POST['check_list'])){
$interests = implode(",", $_POST['check_list']);
}
 
      if(!empty($_POST['languages'])){
$languages = implode(",", $_POST['languages']);
}else ($languages=$_POST['languages']);
    
 
        $age=  htmlspecialchars($_POST['age']);
      $sname=  htmlspecialchars($_POST['username']);
      $city=  htmlspecialchars($_POST['city']);
      $country=  htmlspecialchars($_POST['country']);
      $secondname= htmlspecialchars($_POST['secondname']);
     $sex= htmlspecialchars($_POST['sex']);
     
     $bio= htmlspecialchars($_POST['bio']);
     $languages= htmlspecialchars($_POST['languages']);
     $countryVisited= htmlspecialchars($_POST['countryVisited']);
     $movies= htmlspecialchars($_POST['movies']);
     $music= htmlspecialchars($_POST['music']);
     
if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
      
   $query= mysql_query("UPDATE register SET age='$age',username='$sname',secondName='$secondname',city='$city',sex='$sex',country='$country',interests='$interests', bio='$bio', languages='$languages',countryVisited='$countryVisited', movies='$movies', music='$music'  WHERE username='$name'");

    $id=$_SESSION['id'];
     $query2= mysql_query("UPDATE users SET username='$sname' WHERE id='$id'");
   $query3= mysql_query("UPDATE pm SET sender='$sname' WHERE senderId='$id'");
   $query4= mysql_query("UPDATE pm SET recepient='$sname' WHERE recepientId='$id'");
    $query5= mysql_query("UPDATE rating SET user='$sname' WHERE userVoteId='$id'");
      $query6= mysql_query("UPDATE friend_list SET friendName='$sname' WHERE friendId='$id'");
      $query7= mysql_query("UPDATE friend_list SET userName='$sname' WHERE userId='$id'");
         $query8= mysql_query("UPDATE profileComment SET user='$sname' WHERE userId='$id'");
           $query9= mysql_query("UPDATE profileComment SET picUser='$sname' WHERE picId='$id'"); 
                      $query10= mysql_query("UPDATE commenting SET name='$sname' WHERE id_post='$id'");
              $query11= mysql_query("UPDATE commentingtravel SET name='$sname' WHERE id_post='$id'");
                         $query12= mysql_query("UPDATE commentingculture SET name='$sname' WHERE id_post='$id'");
   $_SESSION['username']=$sname;
    }          

}

?>
<script type="text/javascript" src="../public/js/calendar111.js"></script>
<div class="col-xs-12 col-sm-12 tty">
<div class="row">
    
    <div class="col-xs-12 col-sm-9 col-sm-offset-1 tg1 profil-main">
        
         <?php 
   
if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
      

$lin1='<img src="';
$lin2='" />';
$query="SELECT * FROM register WHERE username='$name'";  
$result=mysql_query($query)or die("Wrong query");  
if (mysql_num_rows($result)>0){  
while ($row = mysql_fetch_assoc($result)){ 
    $spic="data:image;base64,".$row['image']; 
    $spic2="data:image;base64,".$row['backimage']; 
    $sname=$row['username'];
    $secondname=$row['secondName'];
    $semail=$row['email'];
    $city=$row['city'];
    $country=$row['country'];
     $age=$row['age'];
     $sex=$row['sex'];
     $bio=$row['bio'];
     $languages=$row['languages'];
     $countryVisited=$row['countryVisited'];
     $movies=$row['movies'];
     $music=$row['music'];
}
}
} 
        ?>
        <div class="profil-image col-xs-10 coli-xs-1 col-sm-4 ">
            <?php    echo $lin1.$spic.$lin2; ?>
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 ">
            <form action="" method="post">
                <input class="profil-post" type="submit" name="update" id="update1" value="Update Profil" onclick="showButton()" />
            </form>
            
                <input class="md-trigger " data-modal="modal-7" class="profil-post" type="submit" name="edit" id="update1" value="Update Password" />
   
     <?php      echo " <div class='md-modal md-effect-3 row' id='modal-7'>
			<div class='md-content3 jj col-xm-12 col-sm-8 col-sm-offset-2 '>
                        
<form action='/tpl/update_password.php' method='post' enctype='multipart/form-data' name='form1' id='form1'>


<label for='image1'>Update Password:</label>
                <input type='password' name='old_pass' placeholder='Old password'>
                <input type='password' name='new_pass' placeholder='New password'>
                <input type='password' name='new_pass_2' placeholder='Repeat new password'>
                <input type='submit' name='submit' id='submit' value='".Dict::_('UPDATE')."'/>
               
                </form>
                 <button class='md-close btn-success  btn-sm '>".Dict::_('CLOSE')."</button> 
</div></div> "; 
     
       
  
 ?>                
                </div>
        </div>
         <div class="col-xs-12 col-sm-7 col-sm-offset-1 ">
      <?php  if (isset($_POST['update']))
  {
      include_once "arprofile.php"; 
  }else { 
      include_once "profiledata.php";
      if (isset($_POST['submit']))
  {
         
  }
  } ?>
          
         </div>
      <div class="hidden-xs hidden-xm col-sm-8 col-sm-offset-2 vikt">
        <div class="hidden-xs hidden-xm col-sm-5  viki ">
       <?php   
       $a='https://www.viki.com/';
       $b='../public/img/viki.jpg';
       $c='Viki Movies';
       $d=Dict::_('VIKI');
       viki ($a,$b,$c,$d);  ?>  
        </div>
            
     
        <div class="hidden-xs hidden-xm col-sm-5 col-sm-offset-2  viki ">
       <?php   
       $a='http://www.frenchspanishonline.com/';
       $b='../public/img/french.jpg';
       $c='Viki Movies';
       $d=Dict::_('LEARN_FRENCH');
       viki ($a,$b,$c,$d);  ?>
        </div> 
                 </div> 
          <div class="hidden-xs hidden-xm col-sm-8 col-sm-offset-2 vikt">
        <div class="hidden-xs hidden-xm col-sm-5  viki ">
       <?php   
       $a='https://dev.by';
       $b='../public/img/devby.png';
       $c='Dev.by';
       $d=Dict::_('DEVBY');
       viki ($a,$b,$c,$d);  ?>  
        </div>
            
     
        <div class="hidden-xs hidden-xm col-sm-5 col-sm-offset-2  viki ">
       <?php   
       $a='http://www.frenchspanishonline.com/';
       $b='../public/img/french.jpg';
       $c='Viki Movies';
       $d=Dict::_('LEARN_FRENCH');
       viki ($a,$b,$c,$d);  ?>
        </div> 
                 </div> 
   </div>
    
    <div class="col-xs-12 col-sm-2 tty">

      
      
       <div class="hidden-xs hidden-xm col-sm-11 col-sm-offset-1  ">  
                  <div id="rsidebar">
                     <?php include_once '../public/listarticle_articles.php'; ?>
                     </div>   
                 </div>  
    </div>
</div>            
<?php

include_once "../public/footer.php";
?>
<script>
    $(function() {
    var top1 = $('#rsidebar').offset().top - parseFloat($('#rsidebar').css('marginTop').replace(/auto/, 0));
    var footTop1 = $('.footer').offset().top-50 - parseFloat($('.footer').css('marginTop').replace(/auto/, 0));

    var maxY1 = footTop1 - $('#rsidebar').outerHeight();

    $(window).scroll(function(evt) {
        var y1 = $(this).scrollTop();
        if (y1 > top1) {
            if (y1 < maxY1) {
                $('#rsidebar').addClass('fixedr').removeAttr('style');
            } else {
                $('#rsidebar').removeClass('fixedr').css({
                    position: 'absolute',
                    top: (maxY1 - top1) + 'px',
                    
                });
            }
        } else {
            $('#rsidebar').removeClass('fixedr');
        }
    });
});
</script>


<script>
function formHide(){
    $('#formProfil').hide();
     
    
}
</script>
<script>
function showButton(){
    $('#update1').hide();
}
</script>