<?php
date_default_timezone_set('Europe/Rome');
$servername = "localhost";
$username = "root";
$password = "";
$database = "my_archischool";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

session_start();

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = date_diff($datetime2, $datetime1);

    return $interval->format($differenceFormat);

}

$user = filter_var($_POST['login_mail'], FILTER_SANITIZE_EMAIL); //  FILTER_SANITIZE_EMAIL solo x la email.
$psw = filter_var($_POST['login_psw'],FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ricordare di inserire i filtri anche nella registrazione (FILTER_SANITIZE_FULL_SPECIAL_CHARS x tutti!)

if(isset($user) && isset($psw)) {
    $loggato = $conn->query("SELECT * FROM utenti WHERE utenti.email = '" . $user . "' AND utenti.password = '" . $psw . "'");
    $rows = $loggato->fetch_assoc();                // contollo DB per trovare user e se la psw corrisponde tornando il risultato per l'if sotto.

    if ($loggato->num_rows != 0)
    {

        $loggato2 = $conn->query("SELECT * FROM docenti WHERE docenti.email='".$user."'");
        $rows2 = $loggato2->fetch_assoc();

        $_SESSION['isValid'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $psw;
        $_SESSION['nome'] = $rows['nome'];
        $_SESSION['cognome']= $rows['cognome'];

        if ($loggato2->num_rows != 0)
        {
            $_SESSION['prof'] = 1;
            $_SESSION['dataiscriz'] = $rows2['pagamento_iscrizione'];
            $date = date('Y-m-d');
            if ((dateDifference($date,$_SESSION['dataiscriz'],'%a')) < 0)   // <-------!!!!!!!!!!!!!!!!!!!!da sistemare
            {
                $_SESSION['attivo'] = 0;//$rows['attivo']; // il flag per individuare un professore iscritto da uno NON
            }
            else
            {
                $_SESSION['attivo'] = 1;
            }
        }
        else
        {
            $_SESSION['prof'] = 0;
        }

    }

}

else
{
    header("Location: ../err_login.php");   // ERRORE di login... user o psw errati.
    exit();
}



if($user=="Luca@school.it" && $psw=="vittoria") // controllo AMMINISTRATORE
{
    header("location: ../amministratore.php"); //reindirizzamento AMMINISTRATORE
    exit();
}


if(isset($_SESSION['isValid']))
{
    if ($_SESSION['prof'] == 0)
    {
        header("location: ../studente_loggato.php");//Reindirizzamento pagina di profilo STUDENTE.
        exit();
    }
    else
    {
        if ($_SESSION['attivo'] == 1)
        {
            header("location: ../docente_loggato.php");//Reindirizzamento pagina di profilo PROFESSORE.
            exit();
        }
        else
        {
            header("location: ../docente_scaduto.php"); //Reindirizzamento pagina PROFESSORE SCADUTO. (deve rinnovare l'abbonamento)
            exit();
        }
    }
}
else
{
    header("location: ../not_login.php"); // In caso la variabile di sessione non fosse settata.
    exit();
}

?>