<?php

$to = "joaquimrafael30@hotmail.com";
$subject = "Teste envio de email";
$message = "blablabla";
$headers = 'MIME-version: 1.0'."\r\n";
$header = 'Content-type: text/html; charset=iso-8858-1'."\r\n";
$headers .= 'From: <joaquimrafael30@hotmail.com>'."\r\n";

mail($to, $subject, $message, $headers);
?>