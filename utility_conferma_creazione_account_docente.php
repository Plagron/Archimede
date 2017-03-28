<?php include 'header.php';
?>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <img href="#page-top" src="img/logo.png" width="300" height="300"> </img>
                <p>Complimenti il tuo account è stato creato</p>
                <p>Per attivare il tuo profilo devi effettuare<br>il pagamento di 50 euro per la quota di iscrizione annuale</p>
                <?php
                include 'php_scripts/check_paypal.php';
                ?>
            </div>
        </div>
    </header>

<?php include 'footer.php'; ?>