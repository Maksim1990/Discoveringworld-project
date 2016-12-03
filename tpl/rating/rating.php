<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
      
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    </head>
 
    <body>
        
   

    <?php
    session_start();
    
    include '../tpl/rating/config.php';
    $user_ip = $_SERVER['REMOTE_ADDR'];
   // $pageID = $_SESSION['picId']; // The ID of the page, the article or the video ...
    $pageID = $_SESSION['picId'];
      $nameT= $_SESSION['username'];
 
    //function to calculate the percent
      function percent($num_amount, $num_total) {
       if($num_total!=0){
        $count1 = $num_amount / $num_total;
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);
        return $count;
       }
        return $count=0;
    }

    // check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
        $dislike_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE  id_item = "'.$pageID.'" and rate = 2 and user="'.$nameT.'"');
        $dislike_count = mysql_result($dislike_sql, 0); 

        $like_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE  id_item = "'.$pageID.'" and rate = 1 and user="'.$nameT.'" ');
        $like_count = mysql_result($like_sql, 0);  

       $result = mysql_query('SELECT COUNT(id) as count FROM rating WHERE rate="1" and id_item = "'.$pageID.'" ' );  
                $row = mysql_fetch_assoc($result);  
                $rating = $row['count'];
?>

<script>
    $(function(){ 
        var pageID = <?php echo $pageID;  ?>; 

        $('.like-btn, .pulse').click(function(){
            
            $('.dislike-btn').removeClass('dislike-h');
            $('.pulse').hide();
            $('.like-btn').addClass('like-h');
            $.ajax({
                type:"POST",
                url:"../tpl/rating/ajax.php",
                data:'act=like&pageID='+pageID,
               success: function(html){
               
                           $('#t2').html(html);  
                    }  
            });
        });
        $('.dislike-btn').click(function(){
            
            $('.like-btn').removeClass('like-h');
            $('.pulse').show();
            $('.dislike-btn').addClass('dislike-h');
            $.ajax({
                type:"POST",
                url:"../tpl/rating/ajax.php",
                data:'act=dislike&pageID='+pageID,
                success: function(html){
                           $('#t2').html(html);  
                    } 
            });
        });
        $('.share-btn').click(function(){
            $('.share-cnt').toggle();
        });
    });
</script>

  <div class="tab-tr" id="t1">
      <?php
  
       $yy = mysql_query('SELECT user FROM  rating WHERE id_item = "'.$pageID.'" and user="'.$nameT.'"');
    
      ?>
            <div class="like-btn <?php if($like_count == 1 ){ echo 'like-h';} ?>">Like</div>
            <div class="dislike-btn <?php if($dislike_count == 1 ){ echo 'dislike-h';} ?>"></div>
            <?php 
         
     
             $hrefUser = '../public/profileTemplate.php?action=userVoted&id='.$pageID.'&lang='.$_SESSION['lang'];
         echo "<p id='t2'><a href='$hrefUser' title='See who like this picture'><i class=' fa fa-heart' aria-hidden='true'></i> $rating</a></p>";
          
            ?>
          
        </div><!-- /tab-tr -->
        

     


</body>
</html>