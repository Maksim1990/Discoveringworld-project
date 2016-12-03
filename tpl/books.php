<?php 
session_start();

$title="Books";

$culture="active";
include_once '../public/header.php';


?>
  <script type="text/javascript" src="../public/js/calendar111.js"></script>    
        <div class="row bradcrumps">
            <div class="col-xm-6 col-sm-10 col-sm-offset-2">
                <ul class="breadcrumb" >
                   <li><a href="../index.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('HOME')?> /</a></li>
                   <li ><a href="../cms2/culture.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('ART')?></a></li>
                   <li class="active"><?=Dict::_('BOOKS')?></li>
               </ul>
            </div>
        </div>  
             
          
       
<div class="row">
<div class="col-xs-12 col-sm-12 vvv">
<div class="row">
     <div class="hidden-xs col-md-2 col-sm-2 ty " >
        <div id="sidebar">
   <ul class="form" >
       <li><a class="profile" href="../tpl/languages.php?lang=<?=$_SESSION['lang']?>"><i class="icon-user"></i><?=Dict::_('LANGUAGES')?></a></li>
       <li ><a href="../tpl/traditions.php?lang=<?=$_SESSION['lang']?>"><i class="icon-envelope-alt"></i><?=Dict::_('TRADITIONS')?></a></li>
       <li><a class="settings" href="../tpl/cinema.php?lang=<?=$_SESSION['lang']?>"><i class="icon-cog"></i><?=Dict::_('CINEMAMUSIC')?></a></li>
       <li class="selected"><a class="logout" href="../tpl/books.php?lang=<?=$_SESSION['lang']?>"><i class="icon-signout"></i><?=Dict::_('BOOKS')?></a></li>
	</ul>
        </div>
         <div>
            <?php 
             include 'weather.php';
         ?>
         </div>
    </div>
    <div class="col-xm-6 col-sm-8 tg1">
        
         <?php 
       include_once "../public/connection.php";
if (!$connect){
    exit(mysql_error());    
}
else {
 
      mysql_select_db("$db_name",$connect);
      

$query="SELECT * FROM culture_".$_SESSION['lang']." WHERE articleSidebar='books'  ORDER BY `publicationDate` DESC ";  
$result=mysql_query($query)or die("Wrong query");  
if (mysql_num_rows($result)>0){  
while ($row = mysql_fetch_assoc($result)){  
$sqlid=$row["id"]; 
$sqlmark=$row["mark"]; 
                    if($sqlmark=="art"){
$href = '../cms/art.php?action=viewArticle&articleId='.$sqlid.'&lang='.$_SESSION['lang'];
}elseif ($sqlmark=="travel") {
       $href = '../cms1/travel.php?action=viewArticle&articleId='.$sqlid.'&lang='.$_SESSION['lang'];         
            }
 else {$href = '../cms2/culture.php?action=viewArticle&articleId='.$sqlid.'&lang='.$_SESSION['lang'];}
     
if($_SESSION['lang']=='th'){
 $sqldata= htmlspecialchars ($row["title"]); }
else   $sqldata= strtoupper ($row["title"]); 
$sqlname=$row["summary"];
$sqldate=$row["publicationDate"];
$sqlimage=$row["image"];  
$sqlid=$row["id"];
echo "<div class='col-xm-12 col-sm-10 col-sm-offset-1 decor-header1'><p class='col-xm-12 col-sm-12 pubDate1'>$sqldate</p>"
. "<div class='col-xm-12 col-sm-12 summary'><h2><a href='$href'>$sqldata</a></h2>$sqlname "
        . "</div></div><div class='col-xm-12 col-sm-10 col-sm-offset-1 immagea'><a href='$href'> $sqlimage</a>"."<br/></div>"; 

}
}
 else {
echo "<div class='col-xs-12 col-sm-12 notice'><p class='col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1'><i></i>".Dict::_('SORRY')."</p></div>";     
}
} 
  include_once 'culture_boxes.php';
        ?>
    </div>
    <div class="col-xm-6 col-sm-2 ty">
   <?php 
   include_once '../tpl/widgetstyle.php';
   include_once '../tpl/widgets.php'; ?>
       <div class="hidden-xs hidden-xm col-sm-11 col-sm-offset-1  ">  
                  <div id="rsidebar">
                     <?php include_once '../public/listarticle_articles.php'; ?>
                     </div>   
                 </div>  
    </div>
</div>               
<?php
  include "../public/stickynavigation.php";
include_once "../public/footer.php";
?>