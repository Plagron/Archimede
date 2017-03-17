
<?php

include ('DB_connection.php');

require 'PHPMailer/PHPMailerAutoload.php';
$mail=new PHPMailer();

//$mail->CharSet = 'UTF-8';


$mail->isSMTP();
$mail->Host       = 'prohosting3.netsons.net';

$mail->SMTPSecure = 'tls';
$mail->Port       = 465;
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = true;
$mail->Username   = 'info@archimedeschool.it';
$mail->Password   = 'xmgA5044M';

$mail->setFrom('info@archimedeschool.it', 'ArchimedeSchool');
$mail->addAddress('manuel32@hotmail.it', 'Manuel');
$mail->Subject = 'Recovery';
$mail->Body     = 'User: manuel32@hotmail.it\nPassword: ciaociao';

if(!$mail->send()) {
    echo 'Message was not sent.';
    echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

?>

