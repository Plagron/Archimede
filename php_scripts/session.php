<?php
date_default_timezone_set('Europe/Rome');

include ('DB_connection.php');

session_start();

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date_create($date_1);
    $datetime2 = date_create($date_2);

    $interval = $datetime1->diff($datetime2);

    return $interval->format('%R%a');

}

$user = filter_var($_POST['login_mail'], FILTER_SANITIZE_EMAIL); //  FILTER_SANITIZE_EMAIL solo x la email.
$psw1 = filter_var($_POST['login_psw'],FILTER_SANITIZE_FULL_SPECIAL_CHARS); // ricordare di inserire i filtri anche nella registrazione (FILTER_SANITIZE_FULL_SPECIAL_CHARS x tutti!)
$psw = crypt($user, $psw1);

if(isset($user) && isset($psw)) {
    $loggato = $conn->query("SELECT * FROM utenti WHERE utenti.email = '" . $user . "' AND utenti.password = '" . $psw . "'");
    $rows = $loggato->fetch_assoc();                // contollo DB per trovare user e se la psw corrisponde tornando il risultato per l'if sotto.

    if ($loggato->num_rows != 0)
    {

        $loggato2 = $conn->query("SELECT * FROM docenti WHERE docenti.email='".$user."'");
        $rows2 = $loggato2->fetch_assoc();

        $_SESSION['isValid'] = true; //flag che tiene traccia se è presente una sessione.
        $_SESSION['user'] = $user;
        $_SESSION['password'] = $psw;
        $_SESSION['nome'] = $rows['nome'];
        $_SESSION['cognome']= $rows['cognome'];

        if ($loggato2->num_rows != 0)
        {
            $_SESSION['prof'] = true;
            $_SESSION['dataiscriz'] = $rows2['pagamento_iscrizione'];
            $date = date('Y-m-d');
            $_SESSION['ggAttività']=dateDifference($_SESSION['dataiscriz'],$date,'%a'); // variavile che memorizza i giorni di attività del profilo rispetto alla data di registrazione.

            if ( $_SESSION['ggAttività'] > 300)   // controllo Attività di un prof per settare il parametro.
            {
                $_SESSION['attivo'] = false;//$rows['attivo']; // il flag per individuare un professore NON attivo.
            }
            else
            {
                $_SESSION['attivo'] = true;  // il flag per individuare un professore NON attivo.
            }
        }
        else
        {
            $_SESSION['prof'] = false; // il flag per individuare uno studente.
        }

    }

}

else
{
    header("Location: ../utility_errore_login.php");   // ERRORE di login... user o psw errati.
    exit();
}

$admin = "Luca@school.it";

if($user==$admin && $psw==crypt($admin,"vittoria")) // controllo AMMINISTRATORE
{
    header("location: ../amministratore.php"); //reindirizzamento AMMINISTRATORE
    exit();
}


if(isset($_SESSION['isValid']))
{
    if ($_SESSION['prof'] == false)
    {
        header("location: ../studente_loggato.php");//Reindirizzamento pagina di profilo STUDENTE.
        exit();
    }
    else
    {
        if ($_SESSION['attivo'] == true)
        {
            header("location: ../docente_loggato.php");//Reindirizzamento pagina di profilo PROFESSORE.
            exit();
        }
        else
        {
            header("location: ../docente_loggato_nonAttivo.php"); //Reindirizzamento pagina PROFESSORE SCADUTO. (deve rinnovare l'abbonamento)
            exit();
        }
    }
}
else
{
    header("location: ../utility_not_logged.php"); // In caso la variabile di sessione non fosse settata.
    exit();
}

?>