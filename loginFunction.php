<?php
session_start();
require 'database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) {
        echo 'Username and password are required!';
        exit;
    }

    if ($stmt = $mysqli->prepare("SELECT user_id, password FROM users WHERE username = ?")) {
        $stmt->bind_param("s", $username);  
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $stored_password);
            $stmt->fetch();

            //TEMPORARY NO HASHED PASSWORD
            if ($password === $stored_password) {
                $_SESSION['user_id'] = $user_id;
                header('Location: admin_dashboard.php');
                exit;
            } else {
                echo 'Invalid password!';
            }
        } else {
            echo 'Invalid username or password!';
        }

        $stmt->close();
    } else {
        echo 'Error preparing statement: ' . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo 'Invalid request method!';
}
?>
