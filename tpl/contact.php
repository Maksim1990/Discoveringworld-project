<?php 

$title="Contact";

$contact="active";

include_once '../public/header.php';
?>
 <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic|Raleway:400,200,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="../public/js/calendar111.js"></script>
 <body style=" background:url(../public/img/b.jpg) center top no-repeat;
		background-attachment:fixed;background-size: cover;">

  <div class="container">
       
            <div class="row bradcrumps">
            <div class="col-xm-6 col-sm-10 col-sm-offset-2">
                <ul class="breadcrumb" >
                    <li><a href="../index.php?lang=<?=$_SESSION['lang']?>"><?=Dict::_('HOME')?> /</a></li>
                   <li class="active"><?=Dict::_('CONTACT')?></li>
               </ul>
            </div>
        </div> 
           
   
  
        
        <div class="row row-content vot">
           <div class="col-xs-11 col-xs-offset-1 col-sm-10 col-sm-offset-1">
               <h3><?= strtoupper(Dict::_('LOCATION_INFORMATION'))?></h3> 
           </div>
            <div class="col-xs-11 col-xs-offset-1 col-sm-4 col-sm-offset-1">
                   <h5>Our Address</h5>
                    <address style="font-size: 100%">
		              Republic of Belarus,   
		              Minsk<br>
		             
		              <i class="fa fa-phone"></i>: +375 33 627 2017<br>
		             
		              <i class="fa fa-envelope"></i>: 
                        <a href="mailto:discoveringworld90@gmail.com">discoveringworld90@gmail.com</a>
		           </address>
                     <div class="btn-group" role="group" aria-label="...">
                    <a class="md-trigger btn btn-primary button wobble-vertical" data-modal="modal-5"><i class="fa fa-phone"></i> Call</a>
                    <a href="skype:maksklim901?call" class="btn btn-info button wobble-vertical"><i class="fa fa-skype"></i> Skype</a>
                    <a  href="https://vk.com/maksim_naruschevich" target="_blank" class="btn btn-danger button wobble-vertical"><i class="fa fa-vk"></i> VK</a>
                     <a tabindex="0" role="button" type="button" data-container="body"  data-toggle="popover" data-placement="bottom" title="WhatsApp" 
                      data-content="+375 33 627 20 17 " class="btn btn-success button wobble-vertical"><i class="fa fa-whatsapp"></i> WhatsApp</a>
                     <a href="mailto:discoveringworld90@gmail.com" class="btn btn-success button wobble-vertical" ><i class="fa fa-envelope-o"></i> Email</a>
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
                        <button class="md-close btn-danger btn-lg "><?=Dict::_('CLOSE')?></button>  
                           </div>
                                             
		          </div>
		     </div>
		</div> 
                   <div class=" ab-article-cont">
              <p><?= Dict::_('CONTACT_DESCRIPTION')?>
              </p>
          </div>
            </div>
            
            
          
            <div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-1 yyy">
                <h5><?= strtoupper(Dict::_('LOCATION_MAP'))?></h5>
                <div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d150507.90692814632!2d27.45489028042609!3d53.88400923431839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dbcfd35b1e6ad3%3A0xb61b853ddb570d9!2z0JzQuNC90YHQug!5e0!3m2!1sru!2sby!4v1463823231592" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            
           
        </div>
       <div class="col-xs-12 col-sm-12  tar">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
                <form action="/send_mail.php" method="post" enctype="multipart/form-data">
                                        
                                        <input type="text" id="mname" name="mname" placeholder="<?=Dict::_('INSERT_YOUR_NAME')?>" required>   
                                        
                                        <input type="email" id="memail" name="memail" placeholder="<?=Dict::_('INSERT_YOUR_EMAIL')?>" required>   
                                      
                                        <textarea id="text_comment" cols="80" rows="20" name="mmessage"
                                                  placeholder="<?=Dict::_('SEND_YOUR_MESSAGE')?>"       required    ></textarea>
                                        
                                        <input type="file" id="attach" name="attach" >
                                        <div class="col-xs-4 col-xs-offset-4 col-sm-2 col-sm-offset-5">
                                        <button class=" btn-lg sn button pulse-shrink" type="submit" name="submit" id="submit" value="Send_Mail" ><?=Dict::_('SEND_MAIL')?></button>
                                        </div>
                </form>  
            </div>
            </div>
      </div>
      <script src="../public/js/logger.js" async></script>
   <script src="../public/js/jquery.geocomplete.js" async></script>
       
</body>

<?php
include_once "../public/footer.php";
?>