<?php
session_start();
if(!$t){
$en="?lang=en";
$ru="?lang=ru";
$th="?lang=th";
$fr="?lang=fr";
}
require  "dict.php";
include 'functions.php';
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
                      $der_pic="data:image;base64,".$row['image']; 
          
                }  else {
                     $der_pic="data:image;base64,".$row['image']; 
           
                  
                }
}                   
$result = mysql_query('SELECT * FROM register WHERE username="'.$_SESSION['username'].'"' );  
$row = mysql_fetch_assoc($result) ;
$link=$row["id"];
$countFriendsRequests = mysql_query('SELECT * FROM friend_list WHERE friendName="'.$_SESSION['username'].'" and requestSent="1" and requestAccepted="0"');
 $messNumbF= intval(mysql_num_rows($countFriendsRequests ));
 $count = mysql_query('SELECT * FROM pm WHERE recepient="'.$_SESSION['username'].'" and user2read="no"'); 
 
        $messNumb = mysql_fetch_array($count);
       $messNumb2= intval(mysql_num_rows($count));
       if ($messNumb2>=0){$numb="(".$messNumb2.")";}
       
$hrefa = '../public/profileTemplate.php?action=profilePage&articleId='.$link.'&lang='.$_SESSION['lang'];
$hrefa2 = '../public/profileTemplate.php?action=listMessage&articleId='.$link.'&lang='.$_SESSION['lang'];
    $myLogin= '<li><a href="../tpl/logout.php">
              <span class="glyphicon glyphicon-log-in"></span>'.Dict::_('LOGOUT').'</a></li>';
    
    
 $register= '        <section class="main">
				<div class="wrapper-demo">
					<div id="dd" class="wrapper-dropdown-3" tabindex="1">
						<span><a  href="#">'.Dict::_('WELCOME').$_SESSION['username'].'!</a></span>
						<ul class="dropdown" >
							<a id="link1" ><li><i class="icon-envelope icon-large"></i>Profile Page</li> </a>
						<a id="link2" >	<li><i class="icon-truck icon-large"></i>Messages '.$numb.'</li></a>
							<a id="link3"><li><i class="icon-plane icon-large"></i>Progile Settings</li></a>
						</ul>
					</div>
				​</div>
			</section>';
        
        
        
        
        
        
                }
      else {
   $myLogin= '<li><a href="../tpl/login.php?lang='.$_SESSION['lang'].'">
              <span class="glyphicon glyphicon-log-in"></span>'.Dict::_('LOGIN').'</a></li>';
   $register= '<li class="drp3"><a  href="../tpl/register.php?lang='.$_SESSION['lang'].'">
                    <span class="glyphicon glyphicon-log-in"></span>'.Dict::_('REGISTER').'</a>
                    </li>'; 
}
if ( $_SESSION['username']){
$user=$_SESSION['username'];    
$online = mysql_query("UPDATE register SET online=now() WHERE username='$user'");     
}
?>

<!DOCTYPE html>
<html >
<head>
    <title><?=$title?></title>
   
<meta http-equiv="content-type" content="text/html; charset=utf-8"></meta>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" /> 
    
  	<link rel="stylesheet" type="text/css" href="../public/css/semantic.ui.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
   
   <link href="../public/css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../public/css/font-awesome.min.css" rel="stylesheet">  
           <script src="../public/js/bootstrap.min.js" async></script>
                   <link href="../public/css/buttons.css" rel="stylesheet">
             
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" async></script>
    
        <link href="../public/css/sticky-navigation.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../public/css/default.css" />
           <link rel="stylesheet" type="text/css" href="../public/css/component.css" />
         <link rel="stylesheet"href="/web/style.css" />
   <script type="text/javascript" src="../public/js/slick.js"></script>
   <script type="text/javascript" src="../public/js/crawler.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> 



	<link rel="stylesheet" type="text/css" href="../public/css/prism.css" />
	<link rel="stylesheet" type="text/css" href="../public/css/calendar-style.css" />
	<link rel="stylesheet" type="text/css" href="../public/css/style55.css" />
	<link rel="stylesheet" type="text/css" href="../public/css/pignose.calendar.css" />   

	
	<script type="text/javascript" src="../public/js/moment.min.js"></script>
	<script type="text/javascript" src="../public/js/pignose.calendar.js"></script>
    
    
 
    
