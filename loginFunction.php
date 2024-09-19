<?php
session_start();
require 'database.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $username = filter_var(trim($_POST['username'] ?? ''), FILTER_SANITIZE_STRING);
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password)) { 
        header('Location: loginForm.php?error=Username and password are required!');
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
                header('Location: loginForm.php?error=Invalid username or password!');
            }
        } else {
            header('Location: loginForm.php?error=Invalid username or password!');
        }

        $stmt->close();
    } else {
        header('Location: loginForm.php?error=An error occurred while processing your request.');
    }

    $mysqli->close();
} else {
    header('Location: loginForm.php?error=Invalid request method!');
}
?>
