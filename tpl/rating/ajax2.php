<?php
session_start();
	include 'config.php';
	
	extract($_POST);
	$user_ip = $_SERVER['REMOTE_ADDR'];
        $userVote= $_SESSION['username'];
   $id=$_POST['pageID'];

        $userVoteId=$_SESSION['id'];
	// check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
		$dislike_sql = mysql_query('SELECT COUNT(*) FROM  rating_pics WHERE id_item = "'.$id.'" and user="'.$userVote.'" and rate = 2 ');
		$dislike_count = mysql_result($dislike_sql, 0); 
$userNeed = mysql_query('SELECT * FROM  rating_pics WHERE  id_item = "'.$id.'" and user="'.$userVote.'"');
$user = mysql_fetch_assoc($userNeed);
$user1=$user['user'];

		$like_sql = mysql_query('SELECT COUNT(*) FROM  rating_pics WHERE  id_item = "'.$id.'" and user="'.$userVote.'" and rate = 1 ');
		$like_count = mysql_result($like_sql, 0); 

	if($act == 'like'): //if the user click on "like"
        
		if($like_count == 0 && $userVote!=$user['user'] ){
	
         $qr= mysql_query('INSERT INTO rating_pics (id_item, ip, rate, user,userVoteId )VALUES("'.$id.'", "'.$user_ip.'", "1","'.$userVote.'","'. $userVoteId.'")');

                }
                
		elseif($dislike_count == 1   ){
			mysql_query('UPDATE rating_pics SET rate = 1 WHERE id_item = '.$id.' and user="'.$userVote.'" ');
               
                        }else {
                 
                    echo "<script>alert('You have already voted!');</script>";
                }
             

	endif;
	if($act == 'dislike'): //if the user click on "dislike"
		if($dislike_count == 0  && $userVote!=$user['user']){
              
			mysql_query('INSERT INTO rating_pics (id_item, ip, rate, user,userVoteId )VALUES("'.$id.'", "'.$user_ip.'", "2","'.$userVote.'","'. $userVoteId.'")');
		}
		elseif($like_count == 1  ){
                
			mysql_query('UPDATE rating_pics SET rate = 2 WHERE id_item = '.$id.' and user="'.$userVote.'"' );
		}else {
               
                    echo "<script>alert('You have already voted!');</script>";
                }
            
	endif;
           $result1 = mysql_query('SELECT COUNT(id) as count FROM rating_pics WHERE rate="1" and id_item = "'.$id.'"' );  
                $row = mysql_fetch_assoc($result1);  
                $rating = $row['count'];
                
             $hrefUser = '../public/profileTemplate.php?action=userVoted&id='.$id.'&lang='.$_SESSION['lang'];
         echo "<p class='t$id'><a href='$hrefUser' title='See who like this picture'><i class=' fa fa-heart' aria-hidden='true'></i> $rating</a></p>";
                
?>