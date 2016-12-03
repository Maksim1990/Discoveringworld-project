
<div id="footer">
       
           <?php  if($_SESSION['user_email']=="admin@mail.ru" ){
?>     
           <a href="admin.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('ADMIN_PANEL')?></a>
        
        
        <?php } 
    
   
    ?>
      </div>

      </div>
      </div>
   
    </div>
  </body>
</html>
<?php


?>