<?php
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


$query = "DELETE FROM utenti";
$query2 = "DELETE FROM studenti";
$query3 = "DELETE FROM docenti";

$conn->query($query);
$conn->query($query2);
$conn->query($query3);

header('Location: index.php');
?>