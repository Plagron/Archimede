<?php
/**
 * Created by PhpStorm.
 * User: Manuel
 * Date: 08/03/2017
 * Time: 11:09
 */
include "DB_connection.php";

if (isset($_GET['email']))
{
    $email = filter_var($_GET['email'],FILTER_SANITIZE_EMAIL);
    $conn->query("DELETE FROM utenti WHERE utenti.email='".$email."'" );
    $conn->query("DELETE FROM docenti WHERE docenti.email='".$email."'");
}
include "../amministratore.php";
?>