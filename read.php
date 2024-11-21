<?php
require 'db.php';

$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);
$users = $stmt->fetchAll();

foreach ($users as $user) {
    echo "ID: {$user['id']} - Name: {$user['name']} - Email: {$user['email']} - Age: {$user['age']}<br>";
}
?>