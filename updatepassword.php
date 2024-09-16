<?php
require 'database.php'; 

$users = [
    ['username' => 'admin', 'password' => '123456'],
];

foreach ($users as $user) {
    $username = $user['username'];
    $password = password_hash($user['password'], PASSWORD_BCRYPT); 

    if ($stmt = $mysqli->prepare('UPDATE users SET password = ? WHERE username = ?')) {
        $stmt->bind_param('ss', $password, $username);
        $stmt->execute();
        
        if ($stmt->error) {
            echo "Error updating user $username: " . $stmt->error . "<br>";
        } else {
            echo "Password updated for $username<br>";
        }

        $stmt->close(); 
    } else {
        echo "Error preparing statement: " . $mysqli->error . "<br>";
    }
}

$mysqli->close(); 
?>
