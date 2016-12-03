<?php

$title="Discovering world";
$home="active";
include "public/header.php";
include_once "public/show_articles.php"; 
?>
    <script>
     jQuery(document).ready(function () {                             
    jQuery.fn.lapstooltip = jQuery.fn.tooltip.noConflict();         
    jQuery(".laps-timeline .event").lapstooltip({                   
        container: '#wpadminbar', placement: 'bottom', html: true      
    });                                                             
});   
           </script>
  <script type="text/javascript" src="../public/js/calendar111.js"></script>
   <header>
                   <div class="jumbotron">
                      <div class="row row-content">
           <div class="col-xs-12 col-sm-12">
            <div id="mycarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mycarousel" data-slide-to="1"></li>
                    <li data-target="#mycarousel" data-slide-to="2"></li>
                </ol>
             <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                        <div class="item active">
                        <img class="media-object img-thumbnail" src="public/img/photo11.jpg" >
                        <div class="carousel-caption">
                        <h2><?=Dict::_('TRAVEL_AROUND')?></h2>
                        <p><?=Dict::_('TRAVEL_AROUND_1')?></p>
           
                       <ul>
  <li><a href="../cms1/travel.php?lang=<?=$_SESSION['lang']?>" class="round green">
          
          <span class="round"><?=Dict::_('MORE')?> &raquo;</span></a></li>

