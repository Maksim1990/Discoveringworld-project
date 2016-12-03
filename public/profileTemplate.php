<?php
session_start();
$title="Profile Page";
$idUser=$_SESSION['id'];
$ter="../public/profileTemplate.php?action=profilePage&articleId=";
$ru=$ter.$idUser."&lang=ru";
$en=$ter.$idUser."&lang=en";
$fr=$ter.$idUser."&lang=fr";
$th=$ter.$idUser."&lang=th";
$t=true;
include 'header.php';

?>
 <script type="text/javascript" src="../public/js/calendar111.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea', height: 250,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools codesample'
  ],
  toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });</script>
<div class="profilepage">
<div class="profilepage1">
    <div class="hidden-xs col-sm-2 yup yup1">
    <?php include_once 'listarticle_articles.php';
 
    ?>
        </div>
    <div class="col-xs-12 col-sm-8  profilepage2">
    <?php
session_start();
include_once( "connection.php" );
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
    case 'profilePage':
        profilePage();
        break;
    case 'profileMessage':
        profileMessage();
        break;

    case 'listMessage':
        listMessage();
        break;
    case 'newMessage':
        newMessage();
        break;
    case 'sendMessage':
        sendMessage();
        break;
    case 'readMessage':
        readMessage();
        break;

    case 'userMessage':
        userMessage();
        break;
     case 'userVoted':
        userVoted();
        break;
     case 'acceptFriend':
        acceptFriend();
        break;
    case 'photogallery':
        photogallery();
        break;
    default:
        homepage();
}



function profilePage() {
   

   
    require( "profilePage.php" );
} 



function listMessage() {
 
  require( "mess_list.php" );
}
function newMessage() {
   
  require( "new_mess.php" );
}
function sendMessage() {
   
  require( "new_mess_user.php" );
}

function readMessage() {
   require( "read_mess.php" );
}

function userMessage() {
  
  require( "users.php" );
}
function userVoted() {
  
  require( "users-voted.php" );
}
function acceptFriend() {
  
  require( "acceptFriend.php" );
}
function photogallery() {
  
  require( "photogallery.php" );
}
function homepage(){
    $id=$_SESSION['id'];
    require "profileTemplate.php?action=profilePage&articleId=$id";
}
?>

</div>
    <div class="col-xs-12 col-sm-2 people3">
        <?php 
        $hrefUser = '../public/profileTemplate.php?action=userMessage&lang='.$_SESSION['lang'];
         echo '<div class="col-xs-12 col-sm-10 col-sm-offset-1"><a href="'.$hrefUser.'" class="already"><h3>'.Dict::_('ALREADY_REGISTERED').'.</h3></a></div>';
        ?>
        
      <?php include "people.php"; ?> 
        
    </div>

</div>
</div>
<?php
include_once "footer.php";
?>
