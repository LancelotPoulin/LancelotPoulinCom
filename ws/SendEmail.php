<?php

$to      = 'poulinponnelle.lancelot@outlook.com';
$subject = 'LancelotPoulin.com : ' . $_POST["category"];
$message = $_POST["name"] . ' ' . $_POST["surname"] . ', ' . $_POST["age"] . ' ' . $_POST["gender"] . '\n' . $_POST["message"];
$headers = 'From: ' . $_POST["email"] . "\r\n" .
'Reply-To: ' . $_POST["email"] . "\r\n" .
'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

?>