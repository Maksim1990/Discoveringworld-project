<?php include "templates/include/header.php"; ?>
 
 <div class="col-xs-12 col-sm-12 tess">
                <?php
                if($_SESSION['url']=='/cms/art.php?action=viewArticle&articleId='.$results['article']->id.'&lang='.$_SESSION['lang']){
                    echo  $results['article']->image;
                }          ?>
            </div>

   <p class=" vtitle">
<?php  if($_SESSION['lang']=='th'){ ?>
   <h1 style="width: 90%;"><?php echo htmlspecialchars($results['article']->title )?></h1>
<?php }else { ?>
   <h1 style="width: 90%;"><?php echo strtoupper($results['article']->title )?></h1>
<?php } ?>
</p>

      <div style="width: 90%;" class="vsummary" ><?php echo htmlspecialchars( $results['article']->summary )?></div>
      <div style="width: 90%;" class="varticle"><?php echo $results['article']->content?></div>
      <p class="pubDate"><?=Dict::_('PUBLISHED_ON')?><?php echo date('j/ m/ Y', $results['article']->publicationDate)?></p>
    <div class="col-xs-12 col-sm-10 tess3">  
      <div class='ld-container' tid='<?php echo htmlspecialchars( $results['article']->title )?>' action='/web/ajax_likes.php'>
       <?php  if($_SESSION['user_email']){
?>     
          
<div style='float:left;'>
<button type="button" class='ld-btn-like green' title='I like it'>
<img class='ld-img-like' src="../public/thumbs-up-s.png"/>
</button>
 
<button type="button" class='ld-btn-dislike red' title='I dislike it'>
<img class='ld-img-dislike' src="../public/thumbs-down-s.png"/>
</button>
</div>
   <?php } 
    
   else {echo '<p>'.Dict::_('IN_ORDER_TO_VOTE').'<a  href="../tpl/register.php">'.Dict::_('REGISTER1').'</a>'.Dict::_('OR').'<a  href="../tpl/login.php">'.Dict::_('LOGIN1').'</a>'.Dict::_('ON_WEB_SITE').'</p>';}
    
    ?>

 
<div style='float:right;'>
<div class='ld-stats-bar'></div>
<span class='ld-stats-txt'></span>
</div>
 
<div class='ld-clear-both'></div>
</div>
        <div class="col-xs-12 col-sm-12 share">
          <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>
<script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8"></script>
<div class="ya-share2" data-services="vkontakte,facebook,gplus,twitter,blogger,delicious,digg,reddit,evernote,linkedin,pocket,renren,sinaWeibo,surfingbird,tencentWeibo,tumblr,whatsapp" data-counter=""></div>
      </div>
      </div>
      <div class="col-xs-12 col-sm-10 tess3">
      <p><a href="art.php"><?=Dict::_('RETURN_TO_ARTICLES')?></a></p>

  <?php    $markAr=$_GET["articleId"] ;?>
  
<?php 

if($_SESSION['username']){
  include '../tpl/comment/commenting.php';
  }
   include 'include/footer.php' ;
    
    
 ?>
  </div>
      