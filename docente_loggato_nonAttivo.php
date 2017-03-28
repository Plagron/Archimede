<?php include 'header.php'; ?>

<header>
    <div class="header-content">
        <div class="header-content-inner">
            <img href="#page-top" src="img/logo.png" width="300" height="300"> </img>
            <p>Salve, <?php echo $_SESSION['nome']?>, le ricordo che deve rinnovare l'abbinamento al servizio</p>
        </div>
        <?php include 'php_scripts/pagamento_paypal.html'; ?>
    </div>
</header>

<?php include 'footer.php'; ?>