<link rel="stylesheet" href="../public/css/style4.css" type="text/css" media="screen"/>
 
<!--Image Effects -->
<link rel="stylesheet" href="../public/css/normalize23.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../public/css/demo23.css" type="text/css" media="screen"/>
<link rel="stylesheet" href="../public/css/set1.css" type="text/css" media="screen"/>

<link rel="stylesheet" type="text/css" href="../public/css/style5.css" />
<link rel="stylesheet" type="text/css" href="../public/css/style6.css" />
<link rel="stylesheet" type="text/css" href="../public/css/stimenu.css" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Wire+One&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css' />
    
  
      <link href="../public/css/bootstrap.min.css" rel="stylesheet">
       <link rel="stylesheet" type="text/css" href="../public/css/yamm.css"/>
   
		<link rel="stylesheet" type="text/css" href="../app/search/css/component.css" />
                <link rel="stylesheet" href="../public/css/sass-compiled.css" />
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
     <link href="../public/css/bootstrap-social.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../public/css/slidert.css"/>
         <link href="../public/css/picblack.css" rel="stylesheet">  
            <link rel="stylesheet" type="text/css" href="../public/css/slick.css"/>
              <link type="text/css" rel="stylesheet" href="../tpl/rating/css/style.css">
            
           <script src="../public/js/indexx.js" async></script>
            

                 <link href="../public/css/style1.css" rel="stylesheet">
           <link href="../public/css/style.css" rel="stylesheet"> 
           <link href="../public/css/articles.css" rel="stylesheet">
             

           <link href="../public/css/fonts.css" rel="stylesheet">
                <link href="../public/css/style.css" rel="stylesheet"> 
     
 
   <script>
$(function() {
	var sticky_navigation_offset_top = $('#sticky_navigation').offset().top;
	var sticky_navigation = function(){
		var scroll_top = $(window).scrollTop();

		if (scroll_top > sticky_navigation_offset_top) { 
			$('#sticky_navigation').css({ 'position': 'absolute', 'top':0 });
		} else {
			$('#sticky_navigation').css({ 'position': 'relative' }); 
		}   
	};
	sticky_navigation();
	$(window).scroll(function() {
		 sticky_navigation();
	});
});
</script>
<script>
    function printTime(){
        var d = new Date();
        var hours=d.getHours();
        hours = ("0" + hours).slice(-2);
        var mins= d.getMinutes();
        mins = ("0" + mins).slice(-2);
        var secs=d.getSeconds();
        secs = ("0" + secs).slice(-2);
        var time=document.getElementById("time");
        time.style.color = "gray";
        time.style.fontSize = "25px";
        time.style.marginTop = "4px";
        time.style.fontFamily = "Track";
        time.innerHTML=hours+":"+mins+":"+secs;
       
    }
    setInterval(printTime, 1000);
    </script>  
</head>
 <body style=" background:url(../public/img/a.jpg) center top no-repeat;
		background-attachment:fixed;background-size: cover;">
        
<?php include "flash.php";?>	
     <div id="demo_top">
		<div class="demo_container hidden-xs hidden-md hidden-sm ">
			<div id="my_logo">
