<!DOCTYPE html>
<html>
    <head>
       

        <link type="text/css" rel="stylesheet" href="../tpl/comment/css/style.css">
        <link type="text/css" rel="stylesheet" href="../tpl/comment/css/example.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        

    </head>
    <body>
<?php
    include '../public/connection.php';
mysql_select_db($db_name); 	
	 
?>
<?php 
$id_post = "1"; //the post or the page id
$mark=$markAr;
$mark_article=$_SESSION['lang'];
?>
<div class="cmt-container" >
           <?php  if($_SESSION['user_email']){
?>     
        
    <div class="new-com-bt">
        <span><?=Dict::_('WRITE_COMMENT')?></span>
    </div>
    <div class="new-com-cnt">
  
        <textarea class="the-new-com"></textarea>
        <div class="bt-add-com"><?=Dict::_('POST_COMMENT')?></div>
        <div class="bt-cancel-com"><?=Dict::_('CANCEL')?></div>
    </div>
    <div class="clear"></div>
    
    <?php } 
    
    else {echo '<p>'.Dict::_('IN_ORDER_TO_COMMENT').'<a  href="../tpl/register.php">'.Dict::_('REGISTER1').'</a>'.Dict::_('OR').'<a  href="../tpl/login.php">'.Dict::_('LOGIN1').'</a>'.Dict::_('ON_WEB_SITE').'</p>';}
    
    ?>
    <?php 
       $sql = mysql_query("SELECT * FROM commentingtravel WHERE mark='$mark' AND mark_article='$mark_article'   ORDER BY id DESC ") or die(mysql_error());;
    while($affcom = mysql_fetch_assoc($sql)){ 
        $name = $affcom['name'];
        $email = $affcom['email'];
        $comment = $affcom['comment'];
        $date = $affcom['date'];
        $articId = $affcom['id'];
      $qry="SELECT * FROM register WHERE username='$name' ";
    $result=mysql_query($qry)or die("Wrong query");  

while ($row = mysql_fetch_assoc($result)){  
 
                                           

		if($name=='Admin'){		   
            $grav_url="../tpl/comment/img/profile-img1.jpg";
                }  else {
                    
                
                  $grav_url="data:image;base64,".$row['image'];
                }
    
}                 

    ?>
    <div class="cmt-cnt">
        <img src="<?php echo $grav_url; ?>" />
        <div class="thecom">
            <h5><?php echo $name; ?></h5><span data-utime="1371248446" class="com-dt"><?php echo $date; ?></span>
            <br/>
           <p>
                <?php echo $comment; 
                if($name==$_SESSION['username']){ ?>
            <h6><a id="<?php echo $articId; ?>" class="btn-del" href="#"><?=Dict::_('DELETE')?> </a></h6>
          <?php } ?>
            </p>
        </div>
    </div><!-- end "cmt-cnt" -->
     <script>
         $(function(){
           var  articId=<?=$articId?>;
                 $('#'+articId).click(function(){
                
            var conf=confirm('Do you really want to delete this comment?');
            var comment='<?=$comment?>';
            
            var d='commentingtravel';
            if(conf){
             window.location.href = '/public/article_comment_delete.php?&d='+d+'&articId='+articId+'&comment='+comment;   
            }
         
            });
         });
        </script>
    <?php } ?>


    
</div><!-- end of comments container "cmt-container" -->


<script type="text/javascript">
   $(function(){ 
        //alert(event.timeStamp);
        $('.new-com-bt').click(function(event){    
            $(this).hide();
            $('.new-com-cnt').show();
            $('#name-com').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click 
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theName = $('#name-com');
            var theMail = $('#mail-com');

            if( !theCom.val()){ 
                alert('You need to write a comment!'); 
            }else{ 
                $.ajax({
                    type: "POST",
                    url: "../tpl/comment/ajax/add-comment-travel.php",
                    data: 'act=add-com&id_post='+<?php echo $id_post; ?>+'&email='+theMail.val()+'&comment='+theCom.val()+'&mark='+<?php echo $mark; ?>,
                    success: function(html){
                        theCom.val('');
                        theMail.val('');
                        theName.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').after(html);  
                        })
                    }  
                });
            }
        });

    });
</script>

</body>
</html>