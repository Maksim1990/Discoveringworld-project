<?php
session_start();
class Dict{
    
    static function _($key){
      $dict=$GLOBALS['dict'];  
        if($dict[$key]){
            return $dict[$key];
            
        }else $key;
    }
   
}

$dict=  include 'public/dict/'.$_SESSION['lang'].'.php';
$errors = [];
include 'public/functions.php';
if(isset($_POST['submit']));
{

    $name =  htmlentities($_POST['mname']);
    $email =  htmlentities($_POST['memail']);
    $message =  htmlentities($_POST['mmessage']);
      
require 'lib/phpmailer/PHPMailerAutoload.php';


$mail= new PHPMailer;

//$mail->isSMTP();

$mail->Host='mail01.hoster.by';
$mail->SMTPAuth=true;
$mail->Username='postmaster@discoveringworld.net';
$mail->Password='korncoms9111';

$mail->SMTPSecure='ssl';
$mail->Port='465';

$mail->CharSet='UTF-8';
$mail->From='narushevich.maksim@gmail.com';
$mail->FromName= 'Maksim';
$mail->addReplyTo($email, $name);
$mail->addAddress( 'discoveringworld90@gmail.com', 'Maksim');
$mail->addCC('korn66in@gmail.ru');
$mail->SMTPDebug='0';
$mail->isHTML(true);

$mail->Subject='Тема письма';
$mail->Body=$message;
$mail->AltBody='Alternative text';

$mail->AddAttachment( $_FILES['attach']['tmp_name'], $_FILES['attach']['name']);
   
if($mail->send()){
    header("Location: ". $_SESSION['url']);
   setFlash('success', [
    'type' => 'success',
    'title' => Dict::_('CONGRATS'),
    'message' => Dict::_('MES_SENT')
]);
        
       exit();
}   else{
    echo 'Error with sending message';
    echo 'Errors'.$mail->ErrorInfo;
}     
        
}

?>
