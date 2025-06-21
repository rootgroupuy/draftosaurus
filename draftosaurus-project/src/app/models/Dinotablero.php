<?php

    class DinoTablero 
    {
        private ?array $historial = [];
        private int $maxHistorialEntries = 10;

        public function __construct() 
        {
            // Constructor preparado para futuras inicializaciones
        }

        // MÉTODO PARA GUARDAR EL RESULTADO EN EL HISTORIAL
        private function guardarResultado(string $zona): void 
        {
            $resultado = [
                'zona' => $zona,
                'fecha' => date('Y-m-d H:i:s')
            ];
        
            array_unshift($this->historial, $resultado);
        
            // Mantener solo las últimas entradas según maxHistorialEntries
            if (count($this->historial) > $this->maxHistorialEntries) 
            {
                array_pop($this->historial);
            }
        }

        // MÉTODO PARA OBTENER EL HISTORIAL DE RESULTADOS
        public function obtenerHistorial(): array 
        {
            return $this->historial;
        }

        // MÉTODO PRINCIPAL PARA DETERMINAR LA ZONA DEL TABLERO
        public function zonasTablero(): string 
        {
            // CREA UNA INSTANCIA DEL DADO
            require_once __DIR__ . '/Dinodado.php';
            $dice = new Dinodado();
            // LANZA EL DADO
            $dice->roll();
            // OBTIENE LA CARA RESULTANTE
            $result = $dice->getCurrentFace();

            $r = "";
            // CADENA DE SWITCH PARA DETERMINAR LA ZONA DE JUEGO
            switch($result) 
            {
                case 'BOSQUE':
                    $r = "solo se podra colocar un dino en la zona de bosque";
                break;

                case 'ROCOSA':
                    $r = "solo se podra colocar un dino en la zona rocosa";
                break;

                case 'NODINO':
                    $r = "solo se podra colocar un dino en la zona donde no haya un dino";
                break;

                case 'NOREX':
                    $r = "solo se podra colocar un dino en la zona donde no haya un t-rex";
                break;
                
                case 'CAFE':
                    $r = "solo se podra colocar un dino en la zona cafe";
                break;

                case 'ASEOS':
                    $r = "solo se podra colocar un dino en la zona de aseos";
                break;
            }

            // GUARDA EL RESULTADO EN EL HISTORIAL
            $this->guardarResultado($r);

            return $r;
        }
    }

    // EJEMPLO DE USO
    if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) 
    {
        $tablero = new DinoTablero();
        echo $tablero->zonasTablero() . "\n";

        // MOSTRAR HISTORIAL
        echo "\nHistorial de últimas jugadas:\n";

        foreach($tablero->obtenerHistorial() as $resultado) 
        {
            echo "{$resultado['fecha']}: {$resultado['zona']}\n";
        }
    }

    echo "{$resultado['fecha']}: {$resultado['zona']}\n";
    
?>