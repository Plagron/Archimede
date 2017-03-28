<?php
include 'DB_connection.php';



if(isset($_GET['val'])){
    $valid = $_GET['val'];
    if ($valid == 'xmgnorfs'){ //valori di risposta dal bottone di paypal da modificare
        include 'pagamento_paypal.html';
    }
    else if($valid == 'ramyegwa'){
        echo "<p><h1>ACCOUNT ATTIVO</h1></p>";
        $datapagamento = new DateTime();
        $datapagamento = date_format($datapagamento, 'Y-m-d');
        $conn->query("UPDATE docenti SET pagamento_iscrizione = DATE '".$datapagamento."' WHERE email = '". $_SESSION['user']."'");
    }
    else{
        echo "<p><h1>ERRORE DI RISPOSTA DI PAYPAL,LA PREGHIAMO DI CONTATTARE IL SERVIZIO CLIENTI RIPORTATO NEI CONTATTI.</h1></p>";
    }
}
else
{
    include 'pagamento_paypal.html';
}

?>