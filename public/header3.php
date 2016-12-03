<?php
session_start();

require  "dict.php";

if ($_GET['lang']){
    $_SESSION['lang']= trim(strip_tags($_GET['lang']));
    $date=time()+30*24*60*60;
    setcookie('lang',trim(strip_tags($_GET['lang'])),$date);
  
}
else if($_COOKIE['lang']){
   $_SESSION['lang']= $_COOKIE['lang']; 
  
}
else {
    $_SESSION['lang']='en';
}
$dict=  include 'dict/'.$_SESSION['lang'].'.php';


$_SESSION['url'] = $_SERVER['REQUEST_URI'];


if ( $_SESSION['user_email']){
    
include_once "connection.php";
mysql_select_db($db_name); 
$name=$_SESSION['username'];
$lin1='<img src="';
$lin2='" />';

            $qry="SELECT * FROM register WHERE username='$name'" ;
    $result=mysql_query($qry)or die("Wrong query");  

while ($row = mysql_fetch_assoc($result)){  
 
                                           

		if($row['username']=='Admin'){
                      $der_pic="../tpl/comment/img/profile-img1.jpg";
          
                }  else {
                     $der_pic="data:image;base64,".$row['image']; 
           
                  
                }
}                   

    
    $myLogin= '<li><a href="../tpl/logout.php">
              <span class="glyphicon glyphicon-log-in"></span>'.Dict::_('LOGOUT').'</a></li>';
       $register= '<a href="../tpl/profil.php?lang='.$_SESSION['lang'].'"><p style="padding:14px 0 0 5px;color:#edc951;">'.Dict::_('WELCOME').ucfirst($_SESSION['username']).'!</p></a>';
      }
      else {
   $myLogin= '<li><a href="../tpl/login.php?lang='.$_SESSION['lang'].'">
              <span class="glyphicon glyphicon-log-in"></span>'.Dict::_('LOGIN').'</a></li>';
   $register= '<li class="drp"><a  href="../tpl/demo1.php?lang='.$_SESSION['lang'].'">
                    <span class="glyphicon glyphicon-log-in"></span>'.Dict::_('REGISTER').'</a>
                    </li>'; 
}
?>

<!DOCTYPE html>
<html >
<head>
    <title><?=$title?></title>
    
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" /> 
   <meta name="description" content="<?= $description; ?>" />
   <meta name="keywords" content="<?= $keywords; ?>" />
             <script src="" async></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 

   <link href="../public/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../public/css/font-awesome.min.css" rel="stylesheet">

      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <link href="../public/css/sticky-navigation.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../public/css/default.css" />
           <link rel="stylesheet" type="text/css" href="../public/css/component.css" />
        
           <script src="../app/search/js/modernizr.custom.js" async></script>
        <script src="../public/js/indexx.js" async></script>
      <link href="../public/css/bootstrap.min.css" rel="stylesheet">
      <script src="../public/js/logger.js" async></script>
      <script src="../public/js/jquery.geocomplete.js" async></script>

 
       <link rel="stylesheet" type="text/css" href="../public/css/yamm.css"/>
       <link rel="stylesheet" type="text/css" href="../public/css/style-geo.css"/>
   <!--Search bar-->
   
		<link rel="stylesheet" type="text/css" href="../app/search/css/component.css" />

        
        
        
                <link rel="stylesheet" href="../public/css/sass-compiled.css" />
                
                  
         <link rel="stylesheet"href="/web/style.css" />

<?php if ($_SESSION['lang']=="en"){ ?>
<script type="text/javascript"src="/web/ajax_likes_en.js" async></script>
<?php } elseif ($_SESSION['lang']=="ru") { ?>
     <script type="text/javascript"src="/web/ajax_likes_ru.js" async></script>
<?php }elseif ($_SESSION['lang']=="fr") { ?>
    <script type="text/javascript"src="/web/ajax_likes_fr.js" async></script>
<?php }  else { ?>
    <script type="text/javascript"src="/web/ajax_likes_th.js" async></script>  
 <?php } ?>   


           <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
     <link href="../public/css/bootstrap-social.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../public/css/slidert.css"/>
         <link href="../public/css/picblack.css" rel="stylesheet">  
            <link rel="stylesheet" type="text/css" href="../public/css/slick.css"/>
                 <link href="../public/css/style1.css" rel="stylesheet">
           <link href="../public/css/style.css" rel="stylesheet"> 
           <link href="../public/css/articles.css" rel="stylesheet">
           <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Raleway:400,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>

           <link href="../public/css/fonts.css" rel="stylesheet"> 
          
                <link href="../public/css/style.css" rel="stylesheet"> 
   
