<?php

header('Content-Type: application/json');

$number  = $_GET["number"];
$to      = "$number@txt.att.net";
$subject = "sms";
$message = $_GET["message"];
$from    = $_GET["from"];

$headers = "From: " . $from . "\r\n" .
	"Reply-To: " . $from . "\r\n" .
	"X-Mailer: PHP/" . phpversion();

$sent = mail($to, $subject, $message, $headers);

if ($sent)
	echo '{"sent":true}';
else
	echo '{"sent":false}';
?>