</ul> 
                        
                        </div>
                    </div>
                    <div class="item">
                        <img class="media-object img-thumbnail " src="public/img/photo22.jpg" >
                        <div class="carousel-caption">
                        <h2><?=Dict::_('CULTURE_AROUND')?></h2>
                        <p><?=Dict::_('CULTURE_AROUND_1')?></p>
          <ul>       
      <li><a href="../cms2/culture.php?lang=<?=$_SESSION['lang']?>" class="round green">
          <span class="round"><?=Dict::_('MORE')?> &raquo;</span></a></li>   </ul>                
                        </div>
                    </div>
                    <div class="item">
                        <img class="media-object img-thumbnail"  src="public/img/photo33.jpeg" >
                        <div class="carousel-caption">
                        <h2><?=Dict::_('ART_AROUND')?></h2>
                        <p><?=Dict::_('ART_AROUND_1')?></p>

         <ul>       
      <li><a href="../cms/art.php?lang=<?=$_SESSION['lang']?>" class="round green">
          <span class="round"><?=Dict::_('MORE')?> &raquo;</span></a></li>   </ul>
                        </div>
                    </div>
                </div>
                  <!-- Controls -->
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
      </header>

            <div class="row ddd">
            <div class="row row-content ddd3">
             <div class="col-xm-12 col-sm-8 col-sm-offset-2  ">
             <div class="ddd1"> 
                       <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                    <a href="#peter" class="button glow" aria-controls="peter"
                     role="tab" data-toggle="tab"><?=Dict::_('LINK2')?></a></li>
                    <li role="presentation"><a href="#danny" class="button glow"
                     aria-controls="danny" role="tab"
                     data-toggle="tab"><?=Dict::_('LINK3')?></a></li>
                    <li role="presentation"><a href="#agumbe" class="button glow"
                     aria-controls="agumbe" role="tab"
                     data-toggle="tab"><?=Dict::_('LINK1')?></a></li>
                    <li role="presentation"><a href="#alberto" class="button glow"
                     aria-controls="alberto" role="tab"
                     data-toggle="tab"><?=Dict::_('LINK4')?></a></li>
                </ul>
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="peter">
               
                <div class="row">
                <div class="col-xs-12 col-sm-11 col-sm-offset-1">
                <div class="row">
                <div class="col-xs-12 col-sm-5  iner">
                    <?php if (!empty($results2[0])){?>
                    <a href="<?php
                  echo  '../cms1/travel.php?action=viewArticle&articleId='.$results2[0]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                <div class="boxgrid caption">            
				<?php    echo $results2[0]["image"]."<br />";
                             ?>
		<div class="cover boxcaption">
			    <h3><?php    echo $results2[0]["title"]."<br />";  ?></h3>
				  <p><?php    echo $results2[0]["summary"]."<br />";  ?></p>  </div>
                </div>  </a>    
                    <?php }?>
                     <?php if (!empty($results2[2])){?>
                    <a href="<?php
                  echo  '../cms1/travel.php?action=viewArticle&articleId='.$results2[2]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
               <div class="boxgrid caption">            
				<?php   echo $results2[2]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results2[2]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results2[2]["summary"]."<br />"; ?></p> </div>
	</div></a> 
                    <?php };?>
                </div>
                
                <div class="col-xs-12 col-sm-5 col-sm-offset-1 iner">
                     <?php if (!empty($results2[1])){?>
                    <a href="<?php
                  echo  '../cms1/travel.php?action=viewArticle&articleId='.$results2[1]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                 <div class="boxgrid caption">            
				<?php   echo $results2[1]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results2[1]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results2[1]["summary"]."<br />"; ?></p> </div>
                 </div></a>
                     <?php }; ?>
                   <?php if (!empty($results2[3])){?>  
                     <a href="<?php
                  echo  '../cms1/travel.php?action=viewArticle&articleId='.$results2[3]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                    <div class="boxgrid caption">            
				<?php   echo $results2[3]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results2[3]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results2[3]["summary"]."<br />"; ?></p> </div>
                    </div></a>
                   <?php };?> 
               </div>
                </div>
                </div>    
                </div>
                </div>
                <div role="tabpanel" class="tab-pane fade in" id="danny">
              
                     <div class="row lin2">
                <div class="col-xs-12 col-sm-11 col-sm-offset-1">
                <div class="row">
                <div class="col-xs-12 col-sm-5 iner">
                     <?php if (!empty($results1[0])){?>
                    <a href="<?php
                  echo  '../cms/art.php?action=viewArticle&articleId='.$results1[0]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                <div class="boxgrid caption">            
				<?php   echo $results1[0]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results1[0]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results1[0]["summary"]."<br />"; ?></p> </div>
                </div>  </a>  
                     <?php }; ?>
                        <?php if (!empty($results1[2])){?>
                    <a href="<?php
                  echo  '../cms/art.php?action=viewArticle&articleId='.$results1[2]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
               <div class="boxgrid caption">            
				<?php   echo $results1[2]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results1[2]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results1[2]["summary"]."<br />"; ?></p> </div>
               </div></a>
                        <?php }; ?>     
                </div>
                
                <div class="col-xs-12 col-sm-5 col-sm-offset-1 iner">
                       <?php if (!empty($results1[1])){?>
                    <a href="<?php
                  echo  '../cms/art.php?action=viewArticle&articleId='.$results1[1]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                 <div class="boxgrid caption">            
				<?php   echo $results1[1]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results1[1]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results1[1]["summary"]."<br />"; ?></p> </div>
                 </div></a>
                       <?php }; ?>
                           <?php if (!empty($results1[3])){?>
               <a href="<?php
                  echo  '../cms/art.php?action=viewArticle&articleId='.$results1[3]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                   <div class="boxgrid caption">            
				<?php   echo $results1[3]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results1[3]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results1[3]["summary"]."<br />"; ?></p> </div>
	</div></a>
                           <?php }; ?>
               </div>
                </div>
                </div>    
                </div>
                </div>
                 
                <div role="tabpanel" class="tab-pane fade " id="agumbe">
              
                <div class="row lin3">
              <div class="col-xs-12 col-sm-11 col-sm-offset-1">
                <div class="row">
                <div class="col-xs-12 col-sm-5 iner">
                     <?php if (!empty($results3[0])){?>   
                    <a href="<?php
                  echo  '../cms2/culture.php?action=viewArticle&articleId='.$results3[0]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                <div class="boxgrid caption">            
				<?php   echo $results3[0]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results3[0]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results3[0]["summary"]."<br />"; ?></p>  </div>
                </div>       </a>
                     <?php }; ?>
                   <?php if (!empty($results3[2])){?>   
                    <a href="<?php
                  echo  '../cms2/culture.php?action=viewArticle&articleId='.$results3[2]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
               <div class="boxgrid caption">            
				<?php   echo $results3[2]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results3[2]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results3[2]["summary"]."<br />"; ?></p>  </div>
               </div></a>
                   <?php }; ?>
                </div>
                
                <div class="col-xs-12 col-sm-5 col-sm-offset-1 iner">
                  <?php if (!empty($results3[1])){?>  
                    <a href="<?php
                  echo  '../cms2/culture.php?action=viewArticle&articleId='.$results3[1]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                 <div class="boxgrid caption">            
				<?php   echo $results3[1]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results3[1]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results3[1]["summary"]."<br />"; ?></p>   </div>
                 </div></a>
                  <?php }; ?>
               <?php if (!empty($results3[3])){?>       
               <a href="<?php
                  echo  '../cms2/culture.php?action=viewArticle&articleId='.$results3[3]["id"].'&lang='.$_SESSION['lang'];
                    ?>">
                   <div class="boxgrid caption">            
				<?php   echo $results3[3]["image"]."<br />"; ?>
		<div class="cover boxcaption">
			    <h3><?php   echo $results3[3]["title"]."<br />"; ?></h3>
				  <p><?php   echo $results3[3]["summary"]."<br />"; ?></p> </div>
                   </div></a>
               <?php }; ?>
               </div>
                </div>
                </div>    
                </div>
                 </div>
                <div role="tabpanel" class="tab-pane fade " id="alberto">
                <h3><?=Dict::_('LINK4')?><small><?=Dict::_('GAME_DESCRIPTION_1')?></small></h3>
                <p><?=Dict::_('GAME_DESCRIPTION_2')?><a href="app/Game1.php"><?=Dict::_('GAME_DESCRIPTION_3')?></a></p>
                <p><?=Dict::_('GAME_DESCRIPTION_4')?><a href="app/Game2.php"><?=Dict::_('GAME_DESCRIPTION_5')?></a></p>
            </div>
                 </div>
                  </div>
                    </div>
                       </div>
    
                  <div class="container ttt">
                     <div class="row">
                         <div class="col-xm-12 col-sm-11 col-sm-offset-1 fin1">
                             <h1><?=Dict::_('IMMERSEDEEPLY')?></h1>
                         </div>
                     </div>
                      <div class="row">
                         <div class="col-xm-10 col-xm-offset-1  col-sm-10 col-sm-offset-1">
                             <div class="row jjj">
                                <div class="jjj1">
                          <div class="col-xm-12 col-sm-4 fin2 tr1"><div class="grid">
					<figure class="effect-apollo">
            <img src="public/img/3.jpg"  alt="img18">
						<figcaption>
							<h2><?=Dict::_('AMAZING1')?> <span><?=Dict::_('COUNTRY1')?></span></h2>
							<p><?=Dict::_('DESCRIPTION1')?></p>
							<a href="tpl/thailand.php?lang=<?=$_SESSION['lang']?>">View more</a>
						</figcaption>			
					</figure>
                              </div>
                            </div>
                          <div class="col-xm-12 col-sm-4 fin2 tr2">
                           <div class="grid">
					<figure class="effect-apollo">
            <img src="public/img/777.jpg" alt="img18">
						<figcaption>
							<h2><?=Dict::_('AMAZING2')?> <span><?=Dict::_('COUNTRY2')?></span></h2>
							<p><?=Dict::_('DESCRIPTION2')?></p>
                                                        <a href="tpl/asia.php?lang=<?=$_SESSION['lang']?>">View more</a>
						</figcaption>			
					</figure>
				</div>
                            </div>
                          <div class="col-xm-12 col-sm-4 fin2 tr3">
                           <div class="grid">
					<figure class="effect-apollo">
            <img src="public/img/MInsk%20Biblioteka.jpg" alt="img18">
						<figcaption>
							<h2><?=Dict::_('AMAZING3')?> <span><?=Dict::_('COUNTRY3')?></span></h2>
							<p><?=Dict::_('DESCRIPTION3')?></p>
                                                        <a href="tpl/belarus.php?lang=<?=$_SESSION['lang']?>">View more</a>
						</figcaption>			
					</figure>
				</div>
                            </div>
                      </div>
                                  </div>
                  </div>
                     </div>
                         </div>
                  <div class="row rar">
                      <div class="col-xm-10 col-xm-offset-1 col-sm-10 col-sm-offset-1 ">
                          <div class="col-xm-12 col-sm-6 col-sm-offset-3 non">
                          <div class=" ab-article-main">
                          <?=Dict::_('ALL_ARTICLE_UPDATES')?></div></div>
                          <div class="col-xm-8 col-xm-offset-2 rar_main">
                         <div class="col-xm-10 col-xm-offset-1 col-sm-5  rar1 tran1">  
                        <?php include_once 'public/listarticle.php'; ?>
                     </div>      
                      <div class="col-xm-10 col-xm-offset-1 col-sm-5 col-sm-offset-2 rar1 tran2">  
                        <?php include_once 'public/listarticle2.php'; ?>
                      </div>
                     </div>  
                      </div>
                  </div>
              
           
            <div class="container fff">
            <div class="row mmm">
                <div class="mmm1">
            <div class="col-xs-12 col-sm-7">
                <div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">
       
                <div class="panel panel-success">
                        <div class="panel-heading" role="tab" id="headingDanny" class="collapsed" role="button" data-toggle="collapse"      data-parent="#accordion" href="#danny1"
                                     aria-expanded="false" aria-controls="danny">
                            <h3 class="panel-title">
                                <a  href="#danny1">
                                <?=Dict::_('COUNTRY3')?><small><?=Dict::_('WECOUNTRY')?></small></a>
                            </h3>
                        </div>
                        <div role="tabpanel" class="panel-collapse collapse in"
                             id="danny1"    aria-labelledby="headingDanny">
                            <div class="panel-body">
                <p><?=Dict::_('WECOUNTRY_DESCRIPTION')?></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-success">
              <div class="panel-heading" role="tab" id="headingAgumbe" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#agumbe1"
                                     aria-expanded="false" aria-controls="agumbe">
                            <h3 class="panel-title">
                                <a href="#agumbe1" >
                               <?=Dict::_('COUNTRY1')?><small><?=Dict::_('FECOUNTRY')?></small></a>
                            </h3>
                        </div>
                        <div role="tabpanel" class="panel-collapse collapse"
                             id="agumbe1"    aria-labelledby="headingAgumbe">
                            <div class="panel-body ">
                                <p><?=Dict::_('FECOUNTRY_DESCRIPTION')?></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-success">
               <div class="panel-heading" role="tab" id="headingAlberto" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#alberto1"  aria-expanded="false" aria-controls="alberto">
                            <h3 class="panel-title">
                                <a  href="#alberto1">
                                 <?=Dict::_('FRANCE')?> <small><?=Dict::_('FRCOUNTRY')?></small></a>
                            </h3>
                        </div>
                        <div role="tabpanel" class="panel-collapse collapse"
                             id="alberto1"    aria-labelledby="headingAlberto">
                            <div class="panel-body">
                <p><?=Dict::_('FRCOUNTRY_DESCRIPTION')?></p>
            </div>
                        </div>
                    </div>
                      <div class="panel panel-success">
                        <div class="panel-heading" role="tab" id="headingPeter" role="button" data-toggle="collapse"
                                     data-parent="#accordion" href="#peter1"
                                     aria-expanded="true" aria-controls="peter">
                            <h3 class="panel-title">
                                <a href="#peter1" ><?=Dict::_('GERMANY')?><small><?=Dict::_('GRCOUNTRY')?></small></a>
                            </h3>
                        </div>
                        <div role="tabpanel" class="panel-collapse collapse "
                             id="peter1"    aria-labelledby="headingPeter">
                            <div class="panel-body">
                <p> <?=Dict::_('GRCOUNTRY_DESCRIPTION')?></p>
                  </div>
                        </div>
                    </div>
               </div> 
            </div>  
                    <div class="col-xs-12 col-sm-5" id="Pics">
                 <a  data-toggle="modal" data-target=".bs-example-modal-sm"><img src="public/img/bel.jpg" id="belarus"></a>
               <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			<div class="modal-dialog modal-sm">
				<div id="Pics1" class="modal-content">
                                    <img src="public/img/bel.jpg">
			
				</div>
			</div>
		</div>
           
