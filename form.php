<?php
require_once "Mail.php";

$to = 'alexsigurdar@gmail.com';

$host = "ssl://smtp.gmail.com";
$port = "465";
$username = 'alexsigurdar@gmail.com';
$password = '4q2drYaVm6emp29Dd8EvtTR6ieeWPTf';

$name_field = $_POST['name'];
$email_field = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$body = "From: $name_field\n E-mail: $email_field\n Subject: $subject\n Message:\n $message";

$headers = array ('From' => $email_field, 'To' => $to, 'Subject' => $subject);
$smtp = Mail::factory('smtp',
array ('host' => $host,
'port' => $port,
'auth' => true,
'username' => $username,
'password' => $password));

$mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
echo($mail->getMessage());
} else {
echo("Your e-mail was successfully sent!\n");
}
?>















