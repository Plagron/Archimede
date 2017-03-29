<?php
include 'DB_connection.php';

$email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$check = $conn->query("SELECT * FROM utenti WHERE utenti.email = '" . $email . "'");

if($check ->num_rows != 0) {
    $to = $email;
    $subject = "Recovery";
    ini_set('SMTP', 'prohosting3.netsons.net');
    ini_set('smtp_port', 465);
    $message = "
<html>
<head>
<title>Archimedeschool Recovery</title>
</head>
<body>
<p>Clicca sul link seguente per reimpostare la email!</p>
    <a href='www.archimedeschool.it/rpsw.php?val=$email'>reimposta la password.</a>
</body>
</html>
";

// Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
    $headers .= 'From: <info@archimedeschool.it>' . "\r\n";

    mail($to, $subject, $message, $headers);

    echo "<p><h1>email inviata con successo!</h1></p>";
}
else
{
    echo "<p><h1>La email di cui si vuole reimpostare la password non è registrata!</h1></p>";
}
?>