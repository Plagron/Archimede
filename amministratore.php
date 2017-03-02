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
    <a href="php_scripts/logout.php">ESCI</a><br><br><br><br><br>
</div>
<div>
    <table style="text-align: center; border-style: groove; border-spacing: 5px; padding: 5px; ">
        <tr>
            <td><h3>E-Mail</h3></td>
            <td><h3>Nome</h3></td>
            <td><h3>Cognome</h3></td>
            <td><h3>Data Iscrizione</h3></td>
            <td><h3>Indirizzo</h3></td>
            <td><h3>Sesso</h3></td>
        </tr>
<?php
$loggato = $conn->query("SELECT * FROM utenti ORDER BY data_iscrizione DESC ");
$rows = $loggato->fetch_row();
if($rows > 0) {
    while ($utenti = mysqli_fetch_array($loggato)) {
        $email = $utenti["email"];
        $nome = $utenti["nome"];
        $cognome = $utenti["cognome"];
        $indirizzo = $utenti["indirizzo"];
        $sesso = $utenti["sesso"];
        $data_iscrizione = $utenti["data_iscrizione"];
        echo "<tr><td>".$email."</td><td>".$nome."</td><td>".$cognome."</td><td>".$data_iscrizione."</td><td>".$indirizzo."</td><td>".$sesso."</td><td><a href='index.php?email=$email'>elimina</a></td></tr>";
    }
}
?>
    </table>
</div>
</body>