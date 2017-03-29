<?php
include 'header.php';
include 'php_scripts/DB_connection.php';

if(isset($_GET['val'])) {

    $email = $_GET['val'];
    $check = $conn->query("SELECT * FROM utenti WHERE utenti.email = '" . $email . "'");

    if ($check->num_rows != 0) {
        echo '<br><br><form action="php_scripts/reset_password.php?val=$email" method="POST">';
        echo '<input type="password"  placeholder="Password [Min 8 caratteri] *" name="password" id="password" required minlength="8"/><br><br>';
        echo '<input type="password"  placeholder="Conferma Password" id="conferma_password" required/><br><br>';
        echo '<input id="submit_btn" type="submit" value="Salva">';
    }
    else{
        echo '<br><br><p><h1>Il link inserito non è corretto, riprova!</h1></p>';
    }
}
include 'footer.php';
?>
<script src="js/validator.js"></script>
