<?php
require_once 'Auth.php';
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';
$response = ['success' => false];
try {
    $auth = new AuthSystem();
    if ($auth->login($username, $password)) {
        $response['success'] = true;
    } else {
        $response['message'] = 'Credenciales incorrectas.';
    }
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}
echo json_encode($response);
?>
