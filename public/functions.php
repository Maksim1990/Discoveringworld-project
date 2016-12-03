<?php

$link_languages=[
    'Thai-language.com'=>'http://www.thai-language.com/',
    'Letstalkthai.com'=>'http://letstalkthai.com/ ',
   
];

$link_books=[
    'Haruki Murakami'=>'http://www.harukimurakami.com/',
    'minsk.by'=>'Travel.com',
    
];

$link_design=[
    'Web Design Depot'=>'http://www.webdesignerdepot.com/',
    'Awwwards.com'=>'http://www.awwwards.com/',
    'The Best Designs'=>'https://www.thebestdesigns.com/',
    'Java Script'=>'https://learn.javascript.ru/',
    'w3schools.com'=>'http://www.w3schools.com/',
    'coursera.com'=>'https://www.coursera.org/',
    
];
$link_travel=[
    'france-voyage.com'=>'http://www.france-voyage.com/',
    'national geographic'=>'http://www.nationalgeographic.com/',
    'travel+ adventures'=>'http://tplusa.ru/',
];



function viki ($a,$b,$c,$d){
echo " <div align='center'>
    <div class='img_block'>
          <a href='$a' target='blank'>  <img src='$b' alt='$c' >
            <div class='over_block'></div>
            <span>$d</span>
        </a>
    </div>
</div>";
}


function isAdmin()
{
    return isset($_SESSION['admin']);
}

function getFlash($key)
{
    $tmp = '';
    
    if(hasFlash($key)){
        $tmp = $_SESSION['flash'][$key];
        
        unset($_SESSION['flash'][$key]);
    }
    
    return $tmp;
}

function setFlash($key, $value)
{
    $_SESSION['flash'][$key] = $value;
}

function hasFlash($key)
{
    return isset($_SESSION['flash'][$key]);
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}


                          
                          function russian_date(){
$date=explode(".", date("d.m.Y "));
switch ($date[1]){
case 1: $m='Января'; break;
case 2: $m='Февраля'; break;
case 3: $m='Марта'; break;
case 4: $m='Апреля'; break;
case 5: $m='Мая'; break;
case 6: $m='Июня'; break;
case 7: $m='Июля'; break;
case 8: $m='Августа'; break;
case 9: $m='Сентября'; break;
case 10: $m='Октября'; break;
case 11: $m='Ноября'; break;
case 12: $m='Декабря'; break;
}
echo "<p >".$date[0].' '.$m.' '.$date[2]."</p>";
}
                          function english_date(){
$date=explode(".", date("d.m.Y "));
switch ($date[1]){
case 1: $m='January'; break;
case 2: $m='February'; break;
case 3: $m='March'; break;
case 4: $m='April'; break;
case 5: $m='May'; break;
case 6: $m='June'; break;
case 7: $m='July'; break;
case 8: $m='August'; break;
case 9: $m='September'; break;
case 10: $m='October'; break;
case 11: $m='November'; break;
case 12: $m='December'; break;
}
echo "<p >".$date[0].' '.$m.' '.$date[2]."</p>";
}
                          function french_date(){
$date=explode(".", date("d.m.Y "));
switch ($date[1]){
case 1: $m='Janvier'; break;
case 2: $m='Février'; break;
case 3: $m='Mars'; break;
case 4: $m='Avril'; break;
case 5: $m='Mai'; break;
case 6: $m='Juin'; break;
case 7: $m='Juillet'; break;
case 8: $m='Août'; break;
case 9: $m='Septembre'; break;
case 10: $m='Octobre'; break;
case 11: $m='Novembre'; break;
case 12: $m='Decembre'; break;
}
echo "<p >".$date[0].' '.$m.' '.$date[2]."</p>";
}
                          function belarus_date(){
$date=explode(".", date("d.m.Y "));
switch ($date[1]){
case 1: $m='Студня'; break;
case 2: $m='Лютага'; break;
case 3: $m='Сакавика'; break;
case 4: $m='Красавiка'; break;
case 5: $m='Мая'; break;
case 6: $m='Чэрвеня'; break;
case 7: $m='Лiпеня'; break;
case 8: $m='Жніўня'; break;
case 9: $m='Верасня'; break;
case 10: $m='Кастрычнiка'; break;
case 11: $m='Лiстапада'; break;
case 12: $m='Снежня'; break;
}
echo "<p >".$date[0].' '.$m.' '.$date[2]."</p>";
}
?>
