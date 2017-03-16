
<?php

include ('DB_connection.php');

require('PHPMailer/class.phpmailer.php');
$mail=new PHPMailer();

$mail->CharSet = 'UTF-8';

$body = 'User: manuel32@hotmail.it\nPassword: ciaociao';

$mail->isSMTP();
$mail->Host       = 'mail.archimedeschool.it';

$mail->SMTPSecure = 'tls';
$mail->Port       = 25;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;

$mail->Username   = 'info@archimedeschool.it';
$mail->Password   = 'xmgA5044M';

$mail->setFrom('info@archimedeschool.it', 'ArchimedeSchool');
$mail->addReplyTo('manuel32@hotmail.it','no-reply');
$mail->Subject = 'Recovery';
$mail->msgHTML($body);


$mail->send();

?>

