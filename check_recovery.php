
<?php
include 'header.php';
?>
<header><br><br><br><br>
    <form action="php_scripts/recovery_psw_email.php" method="POST">
        <p>Recupera la tua password!</p>
        <input type="email"  placeholder="Email *" name="email" id="email" required/><br><br>
        <input type="email"  placeholder="Conferma Email" id="conferma_email" required/><br><br>
        <input type="submit" value="invia">
    </form>
</header>
<script src="js/validator.js"></script>