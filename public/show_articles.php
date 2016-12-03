<?php

session_start(); 

include_once "connection.php";
if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
      

$query="(SELECT * FROM articles_".$_SESSION['lang']." )
    UNION
        (SELECT * FROM culture_".$_SESSION['lang']." )
    UNION
        (SELECT * FROM travel_".$_SESSION['lang']." ) ORDER BY `publicationDate` DESC limit 0,10";  
$result=mysql_query($query)or die("Wrong query");  
if (mysql_num_rows($result)>0){ 
    $i = 0;
while ($row = mysql_fetch_assoc($result)){  
    $results[$i] = $row;
			$i++; 

if (count($results) == 0) echo "Nothing has found";
			else
				for ($i = 0; $i < count($results); $i++){
                                        
                             
                                    
                                }
       if($results[$i]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$results[$i]["id"].'&lang='.$_SESSION['lang'];
}elseif ($results[$i]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$results[$i]["id"].'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$results[$i]["id"].'&lang='.$_SESSION['lang'];}                 
}


}


$query1="SELECT * FROM articles_".$_SESSION['lang']." 
   ORDER BY `publicationDate` DESC limit 0,10";  
$result1=mysql_query($query1)or die("Wrong query");  
if (mysql_num_rows($result1)>0){ 
    $i = 0;
while ($row = mysql_fetch_assoc($result1)){  
    $results1[$i] = $row;
			$i++;
                                           }
if (count($results1) == 0) echo "Nothing has found";
			else
				for ($i = 0; $i < count($results1); $i++){
                                        
                               $article_mark=$results1[$i]["mark"];
                                }
                                 
                            }

$query2="SELECT * FROM travel_".$_SESSION['lang']." 
   ORDER BY `publicationDate` DESC limit 0,10";  
$result2=mysql_query($query2)or die("Wrong query");  
if (mysql_num_rows($result2)>0){ 
    $i = 0;
while ($row = mysql_fetch_assoc($result2)){  
    $results2[$i] = $row;
			$i++;
                                           }
if (count($results2) == 0) echo "Nothing has found";
			else
				for ($i = 0; $i < count($results2); $i++){
                                        
                               $article_mark=$results2[$i]["mark"];
                                }
                                 
                            }
                            
$query3="SELECT * FROM culture_".$_SESSION['lang']." 
   ORDER BY `publicationDate` DESC limit 0,10";  
$result3=mysql_query($query3)or die("Wrong query");  
if (mysql_num_rows($result3)>0){ 
    $i = 0;
while ($row = mysql_fetch_assoc($result3)){  
    $results3[$i] = $row;
			$i++;
                                           }
if (count($results3) == 0) echo "Nothing has found";
			else
				for ($i = 0; $i < count($results3); $i++){
                                        
                               $article_mark=$results3[$i]["mark"];
                                }
                                 
                            }

                                } 

?>