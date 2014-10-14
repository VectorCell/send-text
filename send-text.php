<?php

header('Content-Type: application/json');

$number  = $_GET["number"];
$to      = "$number@txt.att.net";
$subject = "sms";
$message = wordwrap($_GET["message"], 70, "\r\n");
$from    = $_GET["from"];

$headers = "From: " . $from . "\r\n" .
	"Reply-To: " . $from . "\r\n" .
	"X-Mailer: PHP/" . phpversion();

$sent = mail($to, $subject, $message, $headers);

echo "{\n";
if ($sent)
	echo "\t\"sent\":true\n";
else
	echo "\t\"sent\":false\n";
echo "\t\"number\":$number\n";
echo "\t\"to\":\"$to\"\n";
echo "\t\"from\":\"$from\"\n";
echo "\t\"message\":\"$message\"\n";

echo "}\n";
?>