<a  data-toggle="modal" data-target=".bs-example-modal-sm-clock"> <div class="col-lg-1 col-lg-offset-1 " id="time">
                  
    </div></a>
    <div class="modal fade bs-example-modal-sm-clock" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
				<div class="modal-content my-img">
                                                           
                                    <div class="col-sm-12 time_back">
                                           <div class="col-sm-8 col-sm-offset-4 ">
                                        <div class="col-sm-10 col-sm-offset-1 "><h2>World Time Zones</h2></div>                                 
                                    </div> 
                                        
                                        <div class="col-sm-10 col-sm-offset-1">
                                            <hr>
                                        <div class="col-sm-2 ">
                                          <iframe src="http://free.timeanddate.com/clock/i5fmsmja/n285/szw160/szh160/hoc000/hbw0/hfc090/cf100/hnc360/hwc111/facfff/fnu2/fdi76/mqcfff/mqs4/mql18/mqw4/mqd60/mhcfff/mhs4/mhl5/mhw4/mhd62/mmv0/hhcfff/hhs1/hhb10/hmcfff/hms1/hmb10/hscfff/hsw3" frameborder="0" width="160" height="160"></iframe>
 <h5>Minsk</h5>
                                        </div> 
                                        <div class="col-sm-2 col-sm-offset-1">
                                          <iframe src="http://free.timeanddate.com/clock/i5fmsmja/n136/szw160/szh160/hoc000/hbw0/hfc090/cf100/hnc360/hwc111/facfff/fnu2/fdi76/mqcfff/mqs4/mql18/mqw4/mqd60/mhcfff/mhs4/mhl5/mhw4/mhd62/mmv0/hhcfff/hhs1/hhb10/hmcfff/hms1/hmb10/hscfff/hsw3" frameborder="0" width="160" height="160"></iframe>
                                            <h5>London</h5>
                                        </div> 
                                        <div class="col-sm-2 col-sm-offset-1">
                                          <iframe src="http://free.timeanddate.com/clock/i5fmsmja/n776/szw160/szh160/hoc000/hbw0/hfc090/cf100/hnc360/hwc111/facfff/fnu2/fdi76/mqcfff/mqs4/mql18/mqw4/mqd60/mhcfff/mhs4/mhl5/mhw4/mhd62/mmv0/hhcfff/hhs1/hhb10/hmcfff/hms1/hmb10/hscfff/hsw3" frameborder="0" width="160" height="160"></iframe>
 <h5>Dubai</h5>
                                        </div> 
                                           <div class="col-sm-2 col-sm-offset-1">
                                          <iframe src="http://free.timeanddate.com/clock/i5fmsmja/n250/szw160/szh160/hoc000/hbw0/hfc090/cf100/hnc360/hwc111/facfff/fnu2/fdi76/mqcfff/mqs4/mql18/mqw4/mqd60/mhcfff/mhs4/mhl5/mhw4/mhd62/mmv0/hhcfff/hhs1/hhb10/hmcfff/hms1/hmb10/hscfff/hsw3" frameborder="0" width="160" height="160"></iframe>
<h5>Toronto</h5>
                                        </div> 
                                    </div>
                                        </div>
				</div>
			</div>
		</div>                        
                             <div class="col-lg-2  navDate">
                          <?php 
        if($_SESSION['lang']=="en"){
          english_date();}
