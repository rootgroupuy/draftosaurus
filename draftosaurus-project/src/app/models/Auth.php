<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/conexion.php';

/**
 * AuthSystem: User authentication and registration logic
 * Uses table Usuario (id, username, password)
 */
class AuthSystem {
    private $db;

    public function __construct() {
        $this->db = new DatabaseConnection();
    }

    /**
     * Register a new user
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function registrarUsuario($username, $password) {
        if (empty($username) || empty($password)) {
            throw new Exception("Username and password required");
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        try {
            $stmt = $this->db->prepare("INSERT INTO Usuario (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hash);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            throw new Exception("Error registering user: " . $e->getMessage());
        }
    }

    /**
     * Authenticate user and start session
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function login($username, $password) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $stmt = $this->db->prepare("SELECT id, password FROM Usuario WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['usuario_id'] = $user['id'];
            return true;
        }
        return false;
    }
}
?>