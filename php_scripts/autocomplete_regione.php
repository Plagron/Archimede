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

$term = $_GET['term'];

$query = $conn->query("SELECT DISTINCT regione FROM comuni WHERE regione LIKE '".$term."%' ORDER BY regione ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['regione'];
}

$conn->close();

echo json_encode($data);
die()
?>