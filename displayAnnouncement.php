<?php
require 'database.php'; 

header('Content-Type: application/json');

$sql = "SELECT * FROM announcements ORDER BY AnnouncementID DESC LIMIT 1"; 
$result = $mysqli->query($sql);

if ($result === false) {
    die(json_encode(["error" => "Error fetching announcements: " . $mysqli->error]));
}

$announcements = [];

if ($row = $result->fetch_assoc()) {
    $announcements[] = $row;
}

echo json_encode($announcements);

$result->free();
$mysqli->close();
?>
