
<?php
ini_set('SMTP', 'smtp.live.com.');
ini_set('smtp_port', 587);
// the message
$msg = "User: manuel32@hotmail.it\nPassword: ciaociao";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);
$headers = "From: manuel32@hotmail.it";
// send email
mail("manuel32@hotmail.it","ArchimedeSchool_Recovery",$msg,$headers);
//header("Location: ../index.php");
?>

?>