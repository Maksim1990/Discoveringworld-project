
   

    <?php
    session_start();
      $nameT= $_SESSION['username'];
 
     $dislike_sql = mysql_query('SELECT COUNT(*) FROM  rating_pics WHERE  id_item = "'.$id.'" and rate = 2 and user="'.$nameT.'"');
        $dislike_count = mysql_result($dislike_sql, 0); 

        $like_sql = mysql_query('SELECT COUNT(*) FROM  rating_pics WHERE  id_item = "'.$id.'" and rate = 1 and user="'.$nameT.'" ');
        $like_count = mysql_result($like_sql, 0);  

 
?>

<script>
    $(function(){ 
        var id = <?php echo $id;  ?>; 

        $('#like'+id).click(function(){
            $('#dislike'+id).removeClass('dislike-h');
            $('.pulse').hide();
            $('#like'+id).addClass('like-h');
            $.ajax({
                type:"POST",
                url:"../tpl/rating/ajax2.php",
                data:'act=like&pageID='+id,
               success: function(html){
               
                           $('.t'+id).html(html);  
                    }  
            });
        });
        $('#dislike'+id).click(function(){
            
            $('#like'+id).removeClass('like-h');
            $('.pulse').show();
            $('#dislike'+id).addClass('dislike-h');
            $.ajax({
                type:"POST",
                url:"../tpl/rating/ajax2.php",
                data:'act=dislike&pageID='+id,
                success: function(html){
                           $('.t'+id).html(html);  
                    } 
            });
        });
      
    });
</script>

  <div class="tab-tr" id="t1">
  
            <div class="like-btn  <?php if($like_count == 1 ){ echo 'like-h';} ?>" id="like<?=$id?>">Like</div>
            <div class="dislike-btn <?php if($dislike_count == 1 ){ echo 'dislike-h';} ?>" id="dislike<?=$id?>"></div>
            <?php 
         
     $result1 = mysql_query('SELECT COUNT(id) as count FROM rating_pics WHERE rate="1" and id_item = "'.$id.'" ' );  
              $row = mysql_fetch_assoc($result1);  
                $rating = $row['count']; 
             $hrefUser = '../public/profileTemplate.php?action=userVoted&id='.$id.'&lang='.$_SESSION['lang'];
         echo "<p class='t$id tpic'><a href='$hrefUser' title='See who like this picture'><i class=' fa fa-heart' aria-hidden='true'></i> $rating</a></p>";
   
            ?>
          
        </div><!-- /tab-tr -->
        

