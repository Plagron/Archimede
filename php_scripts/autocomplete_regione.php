<?php

include ('DB_connection.php');

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