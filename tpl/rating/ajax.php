<?php
session_start();
	include 'config.php';
	
	extract($_POST);
	$user_ip = $_SERVER['REMOTE_ADDR'];
        $userVote= $_SESSION['username'];
   
        $userVoteId=$_SESSION['id'];
	// check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
		$dislike_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE id_item = "'.$pageID.'" and user="'.$userVote.'" and rate = 2 ');
		$dislike_count = mysql_result($dislike_sql, 0); 
$userNeed = mysql_query('SELECT * FROM  rating WHERE  id_item = "'.$pageID.'" and user="'.$userVote.'"');
$user = mysql_fetch_assoc($userNeed);
$user1=$user['user'];

		$like_sql = mysql_query('SELECT COUNT(*) FROM  rating WHERE  id_item = "'.$pageID.'" and user="'.$userVote.'" and rate = 1 ');
		$like_count = mysql_result($like_sql, 0); 

	if($act == 'like'): //if the user click on "like"
            
		if($like_count == 0 && $userVote!=$user['user'] ){
		
            mysql_query('INSERT INTO rating (id_item, ip, rate, user,userVoteId )VALUES("'.$pageID.'", "'.$user_ip.'", "1","'.$userVote.'","'. $userVoteId.'")');
		  
                }
                
		elseif($dislike_count == 1   ){
			mysql_query('UPDATE rating SET rate = 1 WHERE id_item = '.$pageID.' and user="'.$userVote.'" ');
                
                        }else {
                    
                    echo "<script>alert('You have already voted!');</script>";
                }
             

	endif;
	if($act == 'dislike'): //if the user click on "dislike"
		if($dislike_count == 0  && $userVote!=$user['user']){
			mysql_query('INSERT INTO rating (id_item, ip, rate, user,userVoteId )VALUES("'.$pageID.'", "'.$user_ip.'", "2","'.$userVote.'","'. $userVoteId.'")');
		}
		elseif($like_count == 1  ){
			mysql_query('UPDATE rating SET rate = 2 WHERE id_item = '.$pageID.' and user="'.$userVote.'"' );
		}else {
                 
                    echo "<script>alert('You have already voted!');</script>";
                }
            
	endif;
           $result = mysql_query('SELECT COUNT(id) as count FROM rating WHERE rate="1" and id_item = "'.$pageID.'"' );  
                $row = mysql_fetch_assoc($result);  
                $rating = $row['count'];
                if(!mysql_errno()){
             $hrefUser = '../public/profileTemplate.php?action=userVoted&id='.$pageID.'&lang='.$_SESSION['lang'];
         echo "<a href='$hrefUser' title='See who like this picture'><i class=' fa fa-heart' aria-hidden='true'></i> $rating</a>";
                }
?>