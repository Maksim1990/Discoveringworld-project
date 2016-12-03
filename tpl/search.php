<?php 
session_start();
$title="Search";
$style='../public/css/art.css';
include_once '../public/header.php';


   if(isset($_POST['bsearch'])){  
       $words = $_POST['words'];  
       $results = search($words);  
    }  
 function search($words) {
		$words = htmlspecialchars($words);
		if ($words === "") return false;
		$query_search = "";
		
		$arraywords = explode(" ", $words);
		foreach ($arraywords as $key => $value) {
			if (isset($arraywords[$key - 1])) 
				$query_search .= ' OR ';
			$query_search .= '`title` LIKE "%'.$value.'%" OR `summary` LIKE "%'.$value.'%"OR `content` LIKE "%'.$value.'%"';
		}
		
		$mysqli = new mysqli("localhost", "admin", "qwerty", "myproject");
		$result_set = $mysqli->query('(SELECT * FROM articles_'.$_SESSION['lang'].' WHERE ('.$query_search.'))
    UNION
        (SELECT * FROM travel_'.$_SESSION['lang'].' WHERE ('.$query_search.'))
    UNION
        (SELECT * FROM culture_'.$_SESSION['lang'].' WHERE ('.$query_search.'))ORDER BY `publicationDate` DESC');
                
                
		$mysqli->close();
		
		$i = 0;
		while ($row = $result_set->fetch_assoc()) {
			$results[$i] = $row;
			$i++;
		}
		
		return $results;
	}
	if (isset($_POST['bsearch'])) {
		$results = search($_POST['words']);
		if (count($results) == 0) $nf = true;
		else $nf = false;
	} 
?>  
 <script type="text/javascript" src="../public/js/calendar111.js"></script>
      <div class="container tr">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <?php 
               if($_SESSION['lang']=="en"){
         echo    "<img src='../public/img/search.jpg'>";}
elseif ($_SESSION['lang']=="fr") {
echo    "<img src='../public/img/search_fr.jpg'>";
}elseif ($_SESSION['lang']=="th") {
echo    "<img src='../public/img/search_bl.jpg'>";
}  else
    echo    "<img src='../public/img/search_ru.jpg'>";

         ?>
            </div>
        </div>  
      </div>
        <div class="row bradcrumps">
            <div class="col-xm-6 col-sm-10 col-sm-offset-2">
                <ul class="breadcrumb" >
                    <li><a href="../index.php"><?=Dict::_('HOME')?> /</a></li>
                   <li class="active"><?=Dict::_('SEARCH1')?> </li>
               </ul>
            </div>
        </div>    
             
          
       
<div class="row ">
<div class="col-xs-12 col-sm-12 ">
<div class="row tty">
    <div class="hidden-xm hidden-xs col-sm-2 " >
  <div class="container1">
			<ul  class="sti-menu">
			<li data-hovercolor="#ffdd3f">
					<a href="#">
						<h2 data-type="mText" class="sti-item">Advanced Technology</h2>
						<h3 data-type="sText" class="sti-item">From the latest research</h3>
						<span data-type="icon" class="sti-icon sti-icon-technology sti-item"></span>
					</a>
				</li>
			</ul>
    
		</div>
    </div>
    <div class="col-xm-6 col-sm-8  tg-search">
        
<?php
		if (isset($_POST['bsearch'])) {
			echo "<h1>".Dict::_('SEARCH2')."</h1>";
			if ($results === false) echo "Blank ";
			if (count($results) == 0) echo "<h1>".Dict::_('NOTHING')."</h1>";
			else
				for ($i = 0; $i < count($results); $i++){
                                        $mark=$results[$i]['mark'];
                                        if($mark=="art"){
					$href = '../cms/art.php?action=viewArticle&articleId='.$results[$i]['id'].'&lang='.$_SESSION['lang'];
                                        }elseif ($mark=="travel") {
                                        $href = '../cms1/travel.php?action=viewArticle&articleId='.$results[$i]['id'].'&lang='.$_SESSION['lang'];
                                } else {
                                    $href = '../cms2/culture.php?action=viewArticle&articleId='.$results[$i]['id'].'&lang='.$_SESSION['lang'];
                                }              
                                       $sqldata=$results[$i]["title"];  
$sqlname=$results[$i]["summary"];
$sqldate=$results[$i]["publicationDate"];
$sqlimage=$results[$i]["image"];  
$sqlid=$results[$i]["id"];
echo "<div class='col-xm-12 col-sm-10 col-sm-offset-1 decor-header1'><p class='col-xm-12 col-sm-12 pubDate1'>$sqldate</p>"
. "<div class='col-xm-12 col-sm-12 summary'><h2><a href='$href'>$sqldata</a></h2>$sqlname "
        . "</div></div><div class='col-xm-12 col-sm-10 col-sm-offset-1 immagea'><a href='$href'> $sqlimage</a>"."<br/></div>";
}
		}
	?>
    </div>
       
    <div class="col-xm-6 col-sm-2 ty">

      
    </div>
</div>               
<?php
include_once "../public/footer.php";
?>