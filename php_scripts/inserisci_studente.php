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

$email = $_POST['email'];
$psw = crypt($email, $_POST['password']);
$password = password_hash($psw, PASSWORD_DEFAULT);
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$indirizzo = $_POST['indirizzo'];
$data_nascita_gg = $_POST['data_nascita_gg'];
$data_nascita_mm = $_POST['data_nascita_mm'];
$data_nascita_aa = $_POST['data_nascita_aa'];
$data_nascita = $data_nascita_aa."-".$data_nascita_mm."-".$data_nascita_gg;
$sesso = $_POST['sesso'];
$comune = $_POST['comune'];
$cellulare = $_POST['cellulare'];
$indirizzo_scolastico = $_POST['indirizzo_scolastico'];
$anno_frequentazione = $_POST['anno_frequentazione'];

$query_comune="SELECT istat FROM comuni WHERE comune = '$comune'";
$result_comune = $conn->query($query_comune);
$row = $result_comune->fetch_assoc();
$codice_comune = $row['istat'];

// Check account existence
$check="SELECT * FROM utenti WHERE email = '$email'";
$result = $conn->query($check);
if($result->num_rows){
    $conn->close();
    header('Location: ../utility_utente_già_presente.php');
}
else {

    $query = "INSERT INTO utenti
          (email, password, nome, cognome, indirizzo, data_nascita, sesso, comune, data_iscrizione)
          VALUES
          ('$email', '$password', '$nome', '$cognome', '$indirizzo', '$data_nascita', '$sesso', '$comune', '$date');";

    $query2 = "INSERT INTO studenti
          (email, cellulare, indirizzo_scolastico, anno_frequentazione)
          VALUES
          ('$email', '$cellulare', '$indirizzo_scolastico', '$anno_frequentazione');";

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