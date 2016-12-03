<?php 


$title="Travel";
$travel="active";
include_once '../public/header.php';
?>
<script type="text/javascript" src="../public/js/calendar.js"></script>
              <?php if ($_SESSION['lang']=="en"){ ?>
<script type="text/javascript" src="/web/ajax_likes_en.js" async></script>
<?php } elseif ($_SESSION['lang']=="ru") { ?>
     <script type="text/javascript" src="/web/ajax_likes_ru.js" async></script>
<?php }elseif ($_SESSION['lang']=="fr") { ?>
    <script type="text/javascript" src="/web/ajax_likes_fr.js" async></script>
<?php }  else { ?>
    <script type="text/javascript" src="/web/ajax_likes_th.js" async></script>  
 <?php } ?>            
       <script type="text/javascript" src="/web/jquery.js" async></script>
    
        <div class="row bradcrumps">
            <div class="col-xm-6 col-sm-10 col-sm-offset-2">
                <ul class="breadcrumb" >
                   <li><a href="../index.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('HOME')?> /</a></li>
                   <li class="active"><?=Dict::_('TRAVEL')?></li>
               </ul>
            </div>
        </div>    
             
          
       
<div class="row">
<div class="col-xs-12 col-sm-12 vvv">
<div class="row">
     <div class="hidden-xs col-md-2 col-sm-2 tty " >
        <div id="sidebar">
   <ul class="form" >
       <li><a class="profile" href="../tpl/belarus.php?lang=<?=$_SESSION['lang']?>"><i class="icon-user"></i><?=Dict::_('COUNTRY3')?></a></li>
       <li ><a href="../tpl/thailand.php?lang=<?=$_SESSION['lang']?>"><i class="icon-envelope-alt"></i><?=Dict::_('COUNTRY1')?></a></li>
                <li><a class="settings" href="../tpl/asia.php?lang=<?=$_SESSION['lang']?>"><i class="icon-cog"></i><?=Dict::_('ASIA')?></a></li>
                <li><a class="logout" href="../tpl/west.php?lang=<?=$_SESSION['lang']?>"><i class="icon-signout"></i><?=Dict::_('WESTEUROPE')?></a></li>
                <li><a class="logout" href="../tpl/otherworld.php?lang=<?=$_SESSION['lang']?>"><i class="icon-signout"></i><?=Dict::_('OTHERWORLD')?></a></li>
	</ul>
        </div>
         <div>
               <?php 
             include '../tpl/weather.php';
         ?>
         </div>
          <div class="linksheader">
           <?= strtoupper(Dict::_('TRAVEL_LINKS'))?>
            </div>
        <div class="links">
            <ul>
                
               <?php 
               foreach ($link_travel as $key=>$value){
                   $key=  strtoupper($key);
                   echo "<li><a href='{$value}'>{$key}</a></li> ";
               }
               
               ?>             
            </ul>
        </div>
    </div>
    <div class="col-xm-6 col-sm-8 tg">
        
         <?php 
          include_once '../tpl/runline.php';
        include '../cms1/index.php';
         include_once '../tpl/travel_boxes.php';
        ?>
   
    </div>
    <div class="col-xm-6 col-sm-2 tty">
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