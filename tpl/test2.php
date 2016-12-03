<?php  
    include_once '../public/connection.php';

if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect); 
// Переменная хранит число сообщений выводимых на станице  
$num = 6;  
// Извлекаем из URL текущую страницу  
$page = $_GET['page'];  
// Определяем общее число сообщений в базе данных  
$result = mysql_query("SELECT COUNT(*) FROM gallery");  
$posts = mysql_result($result, 0);  
// Находим общее число страниц  
$total = intval(($posts - 1) / $num) + 1;  
// Определяем начало сообщений для текущей страницы  
$page = intval($page);  
// Если значение $page меньше единицы или отрицательно  
// переходим на первую страницу  
// А если слишком большое, то переходим на последнюю  
if(empty($page) or $page < 0) $page = 1;  
  if($page > $total) $page = $total;  
// Вычисляем начиная к какого номера  
// следует выводить сообщения  
$start = $page * $num - $num;  
// Выбираем $num сообщений начиная с номера $start  
$result = mysql_query("SELECT * FROM gallery ORDER BY id DESC LIMIT $start, $num " );  
// В цикле переносим результаты запроса в массив $postrow  
while ( $postrow[] = mysql_fetch_array($result))  

echo "<table>";  
for($i = 0; $i < $num; $i++)  
{  
 
   echo '<div class=" hhh">'
    . '<div class="col-xs-12 col-sm-6 image-view view second-effect">'
    . '<div class="descript" style="min-height:38px;background-color:#77877E;">'
           . '<p>'.$postrow[$i]['description'].'</p>'
           . '</div>'
           . '<img  src="data:image;base64,'.$postrow[$i]['image'].'">'
           . ' <div class="mask"></div>
         <div class="content">
         	<a href="#" class="info" title="Full Image">Full Image</a>
         </div>'
           . '</div>'
           . '</div>';  
}  
echo "</table>";  
 
// Проверяем нужны ли стрелки назад 
    echo '<div class="col-xs-12 col-sm-4 "><h1>';
if ($page != 1) $pervpage = '<a href= gallery.php?page=1>Back</a>  
                               <a href= gallery.php?page?page='. ($page - 1) .'><</a> ';  
// Проверяем нужны ли стрелки вперед  
if ($page != $total) $nextpage = ' <a href= gallery.php?page='. ($page + 1) .'>></a>  
                                   <a href= gallery.php?page=' .$total. '>Next</a>';  

// Находим две ближайшие станицы с обоих краев, если они есть  
if($page - 2 > 0) $page2left = ' <a href= gallery.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';  
if($page - 1 > 0) $page1left = '<a href= gallery.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';  
if($page + 2 <= $total) $page2right = ' | <a href= gallery.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';  
if($page + 1 <= $total) $page1right = ' | <a href= gallery.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; 
echo '</h1></div>';
// Вывод меню  
echo $pervpage.$page2left.$page1left.'<div class="col-xs-12 col-sm-12 gallery-next"><p class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4"><b>'.$page.'</b></p></div>'.$page1right.$page2right.$nextpage;  
}
?>