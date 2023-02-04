<?php
/**
 * @description Send User Email
 * @author nicole
 * @return page
 */

include_once '../../back/reports.php';

require '../PHPMailer/PHPMailerAutoload.php';
require '../../back/smtp.php';

$name = filter_input(INPUT_POST, "name");
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
$message = filter_input(INPUT_POST, "message");

$mail->addAddress('nicole@momentous.ca','Nicole Sawler',0);               // Name is optional (second param)
$mail->addAddress($email);               // Name is optional (second param)
$mail->addReplyTo('noreply@shyft.cars', 'TCIPolice'); //if they click reply this is the account it goes to


//$mail->AddEmbeddedImage('https://www.get.sucks/reports/mail/logo.png', 'logo_2u', 'ts_logo.png','base64', 'image/png'); // Embed image in body //<img width="900" height="178" src="cid:logo_2u">

$mail->Subject = 'You have a new message from TCI Police Online';

$mail->Body    = '<h2>Thank you for choosing <a href="http://this.sucks">THIS.SUCKS</a></h2><br>';
$mail->Body    .= '<b>Just a heads up. The items below are about to expire:</b>';
$mail->Body    .= '<h2>'.$message.'</h2>';
$mail->Body    .= '<h5>Expires:</h5>';
$mail->Body    .= '<br>To review all your domains please log in to <a href="http://this.sucks">Your Account</a>.';
$mail->Body    .= '<br><br>If you already have a credit card added to your account, no further action is required. Otherwise,
Please login to your account and update your credit card information.';

$mail->Body    .= '<div style="display:block;background-color:black;color:white;padding25px;"><br><br><a href="https://this.sucks/terms">Terms &amp; Conditions</a> - <a href="https://this.sucks/privacy">Privacy Policy</a><br>Copyright 2015, This.sucks Inc. 54 W. 40th Street, New York, NY, USA 10018.<br>All rights reserved. <a href="mailto:support@this.sucks">support@this.sucks</a></div>';

$mail->AltBody = 'Just a heads up. The items below are about to expire: DOMAIN HERE - To review all your domains please log in to this.sucks. If you already have a credit card added to your account, no further action is required. Otherwise,
Please login to your account and update your credit card information.';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
    //header("Location: ../test-email");
    die();
}