<?php

    class Dinobolsa {

        // ARRAY QUE DEFINE LA ESPECIE DE LOS DINOSAURIOS QUE SE PUEDEN ENCONTRAR EN LA BOLSA
        private const DINOSAUR_TYPES = [
            'T-REX',
            'TRICERATOPS',
            'VELOCIRAPTOR',
            'STEGOSAURIO',
            'BRAQUIOSAURIO',
            'PTERODACTILO'
        ];

        private array $bag;
        private static int $users = 2;

        // METODO QUE DEFINE LA CANTIDAD DE DINOSAURIOS QUE SE PUEDEN ENCONTRAR EN LA BOLSA DEBIDO A LA CANTIDAD DE USUARIOS
        public function usersPlaying(): int 
        {
            $BAG_SIZE = 0;

            if (self::$users == 2) 
            {
                $BAG_SIZE = 48;
            }

            elseif (self::$users == 3) 
            
            {
                $BAG_SIZE = 36;
            }

            elseif (self::$users == 4) 
            {
                $BAG_SIZE = 48;
            }
            
            elseif (self::$users == 5) 
            {
                $BAG_SIZE = 60;
            }

            else 
            {
                fwrite(STDERR, "error: numero de usuarios invalido\n");
            }

            return $BAG_SIZE;
        }


        // METODO CONSTRUCTOR DE LA BOLSA DE DINOS CON ESPECIES DE MANERA ALEATORIA
        public function __construct() 
        {
            $BAG_SIZE = $this->usersPlaying();
            $this->bag = array_fill(0, $BAG_SIZE, '');
            for ($i = 0; $i < $BAG_SIZE; $i++) 
            {
                $this->bag[$i] = $this->getRandomDinosaur();
            }
        }

        // METODO QUE RETORNA UNA ESPECIE DE DINOSAURIO DE MANERA ALEATORIA
        private function getRandomDinosaur(): string 
        {
            $index = random_int(0, count(self::DINOSAUR_TYPES) - 1);
            return self::DINOSAUR_TYPES[$index];
        }

        // METODO QUE IMPRIME EL CONTENIDO DE LA BOLSA DE DINOSAURIOS
        public function printBag(): void 
        {
            echo "Dino bolsa contiene:\n";
            $count = 1;

            foreach ($this->bag as $dino) 
            {
                printf("%2d: %s\n", $count++, $dino);
            }
        }
    }

    // METODO MAIN 
    if (basename(__FILE__) == basename($_SERVER['PHP_SELF'])) 
    {
        $dinoBag = new Dinobolsa();
        $dinoBag->printBag();
    }

?>