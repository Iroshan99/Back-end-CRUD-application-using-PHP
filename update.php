<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "UPDATE users SET name = :name, email = :email, age = :age WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['id' => $id, 'name' => $name, 'email' => $email, 'age' => $age]);

    echo "User updated successfully!";
}

$id = $_GET['1'];
$stmt = $conn->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();
?>

<form method="POST">
    <input type="hidden" name="1" value="<?php echo $user['1']; ?>">
    <label>Name: <input type="text" name="name" value="<?php echo $user['name']; ?>" required></label><br>
    <label>Email: <input type="email" name="email" value="<?php echo $user['email']; ?>" required></label><br>
    <label>Age: <input type="number" name="age" value="<?php echo $user['age']; ?>" required></label><br>
    <button type="submit">Update User</button>
</form>
