<?php
require_once "Mail.php";

$to = 'alex@strangecousins.se';

$host = "ssl://mailout.one.com";
$port = "465";
$username = 'alex@strangecousins.se';
$password = 'H62l2DuZZtu8KVGGN6kT';

$name_field = $_POST['name'];
$email_field = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$body = "From: $name_field\n E-mail: $email_field\n Subject: $subject\n Message:\n $message";

$headers = array ('From' => $to, 'To' => $to, 'Subject' => $subject);
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
