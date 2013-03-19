<?php
// Mailer.php

// Peter Novotnak :: 2013

require_once('auth.php');

$fields = [];
$i = 0;


foreach($_REQUEST['headers'] as $header){
  $fields[ filter_var($header, FILTER_SANITIZE_STRING) ] = filter_var($_REQUEST['data'][$i++]);
}


$description = $fields['Description'];
$amount = $fields['Amount'];
$day = $fields['Day Debited'];


$name = $fields['Name'];
$email = $fields['Email'];
$subject = "Sector67 {$description} Statement";
$message = "Hello {$name},</p>
<br>
<br>
<p>This is an automatically generated letter to notify you of pending payment for goods/services/membership at Sector67.
Since you have set up direct transfer payment from your checking account you can ignore this message as funds will be
<b>debited automatically by the 25th</b> of this month.</p>

<p><b>Pending transaction information:</b><br>
Membership February | \${$amount}</p>

<p>If you believe this message to be in error please notify Sector67 staff immediately either by team@sector67.org 
or preferably by phone at 608-241-4605
Thank you for your continued support!</p>
<br>
<p>-Sector67 Billing Robot</p>
";

$headers = 'MIME-Version: 1.0' . "\r\n" .
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Sector67 Team <team@sector67.org>' . "\r\n";

mail(
  "{$name} <{$email}>",
  $subject,
  $message,
  $headers
)


?>