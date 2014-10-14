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

if ($number === "" || $message === "" || $from === "") {
	echo '{"sent":false}';
} else {
	$sent = mail($to, $subject, $message, $headers);
	echo '{"sent":' . $sent . '}';
}

?>
