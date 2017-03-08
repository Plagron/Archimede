<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 02/03/2017
 * Time: 11:17
 */
include "php_scripts/DB_connection.php";
?>
<body style="background-color: #9d9d9d">
<div>
    <p><h1>Buongiorno Luca!</h1></p>
    <a href="php_scripts/logout.php">ESCI</a><br><br><br>
</div>
<div>
    <table style="text-align: center; border-style: groove; border-spacing: 10px; padding: 10px; ">
        <tr>DOCENTI</tr>
        <tr>
            <td><h3>E-Mail</h3></td>
            <td><h3>Nome</h3></td>
            <td><h3>Cognome</h3></td>
            <td><h3>Data Iscrizione</h3></td>
            <td><h3>Indirizzo</h3></td>
            <td><h3>Sesso</h3></td>
        </tr>
<?php
$loggato = $conn->query("SELECT * FROM utenti,docenti WHERE utenti.email=docenti.email ORDER BY data_iscrizione DESC ");

    while ($docenti = mysqli_fetch_array($loggato)) {
        $email = $docenti["email"];
        $nome = $docenti["nome"];
        $cognome = $docenti["cognome"];
        $indirizzo = $docenti["indirizzo"];
        $sesso = $docenti["sesso"];
        $data_iscrizione = $docenti["data_iscrizione"];
        echo "<tr><td>".$email."</td><td>".$nome."</td><td>".$cognome."</td><td>".$data_iscrizione."</td><td>".$indirizzo."</td><td>".$sesso."</td><td><a href='php_scripts/delete_docente.php?email=$email'>elimina</a></td></tr>";
    }

?>
    </table><br><br>
    <table style="text-align: center; border-style: groove; border-spacing: 10px; padding: 10px; ">
        <tr>STUDENI</tr>
        <tr>
            <td><h3>E-Mail</h3></td>
            <td><h3>Nome</h3></td>
            <td><h3>Cognome</h3></td>
            <td><h3>Data Iscrizione</h3></td>
            <td><h3>Indirizzo</h3></td>
            <td><h3>Sesso</h3></td>
        </tr>
<?php
    $loggato = $conn->query("SELECT * FROM utenti,studenti WHERE utenti.email=studenti.email ORDER BY data_iscrizione DESC ");

    while ($studenti = mysqli_fetch_array($loggato)) {
        $email = $studenti["email"];
        $nome = $studenti["nome"];
        $cognome = $studenti["cognome"];
        $indirizzo = $studenti["indirizzo"];
        $sesso = $studenti["sesso"];
        $data_iscrizione = $studenti["data_iscrizione"];
        echo "<tr><td>".$email."</td><td>".$nome."</td><td>".$cognome."</td><td>".$data_iscrizione."</td><td>".$indirizzo."</td><td>".$sesso."</td><td><a href='php_scripts/delete_studene.php?email=$email'>elimina</a></td></tr>";
    }

?>
    </table><br>
</div>
</body>