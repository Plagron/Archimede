<?php
include 'DB_connection.php';

$email = $_POST['email'];
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
TODO: aggiungere un link a una pagina per la modifica della password!
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
    echo "<p><h1>La email utilizzata non è registrata!</h1></p>";
}
?>