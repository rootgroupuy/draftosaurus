<?php

    class Dinodado 
    {
        // DEFINE LAS CARAS DEL DADO
        private const DICE_TYPES = [
            'BOSQUE',
            'ROCOSA',
            'ASEOS',
            'NOREX',
            'NODINO',
            'CAFE'
        ];

        private string $currentFace;

        // CONSTRUCTOR DEL DADO
        public function __construct() {
            $this->roll();
        }

        // LANZADA DE DADO
        public function roll(): void {
            $index = random_int(0, count(self::DICE_TYPES) - 1);
            $this->currentFace = self::DICE_TYPES[$index];
        }

        // OBTENER LA CARA RESULTANTE DESPUES DEL ROLL DEL DADO
        public function getCurrentFace(): string {
            return $this->currentFace;
        }

        // METODO PARA MOSTRAR LA CARA DEL DADO
        public function __toString(): string {
            return "Cara resultante: {$this->currentFace}";
        }
    }

    // METODO PRINCIPAL PARA PROBAR EL DADO
    if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) {
        $dice = new Dinodado();
        $dice->roll();
        echo "Cara resultante: " . $dice->getCurrentFace() . "\n";
    }