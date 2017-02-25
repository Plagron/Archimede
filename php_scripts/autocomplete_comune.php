<?php

include ('DB_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$term = $_GET['term'];
$provincia = $_GET['provincia'];

$query = $conn->query("SELECT DISTINCT comune
                        FROM comuni
                        WHERE (provincia = '".$provincia."') AND (comune LIKE '".$term."%')
                        ORDER BY comune ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['comune'];
}

$conn->close();

echo json_encode($data);
die();
?>