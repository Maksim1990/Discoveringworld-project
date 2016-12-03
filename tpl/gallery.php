<?php 
session_start();

$title="Gallery";

$art="active";
include_once '../public/header.php';


?>
<?php  
// Устанавливаем соединение с базой данных  
    // Connecting to Database
    include_once '../public/connection.php';


if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
      
}
?>
<html>
       
    <body>
         <script type="text/javascript" src="../public/js/calendar111.js"></script>
        <div class="col-xm-12 col-sm-12 gallery-back">
            
        <div class="col-xs-10 col-xs-offset-1 col-xm-offset-2 col-sm-8 col-sm-offset-1 gallery" >
          
            <div class="col-xm-12 col-sm-12 gallery-title" >
                <h3><?=Dict::_('ART_GALLERY')?></h3> 
                <p><?=Dict::_('ART_GALLERY_DESCRIPTION')?></p>
                <p></p>
            </div>
                 <div class="col-xm-12 col-sm-12 gallery2">
            <?php
            include 'test2.php';
        if (isset($_POST['submit']))
        {
            
            
            if(getimagesize($_FILES['image']['tmp_name'])==FALSE)
            {
                echo '<h1 class="warningg">Please select an image.</h1>';
            }  else {
                 $description=$_POST['description'];
                $image=  addslashes($_FILES['image']['tmp_name']);
                $name=  addslashes($_FILES['image']['name']);
                $image=  file_get_contents($image);
                $image=  base64_encode($image);
                saveImage($name,$image,$description);
            }
           
        }
        function saveImage($name,$image,$description)
        {
            $qry="INSERT INTO gallery (imname, image,description) VALUES ('$name','$image','$description')";
        $result=  mysql_query($qry);
                }
        ?>

</div>            
  </div>
            <div class="hidden-xs hidden-md hidden-sm col-lg-2 col-lg-offset-1 " style="margin-top: 50px;">
               <div id="rsidebar">
                     <?php include_once '../public/listarticle_articles.php'; ?>
                     </div>
            </div>
        <div class="col-xm-12 col-sm-10 col-sm-offset-1 gallery-form">

           <?php  if($_SESSION['user_email']=="admin@mail.ru" ){
?>     
           <form method="post" enctype="multipart/form-data">
                </br>
            <input type="text" name="description" />
            </br>
            <input type="file" name="image" />
             </br></br>   
             <input type="submit" name="submit" value="Upload" />
        
        </form>     <?php } 
    ?>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12">
            <?php
 
include_once "../public/footer.php";
?></div>

<script>
(function(){
	$('.gallery2 img').on("click", function(){
		fullScreenFunc(this);
	});
})();

function fullScreenFunc(obj){
	if (obj.requestFullscreen) {
		obj.requestFullscreen();
	}
	else if (obj.mozRequestFullScreen) {
		obj.mozRequestFullScreen();
	}
	else if (obj.webkitRequestFullScreen) {
		obj.webkitRequestFullScreen();
	}
}
</script> 
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
    </body>
</html>
