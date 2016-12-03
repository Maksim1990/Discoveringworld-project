<?php 
$brad="href=../cms/art.php";
$title="Art";
$style='../public/css/art.css';
$art="active";include_once '../public/header.php'; ?>
<?php include "../cms/templates/include/header.php" ?>

      <div id="adminHeader">
        
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
      </div>
<div class="col-xm-12 col-sm-10 col-sm-offset-1 adminSettings">
      <h1><?php echo $results['pageTitle']?></h1>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="articleId" value="<?php echo $results['article']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label for="title">Article Title</label>
            <input type="text" name="title" id="title" placeholder="Name of the article" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->title )?>" />
          </li>

           <li>
            <label for="description">Article Meta-Description</label>
            <input type="text" name="description" id="description" placeholder="Meta-description of the article"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->description )?>" />
          </li>
          
           <li>
            <label for="keywords">Article Meta-Keywords</label>
            <input type="text" name="keywords" id="keywords" placeholder="Meta-keywords of the article"  autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['article']->keywords )?>" />
          </li>
          
          <li>
            <label for="summary">Article Summary</label>
            <textarea name="summary" id="summary" placeholder="Brief description of the article" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars( $results['article']->summary )?></textarea>
          </li>
          
          <li>
            <label for="image">Image</label>
          <textarea name="image" id="image" placeholder="The HTML code for img" required maxlength="100000" style="height: 3em;"><?php echo htmlspecialchars( $results['article']->image )?></textarea>
          </li>
                 <li>
            <label for="mark">ArticleMark</label>
          <select name="mark" id="mark"  required style="height: 3em;">
              <option>   <?php echo htmlspecialchars( $results['article']->mark )?></option>
              <option value="art">Art</option>
               <option value="cuiture">Culture</option>
              <option value="travel">Travel</option>
          </select>
          </li>
             <li>
           <label for="articleSidebar">Articles Filter</label>
          <select name="articleSidebar" id="articleSidebar" required  style="height: 3em;">
              <option style="color:green;font-size:bold;">  <?php echo htmlspecialchars( $results['article']->articleSidebar )?></option>
              <option value="asia">Asia</option>
              <option value="asia,thailand">Asia,Thailand</option>
              <option value="asia,traditions">Asia,Traditions</option>
              
              <option value="belarus">Belarus</option>

              <option value="belarus,traditions">Belarus,Traditions</option>
                <option value="books">Books</option>
                 <option value="cinema">Cinema & Music</option>
                <option value="gdesign">Graphic Design</option>
                   <option value="languages">Languages</option>
                 
                     <option value="otherworld">Other World</option>
    
              <option value="otherworld,traditions">Other World, Traditions</option>
              <option value="thailand">Thailand</option>
    
              <option value="thailand,traditions">Thailand,Traditions</option>
               <option value="traditions">Traditions</option>
                <option value="uptodates">Up-to-Dates</option>
                 <option value="wdesign">Web Design</option>
                 <option value="west">West Europe</option>
     
                 <option value="west,traditions">West Europe,Traditions</option>
          </select>
          </li>
          
          <li>
            <label for="content">Article Content</label>
            <textarea name="content" id="content" placeholder="The HTML content of the article" required maxlength="100000" style="height: 30em;"><?php echo htmlspecialchars( $results['article']->content )?></textarea>
          </li>

          <li>
            <label for="publicationDate">Publication Date</label>
            <input type="date" name="publicationDate" id="publicationDate" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo $results['article']->publicationDate ? date( "Y-m-d", $results['article']->publicationDate ) : "" ?>" />
          </li>


        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>

<?php if ( $results['article']->id ) { ?>
      <p><a href="admin.php?action=deleteArticle&amp;articleId=<?php echo $results['article']->id ?>" onclick="return confirm('Delete This Article?')">Delete This Article</a></p>
<?php } ?>
</div>
<?php include "../cms/templates/include/footer.php" ?>
<?php include_once '../public/footer.php'; ?>
