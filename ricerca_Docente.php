<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 01/03/2017
 * Time: 17:00
 */
include ('php_scripts/DB_connection.php');
include 'header.php';
?>

<body style="background-image: url('img/head.jpg');  background-attachment: fixed; background-repeat: no-repeat; height: 100%">
    <br><br><br><br>
    <div style="align-items: center; align-content: center; display: inline">
        <?php
        if(isset($_SESSION['isValid']) && $_SESSION['isValid']) {
            $loggato = $conn->query("SELECT * FROM utenti,docenti WHERE utenti.email=docenti.email ORDER BY data_iscrizione DESC ");
            while ($docenti = mysqli_fetch_array($loggato)) {
                $nome = $docenti["nome"];
                $cognome = $docenti["cognome"];
                echo " </div><div><img href=\"#page-top\" src=\"img/logo.png\" width=\"300\" height=\"300\"> </img> </div>";
                echo "<div style='-webkit-text-fill-color: white;'>" . $nome . " " . $cognome . "</div>";
            }
        }
        else
        {
            include 'registra_studente.php';
        }
        ?>

    </div>
</body>
<?php include 'footer.php'; ?>



