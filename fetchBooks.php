<?php
require 'database.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM books";
$result = $mysqli->query($sql);

$books = [];

while ($row = $result->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books);
?>
