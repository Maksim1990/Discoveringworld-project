<?php
$count=1000;
$str=" В корзине {$count} товар".ending($count);

function ending($count){
    switch ($count){
        case 1:
            return " ";
        case 2:
        case 3:
        case 4:
      return "а";
            }
if($count%100==13||$count%100==00){
    return "ов";
}elseif ($count%10>=5&&$count%10<=9) {
    return "ов";
    }
}
?>
<html>
    <head>
     <link href="../public/css/bootstrap.min.css" rel="stylesheet">    
    </head>
    <body>
        <div class="col-sm-8 col-sm-offset-2">
        <h2>Hello!</h2>
        <?php
        echo $str;
        ?>
        </div>        
    </body>
    
    
    
</html>