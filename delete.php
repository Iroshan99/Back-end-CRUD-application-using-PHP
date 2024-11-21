<?php
require 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $id]);

echo "User deleted successfully!";
?>

<a href="delete.php?id=1">Delete User 1</a>

