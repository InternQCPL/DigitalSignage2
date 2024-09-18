<?php
session_start();
require 'database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $username = filter_var(trim($_POST['username'] ?? ''), FILTER_SANITIZE_STRING);
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) { 
        echo 'Username and password are required!';
        exit;
    }

    // Prepare and execute query
    if ($stmt = $mysqli->prepare("SELECT user_id, password FROM users WHERE username = ?")) {
        $stmt->bind_param("s", $username);  
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $stored_password);
            $stmt->fetch();

            // Compare passwords
            if ($password === $stored_password) {
                $_SESSION['user_id'] = $user_id;
                header('Location: admin_dashboard.php');
                exit;
            } else {
                echo 'Invalid username or password!';
            }
        } else {
            echo 'Invalid username or password!';
        }

        $stmt->close();
    } else {
        echo 'An error occurred while processing your request.';
    }

    $mysqli->close();
} else {
    echo 'Invalid request method!';
}
?>