</div>
                     </div>
            </div>
             <div class=" ggg row">                 
                         <div class=" ggg1" id="phone">
                             <div class="row">
                                 <div class="col-xm-12 col-sm-6 nnn bor">
                                     <h3><?=Dict::_('SEND_YOUR_STORIES')?></h3>
                                     <p><i><?=Dict::_('THIS_PROJECT')?></i> </p>
                                 </div>
                             <div class="col-xm-12 col-sm-6">
                                 <div class="col-xm-12 col-sm-12 ">
                                     <div class="col-xm-6 col-sm-4 bb">
                                  <a class="md-trigger button pulse-shrink" data-modal="modal-5">        
                                         <img src="public/img/phone.png"  class="phone">
                                  </a>
                                         </div>
                                         <div class="col-xm-6 col-sm-6 col-sm-offset-1 ppp">
                                             <p><i><?=Dict::_('FREE_TO_CALL')?></i></p>
                                              
                                                     
                                         </div>
                 <div class="md-modal md-effect-5 row" id="modal-5">
			<div class="md-content2 col-xm-12 col-sm-8 col-sm-offset-2 ">
                            <div class="col-xm-12 col-sm-12 callus" >
                         <div class="col-xm-12  col-sm-12 "> 
                                <h3><?=Dict::_('SHARE')?></h3>
                         </div>
                           <div class="col-xm-10 col-xm-offset-2 col-sm-6 col-sm-offset-3 ">
                           <i>+375 33 627 2017<br /></i>
                            <i>+375 29 138 1415</i>
                        <button class="md-close btn-danger btn-lg"><?=Dict::_('CLOSE')?></button>  
                           </div>
                                             
		          </div>
		     </div>
		</div>                         
                                 </div>
                                 <div class="col-xm-12 col-sm-12">
                                     <div class="col-xm-6 col-sm-6 col-sm-offset-1 ppp1"><p><i><?=Dict::_('SEND_YOUR_OP')?></i> </p>
                                 
                                 </div>
                                 <div class="col-xm-6 col-sm-4 bb" >
                                   
                                     <a class="md-trigger button pulse-shrink" data-modal="modal-6">
                                         <img src="public/img/email.png"  class="email"></a>
                        <div class="md-modal md-effect-5 row" id="modal-6">
			<div class="md-content col-xm-12 col-sm-8 col-sm-offset-2 ">
                            <div class="col-xm-12 col-sm-12 " >
                                       <form action="send_mail.php" method="post" enctype="multipart/form-data">
                                        
                                        <input type="text" id="mname" name="mname" placeholder="<?=Dict::_('INSERT_YOUR_NAME')?>" required>   
                                        
                                        <input  type="email" id="memail" name="memail" placeholder="<?=Dict::_('INSERT_YOUR_EMAIL')?>" required>   
                                      
                                        <textarea id="text_comment" cols="80" rows="20" name="mmessage"
                                                  placeholder="<?=Dict::_('SEND_YOUR_MESSAGE')?>"          required ></textarea>
                                        
                                        <input type="file" id="attach" name="attach" required>
                                       
                                        <button class="btn-success btn-lg sn" type="submit" name="submit" id="submit" value="Send_Mail" ><?=Dict::_('SEND_MAIL')?></button>
                                      
                                        
                                            <button class="md-close btn-danger btn-lg"><?=Dict::_('CLOSE')?></button>
                                        </form>   
		          </div>
		     </div>
		</div>
              </div>
            </div>
            </div>
            </div>                 
           </div>
          </div>
                <div class=" people">
                    <div class=" people2">
                          <?php 
                          if($_SESSION['username']){
        $hrefUser = '../public/profileTemplate.php?action=userMessage&lang='.$_SESSION['lang'];
                          }else {
            $hrefUser = ' ../tpl/login.php?lang='.$_SESSION['lang'];   
                          }
         echo '<a href="'.$hrefUser.'" class="already"><h3>'.Dict::_('ALREADY_REGISTERED').'.</h3></a>';
        include_once 'public/people.php'; ?>           
                </div> 
                      </div> 
                <div class="hidden-xs hidden-xm col-lg-12">
               <div class="line4">
               <div class="row">
               <div class="slider demo">
               <div class="wrapper cl">
		<div class="pic">
		    <?php  echo $results[0]["image"];
                             ?>
                    <?php 
                    $link=$results[0]["id"];
                    if($results[0]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[0]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
 echo "<a href='$hrefa'>";
                    ?>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title"><?=Dict::_('DISCOVER')?></h1>
                          <span class="glyphicon glyphicon-plus-sign"></span>
		        <p><?php  echo $results[0]["title"];?></p>
                        <p><?php  echo $results[0]["summary"];?></p>
		    </span><?php echo '</a>' ;?>
		</div>
                   </div>

                <div class="wrapper cl">
		<div class="pic">
		     <?php  echo $results[1]["image"];
                             ?>
                     <?php 
                    $link=$results[1]["id"];
                    if($results[1]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[1]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
 echo "<a href='$hrefa'>";
                    ?>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title"><?=Dict::_('DISCOVER')?></h1>
                         <span class="glyphicon glyphicon-plus-sign"></span>
		        <p><?php  echo $results[1]["title"];?></p>
                        <p><?php  echo $results[1]["summary"];?></p>
		    </span><?php echo '</a>' ;?>
		</div>
                   </div>
                <div class="wrapper cl">
		<div class="pic">
		     <?php  echo $results[2]["image"];
                             ?>
		    <?php 
                    $link=$results[2]["id"];
                    if($results[2]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[2]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
 echo "<a href='$hrefa'>";
                    ?>
                    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title"><?=Dict::_('DISCOVER')?></h1>
                         <span class="glyphicon glyphicon-plus-sign"></span>
		        <p><?php  echo $results[2]["title"];?></p>
                        <p><?php  echo $results[2]["summary"];?></p>
		    </span><?php echo '</a>' ;?>
		</div>
                   </div>
                <div class="wrapper cl">
		<div class="pic">
		     <?php  echo $results[3]["image"];
                             ?>
                    <?php 
                    $link=$results[3]["id"];
                    if($results[3]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[3]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
 echo "<a href='$hrefa'>";
                    ?>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title"><?=Dict::_('DISCOVER')?></h1>
                      <span class="glyphicon glyphicon-plus-sign"></span>
		        <p><?php  echo $results[3]["title"];?></p>
                        <p><?php  echo $results[3]["summary"];?></p>
		    </span><?php echo '</a>' ;?>
		</div>
                   </div>
                <div class="wrapper cl">
		<div class="pic">
		     <?php  echo $results[4]["image"];
                             ?>
                     <?php 
                    $link=$results[4]["id"];
                    if($results[4]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[4]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
 echo "<a href='$hrefa'>";
                    ?>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title"><?=Dict::_('DISCOVER')?></h1>
                       <span class="glyphicon glyphicon-plus-sign"></span>
		        <p><?php  echo $results[4]["title"];?></p>
                        <p><?php  echo $results[4]["summary"];?></p>
		    </span><?php echo '</a>' ;?>
		</div>
                   </div>
                <div class="wrapper cl">
		<div class="pic">
		    <?php  echo $results[5]["image"];
                             ?>
                    <?php 
                    $link=$results[5]["id"];
                    if($results[5]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[5]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
 echo "<a href='$hrefa'>";
                    ?>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title"><?=Dict::_('DISCOVER')?></h1>
                       <span class="glyphicon glyphicon-plus-sign"></span>
		        <p><?php  echo $results[5]["title"];?></p>
                        <p><?php  echo $results[5]["summary"];?></p>
		    </span><?php echo '</a>' ;?>
		</div>
                   </div>
                
               <div class="wrapper cl">
		<div class="pic">
		     <?php  echo $results[6]["image"];
                             ?>
                    <?php 
                    $link=$results[6]["id"];
                    if($results[6]["mark"]=="art"){
$hrefa = '../cms/art.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];
}elseif ($results[6]["mark"]=="travel") {
       $hrefa = '../cms1/travel.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];         
            }
 else {$hrefa = '../cms2/culture.php?action=viewArticle&articleId='.$link.'&lang='.$_SESSION['lang'];}
 echo "<a href='$hrefa'>";
                    ?>
		    <span class="pic-caption bottom-to-top">
		        <h1 class="pic-title"><?=Dict::_('DISCOVER')?></h1>
                        <span class="glyphicon glyphicon-plus-sign"></span>
		   <p><?php  echo $results[6]["title"];?></p>
                   <p><?php  echo $results[6]["summary"];?></p>
		    </span><?php echo '</a>' ;?>
		</div>
                   </div>
                     </div>
             </div>
              </div>
               </div>
                </div>
              

   
   <script>
(function($) {

  /**
   * Copyright 2012, Digital Fusion
   * Licensed under the MIT license.
   * http://teamdf.com/jquery-plugins/license/
   *
   * @author Sam Sehnert
   * @desc A small plugin that checks whether elements are within
   *     the user visible viewport of a web browser.
   *     only accounts for vertical position, not horizontal.
   */

  $.fn.visible = function(partial) {
    
      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;
    
    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

  };
    
})(jQuery);

var win = $(window);

var allMods = $(".tran1");

allMods.each(function(i, el) {
  var el = $(el);
  if (el.visible(true)) {
    el.addClass("already-visible"); 
  } 
});

win.scroll(function(event) {
  
  allMods.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("tran1_t"); 
    } 
  });
  
}); 
var allMods2 = $(".tran2");

allMods2.each(function(i, el) {
  var el = $(el);
  if (el.visible(true)) {
    el.addClass("already-visible"); 
  } 
});

win.scroll(function(event) {
  
  allMods2.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("tran2_t"); 
    } 
  });
  
}); 
var allMods4 = $(".tr1");
var allMods5 = $(".tr2");
var allMods6 = $(".tr3");
var allMods3 = $(".tr1, .tr2, .tr3");
allMods3.each(function(i, el) {
  var el = $(el);
  if (el.visible(true)) {
    el.addClass("already-visible2"); 
  } 
});

win.scroll(function(event) {
  
  allMods4.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("tr1_t"); 
    } 
  });
  
}); 
win.scroll(function(event) {
  
  allMods5.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("tr2_t"); 
    } 
  });
  
});
win.scroll(function(event) {
  
  allMods6.each(function(i, el) {
    var el = $(el);
    if (el.visible(true)) {
      el.addClass("tr3_t"); 
    } 
  });
  
});

    </script>
            <script>
        $(document).ready(function(){
       $('.demo').slick({
    dots: false,
  slidesToShow: 5,
  slidesToScroll: 1,
  touchMove: false,
         autoplay: true,
  autoplaySpeed: 2000,});
});
</script>
  <?php 
  include_once "public/footer.php";
  ?>


