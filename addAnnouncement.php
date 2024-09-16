<?php
require 'database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['announcement_text'];

    $stmt = $mysqli->prepare("INSERT INTO announcements (content) VALUES (?)");

    if ($stmt === false) {
        die("Error preparing the statement: " . $mysqli->error);
    }

    $stmt->bind_param("s", $content);

    if ($stmt->execute()) {
        echo "Announcement added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
