<?php
date_default_timezone_set('Europe/Rome');
$date = date('Y-m-d');


$servername = "localhost";
$username = "root";
$password = "";
$database = "my_archischool";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$email = $_POST['email'];
$password = $_POST['password'];
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
          (email, cellulare, disp_lun, disp_mar, disp_mer, disp_gio, disp_ven, disp_sab, disp_dom, prezzo_ora, pagamento_iscrizione, vuole_voto)
          VALUES
          ('$email', '$cellulare', '$disp_lun', '$disp_mar', '$disp_mer', '$disp_gio', '$disp_ven', '$disp_sab', '$disp_dom','$prezzo_ora','$date','$vuole_voto');";

    $conn -> query($query);
    $res = $conn -> query($query2);

    if ($res === TRUE) {
        $conn->close();
        header('Location: ../utility_conferma_creazione_account.php');
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
    $conn->close();
}
?>