<!DOCTYPE html>
<html lang="itq">
<?php session_start(); ?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archimede School</title>

    <link rel="icon" href="img/icona.ico" />


    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/creative.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top">

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="index.php">Archimede</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="#studente">ricerca docenti</a>
                </li>
                <li>
                    <a class="page-scroll" href="#contact">Contatti</a>
                </li>
                <li>
                    <a class="page-scroll" href="utility_pages/informazioni.php">Info</a>
                </li>
                <?php if(!isset($_SESSION['isValid'])){ ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="post" action="php_scripts/session.php" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="login_mail">Indirizzo email</label>
                                                <input type="email" class="form-control" name="login_mail" id="login_mail" placeholder="Indirizzo email" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="login_psw">Password</label>
                                                <input type="password" class="form-control" name="login_psw" id="login_psw" placeholder="Password" required>
                                                <div class="help-block text-right"><a href="">Hai dimenticato la password ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Entra</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Rimani loggato
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown mega-dropdown active">
                        <a href="#" class="page-scroll" data-toggle="dropdown">Registrati <span class="caret"></span></a>
                        <div class="dropdown-menu mega-dropdown-menu">
                            <div class="container-fluid">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <ul class="nav-list list-inline">
                                        <li>
                                            <a href="registra_studente.php" class="btn btn-primary btn-block page-scroll">Registrazione <br> Studente</a>
                                        </li>
                                        <li>
                                            <a href="registra_docente.php" class="btn btn-primary btn-block page-scroll">Registrazione <br> Docente</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php }
                else
                {?>
                    <li class="dropdown mega-dropdown active">
                        <a href="#" class="page-scroll" data-toggle="dropdown"><?php echo $_SESSION['nome']; echo " "; echo $_SESSION['cognome'] ?> <span class="caret"></span></a>
                        <div class="dropdown-menu mega-dropdown-menu">
                            <div class="container-fluid">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <ul class="nav-list list-inline">
                                        <li>
                                            <a class="page-scroll" href="php_scripts/logout.php">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>