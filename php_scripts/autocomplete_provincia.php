<?php

include ('DB_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$term = $_GET['term'];
$regione = $_GET['regione'];

$query = $conn->query("SELECT DISTINCT provincia 
                        FROM comuni 
                        WHERE (regione = '".$regione."') AND (provincia LIKE '".$term."%') ORDER BY regione ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['provincia'];
}

$conn->close();

echo json_encode($data);
die();
?>