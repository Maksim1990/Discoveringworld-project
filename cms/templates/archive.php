<?php 
session_start();
$brad="href=../cms/art.php";
$title="Art";
$style='../public/css/art.css';
$art="active";
include_once '../public/header.php'; ?>
<?php include "templates/include/header.php" ?>
   <div class="col-xm-10 col-xm-offset-1 col-sm-10 col-sm-offset-1">
      <h1><?=Dict::_('ARTICLE_ARCHIVE')?></h1>
   
      <ul id="headlines" class="archive">

<?php foreach ( $results['articles'] as $article ) { ?>

        <li>
            <div class="col-xm-12 col-sm-12 decor-header">
            <h2>
            <span class="pubDate"><?php echo date('j F', $article->publicationDate)?></span></h2> 
            <h2><a href="?action=viewArticle&amp;articleId=<?php echo $article->id?>&lang=<?=$_SESSION['lang']?>"><?php echo htmlspecialchars( $article->title )?></a>
          </h2> 
          
            <p class="summary"><?php echo htmlspecialchars( $article->summary )?></p>  </div>
            <div class="col-xm-12 col-sm-12 decor1">
          <p class="col-xm-12 col-sm-12 col-sm-offset-0 decor">
         <a href="?action=viewArticle&amp;articleId=<?php echo $article->id?>&lang=<?=$_SESSION['lang']?>">     
       <?php echo $article->image?></a>
          </p></div>
        </li>

<?php } ?>

      </ul>
      
      <p><?php echo $results['totalRows']?> article<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

      <p><a href="art.php"><?=Dict::_('RETURN_TO_ARTICLES')?></a></p>

<?php include "templates/include/footer.php" ?>
</div>
