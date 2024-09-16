<?php

require 'database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $bookImg = $_FILES['book_img']['name'];

    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($bookImg, PATHINFO_EXTENSION));
    $max_file_size = 2 * 1024 * 1024; // 

    if (!in_array($file_extension, $allowed_types)) {
        echo "Error: Only JPG, JPEG, PNG, and GIF files are allowed.";
        exit;
    }

    if ($_FILES['book_img']['size'] > $max_file_size) {
        echo "Error: File size exceeds 2MB limit.";
        exit;
    }

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($bookImg);

    if (move_uploaded_file($_FILES["book_img"]["tmp_name"], $target_file)) {
        $stmt = $mysqli->prepare("INSERT INTO books (Title, book_img) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $bookImg);

        // Execute the query
        if ($stmt->execute()) {
            echo "New book added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading the file.";
    }
}
?>
