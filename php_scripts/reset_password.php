<?php
include'../header.php';
include'DB_connection.php';


if(isset($_POST['password']) && isset($_GET['val'])){
    $email = filter_var($_GET['val'],FILTER_SANITIZE_EMAIL);
    $psw = filter_var(crypt($email,$_POST['password']),FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $conn->query("UPDATE utenti SET password = '".$psw."' WHERE email = '". $email."'");
    include'../index.php';
}
{
    echo '<p><h1>errore, modifica password non eseguita! <br>contattare info@archimedeschoool.it</h1></p><br>';
    echo '<p><h1>Torna alla<a href="../index.php"> Home Page</a></h1></p> ';
}
?>