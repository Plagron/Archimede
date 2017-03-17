<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 01/03/2017
 * Time: 17:00
 */
include ('php_scripts/DB_connection.php');
include 'header.php';

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = $datetime1->diff($datetime2);

    return $interval->format('%R%a');

}
?>
<header style="background-image: url('img/head.jpg');  background-attachment: fixed; background-repeat: no-repeat; height: 100%; max-height: inherit">
    <br><br><br><br>
    <div style="align-items: center; align-content: center; display: inline;">
        <?php
        if(isset($_SESSION['isValid']) && $_SESSION['isValid']) {
            $loggato = $conn->query("SELECT * FROM utenti,docenti WHERE utenti.email=docenti.email ORDER BY data_iscrizione DESC ");
            while ($docenti = mysqli_fetch_array($loggato)) {

                $date = date('Y-m-d');
                $data_iscrizione= $docenti['pagamento_iscrizione'];
                $giorni_attività = dateDifference($data_iscrizione,$date,'%a');
                //controllo validità iscrizione
                if($giorni_attività < 365){
                    $email = $docenti['email'];
                    $nome = $docenti["nome"];
                    $cognome = $docenti["cognome"];
                    $sesso = $docenti["sesso"];
                    $materie = $docenti["materie"];

                    if ($sesso == "M") {
                        echo " </div><div><img href=\"#page-top\" src=\"img/default_doc.png\" width=\"200\" height=\"200\"> </img> </div>";
                    } else {
                        echo " </div><div><img href=\"#page-top\" src=\"img/default_docF.png\" width=\"200\" height=\"200\"> </img> </div>";
                    }
                    echo "<div style='-webkit-text-fill-color: black; align-content: center'>" . $email . "<br> " . $nome . " " . $cognome . "<br>".$materie."</div>";
                }
            }
        }
        else
        {
            include 'registra_studente.php';
        }
        ?>

    </div>
</header>


