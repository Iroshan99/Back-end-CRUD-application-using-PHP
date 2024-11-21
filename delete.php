<?php
require 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id'])) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id' => $data['id']]);

        echo json_encode(['message' => 'User deleted successfully']);
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
    }
}
?>
