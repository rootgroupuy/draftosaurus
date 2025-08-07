<?php
// --- API para recibir jugadores desde el front-end ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $data = json_decode(file_get_contents('php://input'), true);
    $players = $data['players'] ?? [];
    if (count($players) < 2 || count($players) > 5) {
        echo json_encode(['success' => false, 'message' => 'Número de jugadores inválido']);
        exit;
    }
    require_once 'conexion.php';
    try {
        $db = new DatabaseConnection();
        $pdo = $db->getPdo();
        $pdo->beginTransaction();
        $inserted = 0;
        foreach ($players as $name) {
            $stmt = $pdo->prepare('INSERT INTO Jugador (nombre) VALUES (:nombre)');
            $stmt->bindParam(':nombre', $name);
            if ($stmt->execute()) {
                $inserted++;
            }
        }
        $pdo->commit();
        if ($inserted === count($players)) {
            echo json_encode(['success' => true, 'message' => 'Jugadores guardados correctamente en la base de datos.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'No todos los jugadores se guardaron correctamente.']);
        }
    } catch (Exception $e) {
        if (isset($pdo) && $pdo->inTransaction()) $pdo->rollBack();
        echo json_encode(['success' => false, 'message' => 'Error al guardar jugadores: ' . $e->getMessage()]);
    }
    exit;
}

// --- Lógica de la clase original ---
class Dinomano {
    private $dinosaurios = [];
    private $maxDinosauriosPorUsuario = 6;

    public function __construct() {
        $this->dinosaurios = array();
    }

    /**
     * Asigna dinosaurios a un usuario específico
     * @param int $idUsuario ID del usuario
     * @param array $dinosauriosAsignados Array de dinosaurios para asignar
     * @return bool True si la asignación fue exitosa, False si no
     */
    public function asignarDinosaurios($idUsuario, $dinosauriosAsignados) {
        if (count($dinosauriosAsignados) != $this->maxDinosauriosPorUsuario) {
            return false;
        }

        $this->dinosaurios[$idUsuario] = $dinosauriosAsignados;
        return true;
    }

    /**
     * Obtiene los dinosaurios asignados a un usuario
     * @param int $idUsuario ID del usuario
     * @return array|null Array de dinosaurios o null si el usuario no tiene asignaciones
     */
    public function obtenerDinosauriosUsuario($idUsuario) {
        return isset($this->dinosaurios[$idUsuario]) ? $this->dinosaurios[$idUsuario] : null;
    }

    /**
     * Limpia las asignaciones de dinosaurios de un usuario
     * @param int $idUsuario ID del usuario
     */
    public function limpiarDinosauriosUsuario($idUsuario) {
        if (isset($this->dinosaurios[$idUsuario])) {
            unset($this->dinosaurios[$idUsuario]);
        }
    }

    /**
     * Verifica si un usuario tiene el número correcto de dinosaurios asignados
     * @param int $idUsuario ID del usuario
     * @return bool True si tiene el número correcto, False si no
     */
    public function verificarCantidadDinosaurios($idUsuario) {
        return isset($this->dinosaurios[$idUsuario]) && 
               count($this->dinosaurios[$idUsuario]) === $this->maxDinosauriosPorUsuario;
    }
}