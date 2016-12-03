

    <?php 
  
    
    $unknown=Dict::_('FILL_AREA'); ?>
<div class="profileinfo"><div class="col-xs-4 col-sm-5 " >
        <h3 class="bld"><?=Dict::_('NAME')?></h3>
    </div><div class="col-xs-8 col-sm-7 "><h3> <?= "<span>".ucfirst($sname)."</span>"; ?>
        </h3></div>  </div>







<div class="profileinfo ">
    <div class="col-xs-4 col-sm-5 ">
        <h3 class="bld"><?=Dict::_('SECONDNAME')?></h3></div><div class="col-xs-8 col-sm-7">
            <h3> 
            <?php 
if (!empty($secondname)){
echo"<span>".ucfirst($secondname)."</span>";}
 else {
    echo $unknown;    
}
?></h3>
     </div>  </div>



<div class="profileinfo ">
    <div class="col-xs-4 col-sm-5">
        <h3 class="bld"><?=Dict::_('COUNTRY')?></h3></div>
        <div class="col-xs-6 col-sm-7">         <h3> 
            <?php 
if (!empty($country)){
echo"<span>".ucfirst($country)."</span>";}
 else {
    echo $unknown;    
}
?></h3></div>  </div>


<div class="profileinfo ">
    <div class="col-xs-4 col-sm-5">
        <h3 class="bld"><?=Dict::_('CITY')?></h3></div>
        <div class="col-xs-6 col-sm-7">
                    <h3> 
            <?php 
if (!empty($city)){
echo"<span>".ucfirst($city)."</span>";}
 else {
    echo $unknown;    
}
?></h3>
        </div>  </div>



<div class="profileinfo ">
    <div class="col-xs-4 col-sm-5">
        <h3 class="bld"><?=Dict::_('EMAIL')?></h3></div>
        <div class="col-xs-8 col-sm-7 dEmail">
            <h3> <?= "<span>$semail</span>"; ?></h3>
        </div>  </div>


<div class="profileinfo ">
    <div class="col-xs-4 col-sm-5">
        <h3 class="bld"><?=Dict::_('AGE')?></h3></div>
        <div class="col-xs-8 col-sm-7">
          <h3> 
            <?php 
if (!empty($age)){
echo"<span>".ucfirst($age)."</span>";}
 else {
    echo $unknown;    
}
?></h3>
        </div>  </div>
 
