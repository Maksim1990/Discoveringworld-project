<?php 


$title="About";
$style='../public/css/art.css';
$about="active";

include_once '../public/header.php';
include_once "../public/show_articles.php"; 
?>
<script type="text/javascript" src="../public/js/calendar.js"></script>
<link rel="stylesheet" type="text/css" href="../public/css/modalWindow.css"/>     
<body style="background-color: #6BCF5B;">

  <div class="container">
       
           <div class="row bradcrumps">
            <div class="col-xm-12 col-sm-10 col-sm-offset-2 brad">
                <ul class="breadcrumb" >
                    <li><a href="../index.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('HOME')?> /</a></li>
                   <li class="active"><?=Dict::_('ABOUT')?></li>
               </ul>
            </div>
        </div>  
      <div class="col-xm-12 col-sm-12 ab1">
          <div class="col-xm-6 col-sm-6 ab-article">
              <p><?=Dict::_('ABOUT1')?><b><?=Dict::_('DISCOVERING_WORLD')?></b> <?=Dict::_('ABOUT1_1')?>   
              </p>
          </div>
         <div class="col-xm-6 col-sm-5 col-sm-offset-1 ab-image">
           <img src="../public/img/logo-green-distorted1.png">
          </div> 
      </div>
      <div class="col-xm-12 col-sm-12 ab2">
          <div class="col-xm-7 col-sm-5 col-sm-offset-1 ooo">
              <img class="rotate1" src="../public/img/ttt.jpeg">
          </div>
          <div class="col-xm-12 col-sm-5 ab-article">
              <p>
    <?=Dict::_('ABOUT2')?>
              </p>
          </div>
      </div>
      
      <div class="col-xm-12 col-sm-12 ab3">
          <div class="col-xm-12 col-sm-6 ab-article2">
              
              <p>
    <?=Dict::_('ABOUT3')?>
              </p>
          </div>
            <div class="col-xm-12 col-xm-offset-3 col-sm-5 col-sm-offset-1 ooo">
           <img class="rotate1" src="../public/img/photo5.jpeg">
          </div>
          
      </div>
      
    
      <div class="col-xm-12 col-sm-12 ab2">
          <div class="col-xm-12 col-xm-offset-3 col-sm-5 col-sm-offset-1 ooo">
           <img class="rotate1" src="../public/img/photo6.jpg">
          </div>
          <div class="col-xm-12 col-sm-5 ab-article">
              <p>
            <?=Dict::_('ABOUT4')?> 
              </p>
          </div>
      </div>
      
      <div class="col-xs-12 col-sm-12 ab4">
             <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 ab5">
       <div id="mycarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php   if (!empty($results[0])){ ?>
                    <div class="item active">
                     
                     <?php 
                  
                    $link=$results[0]["id"];
                    if($results[0]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[0]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
                    echo "<a href='$hrefa'>".$results[0]["image"]."</a>";
                    ?>
                        <div class="carousel-caption caption11">
                     
                        <p> </p>
                        </div>
                    </div> 
                    <?php }; ?>
                        <?php   if (!empty($results[1])){ ?>
                    <div class="item">
                     <?php 
                    $link=$results[1]["id"];
                    if($results[1]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[1]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
                      echo "<a href='$hrefa'>".$results[1]["image"]."</a>";
                    ?>
                        <div class="carousel-caption caption11">
                            
                       <p> </p>
                       
                        </div>
                    </div>
                     <?php }; ?>
                        <?php   if (!empty($results[2])){ ?>
                    <div class="item">
                     <?php 
                    $link=$results[2]["id"];
                    if($results[2]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[2]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
                      echo "<a href='$hrefa'>".$results[2]["image"]."</a>";
                    ?>
                        <div class="carousel-caption caption11">
                     
                            
                        <p> </p>
                        
                        </div>
                    </div>
                       <?php }; ?>
                        <?php   if (!empty($results[3])){ ?>
                    <div class="item">
                     <?php 
                    $link=$results[3]["id"];
                    if($results[3]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[3]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
                      echo "<a href='$hrefa'>".$results[3]["image"]."</a>";
                    ?>
                        <div class="carousel-caption caption11">
                            
                       <p> </p>
                       
                        </div>
                    </div>
                     <?php }; ?>
                        <?php   if (!empty($results[4])){ ?>
                    <div class="item">
                     <?php 
                    $link=$results[4]["id"];
                    if($results[4]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[4]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
                      echo "<a href='$hrefa'>".$results[4]["image"]."</a>";
                    ?>
                        <div class="carousel-caption caption11">
                            
                       <p> </p>
                       
                        </div>
                    </div>
                     <?php }; ?>
                        <?php   if (!empty($results[5])){ ?>
                    <div class="item">
                     <?php 
                    $link=$results[5]["id"];
                    if($results[5]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[5]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
                      echo "<a href='$hrefa'>".$results[5]["image"]."</a>";
                    ?>
                        <div class="carousel-caption caption11">
                            
                       <p> </p>
                       
                        </div>
                    </div>
                    <?php }; ?>
                </div>
                <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
      </div>
        </div>
        </div>
    <div id="overlay">
            <div class="popup">
                <h2>Explore the world with Discovering World project</h2>
                <p>
        Share your opinions and experience, discuss stories in comments under each story.             
                 </p>
                 <div class="pl-left">
                     <img src="../public/img/logo6.png">
                 </div>
                 <p>
                     Discover new traveling stories, new cultures, new traditions and languages from all around the world in <a href="../cms1/travel.php?lang=<?=$_SESSION['lang']?>"> Travel</a>
                     and <a href="../cms2/culture.php?lang=<?=$_SESSION['lang']?>">Culture & Languages</a> sections.       
                 </p>
                 <div class="pl-right">
                     <img src="../public/img/d.jpg">
                 </div>              
                 <p>
                All IT and web design articles and new website templates with responsive design and modern web technologies in
                <a href="../cms/art.php?lang=<?=$_SESSION['lang']?>">Art</a>section.
                 </p>
               <p>
                Share you opinions,find new friends, send messages and discuss mutual interests in 
                <a href="../public/profileTemplate.php?action=userMessage&lang=<?=$_SESSION['lang']?>">Our Discoverers </a> section. 
               </p>
                <button class="close" title="Закрыть" onclick="document.getElementById('overlay').style.display='none';"></button>
            </div>
        </div>
        <script src="http://yastatic.net/jquery/2.1.4/jquery.min.js"></script>
        <script src="http://yastatic.net/jquery/cookie/1.0/jquery.cookie.min.js"></script>
        <script type="text/javascript">
        $(function() {
            // Проверяем запись в куках о посещении
            // Если запись есть - ничего не делаем
            if (!$.cookie('hideModal')) {
           // если cookie не установлено появится окно
           // с задержкой 5 секунд
            var delay_popup = 5000;
            setTimeout("document.getElementById('overlay').style.display='block'", delay_popup);
            }
            // Запоминаем в куках, что посетитель уже заходил
            $.cookie('hideModal', true, {
            // Время хранения cookie в днях
                expires: 7,
                path: '/'
            });
        });
        </script>   
</body>

<?php
include_once "../public/footer.php";
?>