elseif ($_SESSION['lang']=="fr") {
    french_date();
}elseif ($_SESSION['lang']=="th") {
belarus_date();
}  else
    russian_date();
 ?>
	    </div>
             
                            <div class="col-lg-5 ">
                    <div id="wrapper">
		
		<div id="input" class="article">
	
            <input type="text" class="input-calendar" />
			<div class="box"></div>
		</div>
		

			<div role="tabpanel" class="ui tab segment" data-tab="javascript">
					<pre><code class="language-js">$(function() {
    $('.calendar').pignoseCalendar({
		lang: 'en'
	});
});</code></pre>
			</div>
		</div>                                  
                                                    
 
                            </div>             
                            <div class="col-lg-2 col-lg-offset-1 ">
       <a href="<?=$en;?>" class="button pop" data-toggle="tooltip" data-placement="left" title="English"><img src="../public/img/gb.gif" width="35px" height="13px"></a>
       <a  href="<?=$ru;?>" class="button pop" data-toggle="tooltip" data-placement="left" title="Russian"><img src="../public/img/russiaflag.jpg" width="35px" height="13px"></a>
       <a  href="<?=$fr;?>" class="button pop" data-toggle="tooltip" data-placement="left" title="French"><img src="../public/img/flag-french.png" width="35px" height="13px"></a>
       <a  href="<?=$th;?>" class="button pop" data-toggle="tooltip" data-placement="left" title="Беларуская"><img src="../public/img/blr.png" width="35px" height="13px"></a>
       </div>
                        </div>
                        </div>
		</div>
	</div>
 <div id="sticky_navigation_wrapper" style="background-color: black;">
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
                                <li class='link1'><a href="../tpl/belarus.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('COUNTRY3')?></a></li>
                                <li class='link2'><a href="../tpl/thailand.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('COUNTRY1')?></a></li>
                                <li class='link1'><a href="../tpl/asia.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('ASIA')?></a></li>
                            <li class='link2'><a href="../tpl/west.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('WESTEUROPE')?></li>
                            <li class='link1'><a href="../tpl/otherworld.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('OTHERWORLD')?></a></li>
                         
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
                            <li class='link1'><a href="../tpl/languages.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('LANGUAGES')?></a></li>
                            <li class='link2'><a href="../tpl/traditions.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('TRADITIONS')?></a></li>
                            <li class='link1'><a href="../tpl/cinema.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('CINEMAMUSIC')?></a></li>
                            <li class='link2'><a href="../tpl/books.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('BOOKS')?></a></li>
                            
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
                                <li class='link1'><a href="../tpl/wdesign.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('WEBDESIGN')?></a></li>
                                <li class='link2'><a href="../tpl/gdesign.php.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('GRAPHICDESIGN')?></a></li>
                                <li class='link1'><a href="../tpl/uptodates.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('UPTODATES')?></a></li>
                                <li class='link2'><a href="../tpl/gallery.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('GALLERY')?></a></li>
                            
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
               
                <ul class="nav navbar-nav drp1  navbar-right">
            
                    <div class="drp2">
              <?php
              if($_SESSION['username']){ 
                     $hrefa2 = '../public/profileTemplate.php?action=listMessage&articleId='.$link.'&lang='.$_SESSION['lang'];
                     if ($messNumb2>0){$numb2=$messNumb2;
                     ?>      
                   <a href="<?= $hrefa2;?>"> 
                    <span class="messNav">
                     <?= $numb2; ?></span></a><?php } ?>
             <?php  echo $lin1; ?>  <?php  echo $der_pic; ?><?php  echo $lin2; }?>   <?=$register?>
                   
                    </div>  </ul>
                <ul class="nav navbar-nav drp11  navbar-right">
                <div class="drp22">
                  <?php
              if($_SESSION['username'] && $messNumbF>0){
                     $hrefa2 = '../public/profileTemplate.php?action=acceptFriend&lang='.$_SESSION['lang'];
                     if ( $messNumbF>0){$numb2= $messNumbF;
                     ?>      
                   <a href="<?= $hrefa2;?>"> 
                    <span class="messNav2">
                     <?= $numb2; ?></span></a><?php } ?>
         
                  <span class="bell">  <i class="fa fa-bell" aria-hidden="true"></i></span>
               
                    <?php } ?> 	</div></ul>
                <div class="col-sm-12 col-xm-12 hidden-lg nav navbar-nav navbar-right lang ">
                  
                 <form action="#" name="lang" method="post" class="lang" >
                 <select  onchange="location = this.value;">
                     <option value="" class="tol"><?=Dict::_('LANGUAGESS')?></option> 
                     <option class="llang" value="<?=$ru;?>">Русский </option>
                     <option class="llang" value="<?=$en;?>"> English</option>
                 
                    <option class="llang" value="<?=$fr;?>">Français</option>
                    <option class="llang" value="<?=$th;?>" >Беларуская</option>
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
		<div  class="demo_container  col-xs-12 col-sm-12 my-search">
			<div  class="hidden-xs col-sm-6 my_logo_show">
                            <p><?=Dict::_('IMMERSEDEEPLY')?>
                            </p>
                 
			   </div>
				<div class="column col-xs-12 col-sm-6">
					<div id="sb-search" class="sb-search">
                                            <form name="search" action="../tpl/search.php?lang=<?=$_SESSION['lang']?>" method="post" accept-charset="utf-8">
							<input class="sb-search-input" placeholder="<?=Dict::_('SEARCH')?>" type="text" value="" name="words" id="search">
                                                        <input class="sb-search-submit" type="submit" value="" name="bsearch">
							<span class="sb-icon-search"></span>
						</form>
					</div>
				</div>
		
                         
	</div>
        
    	</div>
        	
<script type="text/javascript">
			
			function DropDown(el) {
				this.dd = el;
			
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;
                                            var URL ='../tpl/logouts.php';
				
                                        obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

				
				},
				
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-3').removeClass('active');
				});
                                $("#link1").click(function() {
					// all dropdowns
					$(this).toggleClass('active1');
                                          window.location="<?=$hrefa;?>";
				});
                                  $("#link2").click(function() {
					// all dropdowns
					$(this).toggleClass('active1');
                                          window.location="../public/profileTemplate.php?action=listMessage&articleId=<?=$_SESSION['id'];?>&lang=<?=$_SESSION['lang'];?>";
				});
                                  $("#link3").click(function() {
					// all dropdowns
					$(this).toggleClass('active1');
                                          window.location="../tpl/profil.php";
				});

			});

		</script>  
     