<?php
include 'DB_connection.php';


$valid = $_GET['val'];
if(isset($valid)){
    if ($valid == 'nopay'){ //valori di risposta dal bottone di paypal da modificare
        include '../pagamento_paypal.html';
    }
    else if($valid == 'yepay'){
        //setting parametri DB x l'iscrizione dell'utente gia connesso ($_SESSION['email'])
    }
    else{
        echo "<p><h1>ERRORE DI RISPOSTA DI PAYPAL,LA PREGHIAMO DI CONTATTARE IL SERVIZIO CLIENTI RIPORTATO NEI CONTATTI.</h1></p>";
    }
}
else
{
    include '../pagamento_paypal.html';
}

?>