<?php
/**
 *
 * User: nicolesawler
 * Date: 2017-01-18
 * Time: 1:49 PM
 */


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
//$mail->IsMAIL();

$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->CharSet ='UTF-8';
$mail->Host = 'email-smtp.us-east-1.amazonaws.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'AKIAIRR6IZX4UXDDDFZA';                 // SMTP username
$mail->Password = 'JFURu/dXYpcpD4UJ76G9ExmJTHsnSwE39G27K9FL';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to 25, 465 or 587
$mail->setFrom('noreply@shyft.cars',"TCIPolice"); //this is who the email says it is from
$mail->WordWrap = 60;
$mail->isHTML(true); // Set email format to HTML


//Options for sending:
//$mail->addAddress('nicolesawler@gmail.com', 'Nicole Sawler');     // Add a recipient
//$mail->addAddress('nicolesawler@gmail.com');               // Name is optional
//$mail->addReplyTo('noreply@this.sucks', 'This.Sucks');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
//$mail->AddEmbeddedImage('https://this.sucks/wp-content/themes/thissucks/img/ts_logo.png', 'logo_2u'); // Embed image in body


