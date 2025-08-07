<?php
require_once 'Auth.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';
$response = ['success' => false];
try {
    $auth = new AuthSystem();
    $db = new DatabaseConnection();
    $pdo = $db->getPdo();
    // Verificar si el usuario ya existe
    $stmt = $pdo->prepare('SELECT id FROM Usuario WHERE username = :username');
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    if ($stmt->fetch()) {
        $response['message'] = 'El usuario ya existe.';
    } else {
        $auth->registrarUsuario($username, $password);
        $response['success'] = true;
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}
echo json_encode($response);
?>
