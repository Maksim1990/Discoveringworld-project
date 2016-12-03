<?php
$num=5;
$page=$_GET['page'];
$result00=  mysql_query("SELECT COUNT(*) FROM articles_en");
$temp=  mysql_fetch_array($result00);
$posts=$temp[0];
$total=(($posts-1)/$mum)+1;
$total=  intval($total);
$page=  intval($page);
if(empty($page) or $page<0) $page=1;
if($page>$total) $page=$total;
$start=$page*$num-$num;

$result= mysql_query("SELECT * FROM article_en ORDER BY id LIMIT $start,$num");


?>