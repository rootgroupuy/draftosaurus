<?php

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