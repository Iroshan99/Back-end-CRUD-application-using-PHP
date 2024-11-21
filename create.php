<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $age=$_POST['age'];

    $sql="insert into users (name,email,age) values (:name,:email,:age)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['name' => $name, 'email' => $email, 'age' => $age]);

    echo "User added successfully!";
}

?>

<form method="POST">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <label>Age: <input type="number" name="age" required></label><br>
    <button type="submit">Add User</button>
</form>