</head>
<body >
     <?php echo $message_sent?>
	
 <div id="sticky_navigation_wrapper">
  <div id="sticky_navigation">
  <nav class="navbar yamm navbar-inverse navbar-fixed-top navbar-default"  role="navigation">
		<div class="demo_container">
		<div class="container" id="contain">
        <div class="row">
             <div class="col-xs-12 cont col-sm-5  ">
            <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand" href="../index.php?lang=<?=$_SESSION['lang']?>"><img src="../public/img/logo6.png" height=50 width=50></a>
                </div>
            <div class="container">
            <div id="navbar" class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li class="<?=$home?> drp"><a href="../index.php?lang=<?=$_SESSION['lang']?>"><span class="glyphicon glyphicon-home"
                         aria-hidden="true"></span> <?=Dict::_('HOME')?></a></li>
                    <li class="dropdown yamm-fw <?=$travel?> drp" >
                        <a href="../cms1/travel.php?lang=<?=$_SESSION['lang']?>"  
                         role="button" aria-haspopup="true" aria-expanded="false">
                         <span class="glyphicon glyphicon-plane"
                         aria-hidden="true"></span><?=Dict::_('TRAVEL')?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="drop">
                            <div class="yamm-content">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="row">
                            <div class="col-xs-6 col-sm-8 gop">
                                <li><a href="../tpl/belarus.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('COUNTRY3')?></a></li>
                                <li><a href="../tpl/thailand.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('COUNTRY1')?></a></li>
                                <li><a href="../tpl/asia.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('ASIA')?></a></li>
                            <li><a href="../tpl/west.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('WESTEUROPE')?></li>
                            <li><a href="../tpl/otherworld.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('OTHERWORLD')?></a></li>
                         
                               </div> 
                                
                            <div class="col-xs-6 col-sm-4 yamm-pic">
                             
                               </div> 
                                </div>
                                 </div> 
                                 </div>
                            </div>
                        </ul>
                     </li>
                    <li class="dropdown yamm-fw <?=$culture?> drp">
                        <a href="../cms2/culture.php?lang=<?=$_SESSION['lang']?>" 
                         role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-globe"></span>
                      <?=Dict::_('CULTURE')?> <span class="caret"></span></a>
                         <ul class="dropdown-menu" id="drop">
                            <div class="yamm-content">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="row">
                            <div class="col-xs-6 col-sm-8 gop">
                            <li><a href="../tpl/languages.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('LANGUAGES')?></a></li>
                            <li><a href="../tpl/traditions.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('TRADITIONS')?></a></li>
                            <li><a href="../tpl/cinema.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('CINEMAMUSIC')?></a></li>
                            <li><a href="../tpl/books.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('BOOKS')?></a></li>
                            
                               </div> 
                                
                            <div class="col-xs-6 col-sm-4 yamm-pic1">
                               
                               </div> 
                                </div>
                                 </div> 
                                 </div>
                            </div>
                        </ul>
                     </li>
                     <li class="dropdown yamm-fw <?=$art?> drp">
                         <a href="../cms/art.php?lang=<?=$_SESSION['lang']?>" role="button" aria-haspopup="true">
                        <span class="glyphicon glyphicon-picture"></span> <?=Dict::_('ART')?> <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="drop">
                            <div class="yamm-content">
                            <div class="row">
                            <div class="col-sm-12">
                            <div class="row">
                            <div class="col-xs-6 col-sm-8 gop">
                                <li><a href="../tpl/wdesign.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('WEBDESIGN')?></a></li>
                                <li><a href="../tpl/gdesign.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('GRAPHICDESIGN')?></a></li>
                                <li><a href="../tpl/uptodates.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('UPTODATES')?></a></li>
                                <li><a href="../tpl/gallery.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('GALLERY')?></a></li>
                            
                               </div> 
                                
                            <div class="col-xs-6 col-sm-4 yamm-pic2">
                          
                               </div> 
                                </div>
                                 </div> 
                                 </div>
                            </div>
                        </ul>
                     </li>
                     <li class="<?=$about?> drp" ><a href="../tpl/about.php?lang=<?=$_SESSION['lang']?>"> <span class="glyphicon glyphicon-info-sign"></span><?=Dict::_('ABOUT')?></a></li>
                     <li class="<?=$contact?> drp"><a href="../tpl/contact.php?lang=<?=$_SESSION['lang']?>"><span class="glyphicon glyphicon-envelope"></span><?=Dict::_('CONTACT')?></a></li>
                </ul>
                 <ul class="nav navbar-nav navbar-right drp drp-login">
                 <?=$myLogin?>
                </ul>
                <ul class="nav navbar-nav  drp1 navbar-right">
             <?php  echo $lin1; ?>  <?php  echo $der_pic; ?><?php  echo $lin2; ?>   <?=$register?>
                </ul>
                <div class="nav navbar-nav navbar-right lang ">
                 <form action="#" name="lang" method="post" class="lang" >
                 <select  onchange="location = this.value;">
                     <option value="" class="tol"><?=Dict::_('LANGUAGESS')?></option> 
                     <option class="llang" value="?lang=ru">Русский </option>
                     <option class="llang" value="?lang=en"> English</option>
                 
                    <option class="llang" value="?lang=fr">Français</option>
                    <option class="llang" value="?lang=th" >ภาษาไทย</option>
                       </select>
                          </form>
                </div>
                
                  </div> 
                 </div>
                 </div> 
                 </div> 
                 </div> 
                </div> 
                    </nav>
                     </div> 
                 
                    </div>
    <div id="demo_top">
		<div id="my_logo" class="demo_container  col-xs-12 col-sm-12">
			<div  class="hidden-xs col-sm-6 my_logo_show">
                            <p><?=Dict::_('IMMERSEDEEPLY')?>
                            </p>
			   </div>
				<div class="column col-xs-12 col-sm-6">
					<div id="sb-search" class="sb-search">
                                            <form name="search" action="../tpl/search.php?lang=<?=$_SESSION['lang']?>" method="post">
							<input class="sb-search-input" placeholder="<?=Dict::_('SEARCH')?>" type="text" value="" name="words" id="search">
                                                        <input class="sb-search-submit" type="submit" value="" name="bsearch">
							<span class="sb-icon-search"></span>
						</form>
					</div>
				</div>
		
                         
	</div>
    