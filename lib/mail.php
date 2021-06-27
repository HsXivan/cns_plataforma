<?php

require '/usr/share/php/libphp-phpmailer/class.phpmailer.php';
require '/usr/share/php/libphp-phpmailer/class.smtp.php';


function sendNotificationMail($mailAddr, $mailSubject, $mailMensage){

  $mail = new PHPMailer;
  $mail->setFrom('admin@example.com');
  //$mail->addAddress('francisco.corral@ipicyt.edu.mx');
  $mail->addAddress($mailAddr);
  $mail->Subject = $mailSubject;
  $mail->Body = $mailMensage;
  $mail->IsSMTP();
  $mail->SMTPSecure = 'ssl';
  $mail->Host = 'ssl://smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Port = 465;
  //Set your existing gmail address as user name
  $mail->Username = 'notificaciones@ipicyt.edu.mx';
  //Set the password of your gmail address here
  $mail->Password = 'ch2TapRusP';
  if(!$mail->send()) {
  //echo 'Email is not sent.';
  //echo 'Email error: ' . $mail->ErrorInfo;
  //} else {
  //echo 'Email has been sent.';
  }

}

?>
