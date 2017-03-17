<?php
date_default_timezone_set('Europe/Rome');
session_start();
$date = date('Y-m-d');

include ('DB_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = filter_var(crypt($email, $_POST['password']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$nome = filter_var($_POST['nome'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cognome = filter_var($_POST['cognome'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$indirizzo = filter_var($_POST['indirizzo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$data_nascita_gg = filter_var($_POST['data_nascita_gg'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$data_nascita_mm = filter_var($_POST['data_nascita_mm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$data_nascita_aa = filter_var($_POST['data_nascita_aa'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$data_nascita = filter_var($data_nascita_aa."-".$data_nascita_mm."-".$data_nascita_gg, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$sesso = filter_var($_POST['sesso'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$comune = filter_var($_POST['comune'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$cellulare = filter_var($_POST['cellulare'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$materie = filter_var($_POST['materie'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Disponibility Check
$disp_lun = false;
$disp_mar = false;
$disp_mer = false;
$disp_gio = false;
$disp_ven = false;
$disp_sab = false;
$disp_dom = false;
if (isset($_POST['disp'])) {
    $optionArray = $_POST['disp'];
    for ($i=0; $i<count($optionArray); $i++) {
        if($optionArray[$i] == "lun"){
            $disp_lun = true;
        }
        if($optionArray[$i] == "mar"){
            $disp_mar = true;
        }
        if($optionArray[$i] == "mer"){
            $disp_mer = true;
        }
        if($optionArray[$i] == "gio"){
            $disp_gio = true;
        }
        if($optionArray[$i] == "ven"){
            $disp_ven = true;
        }
        if($optionArray[$i] == "sab"){
            $disp_sab = true;
        }
        if($optionArray[$i] == "dom"){
            $disp_dom = true;
        }
    }
}

$prezzo_ora = $_POST['prezzo_ora'];

//Votation Check
$vuole_voto = false;
if($_POST['vuole_voto'] == 'true')
    $vuole_voto = true;


$query_comune="SELECT istat FROM comuni WHERE comune = '$comune'";
$result_comune = $conn->query($query_comune);
$row = $result_comune->fetch_assoc();
$codice_comune = $row['istat'];

// Check account existence
$check="SELECT * FROM utenti WHERE email = '$email'";
$result = $conn->query($check);
if($result->num_rows){
    $conn->close();
    header('Location: ../utility_pages/utility_utente_già_presente.php');
}
else {

    $query = "INSERT INTO utenti
          (email, password, nome, cognome, indirizzo, data_nascita, sesso, comune, data_iscrizione)
          VALUES
          ('$email', '$password', '$nome', '$cognome', '$indirizzo', '$data_nascita', '$sesso', '$comune', '$date');";

    $query2 = "INSERT INTO docenti
          (email, cellulare, disp_lun, disp_mar, disp_mer, disp_gio, disp_ven, disp_sab, disp_dom, prezzo_ora, pagamento_iscrizione, vuole_voto, materie)
          VALUES
          ('$email', '$cellulare', '$disp_lun', '$disp_mar', '$disp_mer', '$disp_gio', '$disp_ven', '$disp_sab', '$disp_dom','$prezzo_ora','$date','$vuole_voto','$materie');";

    $conn -> query($query);
    $res = $conn -> query($query2);

    if ($res === TRUE) {
        $_SESSION['isValid'] = true; //flag che tiene traccia se è presente una sessione.
        $_SESSION['user'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['nome'] = $nome;
        $_SESSION['cognome']= $cognome;
        $conn->close();
        header('Location: ../utility_conferma_creazione_account.php');
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    $conn->close();
}
?>