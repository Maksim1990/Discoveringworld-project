
<?php 
$about="active";


?>


<!DOCTYPE html>
<html >
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>


</head>
  <body>
    
       <div class="row">
            
    <div class="col-xm-6 col-sm-10  " >
       
    <div id="container" class="col-xm-10 col-xm-offset-2 col-sm-7 col-sm-offset-1">

      <ul id="headlines">

<?php 

if(empty($results['articles'])){
echo "<div class='col-xs-12 col-sm-12 notice'><p class='col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1'><i></i>".Dict::_('SORRY')."</p></div>"; 
}

else foreach ( $results['articles'] as $article ) { ?>

        <li>
            <div class="col-xm-12 col-sm-12 decor-header">
            <h2>
            <span class="pubDate"><?php echo date('j F', $article->publicationDate)?></span></h2> 
 <?php  if($_SESSION['lang']=='th'){ ?>  
                <h2><a href="?action=viewArticle&amp;articleId=<?php echo $article->id?>&lang=<?=$_SESSION['lang']?>"><?php echo htmlspecialchars( $article->title )?></a></h2> 
 <?php }else {?>
 <h2><a href="?action=viewArticle&amp;articleId=<?php echo $article->id?>&lang=<?=$_SESSION['lang']?>"><?php echo strtoupper( $article->title )?></a></h2> 
           <?php } ?>
           
          
            <p class="summary"><?php echo htmlspecialchars( $article->summary )?></p>  </div>
            <div class="col-xm-12 col-sm-12 decor1">
          <p class="col-xm-12 col-sm-12 col-sm-offset-0 decor">
         <a href="?action=viewArticle&amp;articleId=<?php echo $article->id?>&lang=<?=$_SESSION['lang']?>">     
       <?php echo $article->image?></a>
          </p></div>
        </li>

<?php } ?>

      </ul>

        <p class="archive-link"><a href="./art.php?action=archive&lang=<?=$_SESSION['lang']?>"><?=Dict::_('ARTICLE_ARCHIVE')?></a></p>

<?php include "../cms/templates/include/footer.php" ?>



