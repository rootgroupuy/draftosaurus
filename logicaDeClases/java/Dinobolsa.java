package logicaDeClases.java;

import java.util.Random;

public class Dinobolsa {
    public enum DinosaurType {
        T_REX, TRICERATOPS, VELOCIRAPTOR, STEGOSAURUS, BRACHIOSAURUS, PTERODACTYL
    }

    private DinosaurType[] bag;
    private static final int users = 5;
    private static final Random random = new Random();

    public int usersPlaying() {

        int BAG_SIZE;

        if (users == 2)
        {
            BAG_SIZE = 48;
        }

        else if (users == 3)
        {
            BAG_SIZE = 36;
        }

        else if (users == 4)
        {
            BAG_SIZE = 48;
        }

        else if (users == 5)
        {
            BAG_SIZE = 60;
        }

        else
        {
            System.err.println("error: numero de usuarios invalido");
        }
        
        return BAG_SIZE;

    }
    public Dinobolsa() {
        int BAG_SIZE = usersPlaying();
        bag = new DinosaurType[BAG_SIZE];
        for (int i = 0; i < BAG_SIZE; i++) {
            bag[i] = getRandomDinosaur();
        }
    }

    private DinosaurType getRandomDinosaur() {
        DinosaurType[] types = DinosaurType.values();
        int index = random.nextInt(types.length);
        return types[index];
    }

    public void printBag() {
        System.out.println("Dinosaur bag contents:");
        int count = 1;
        for (DinosaurType dino : bag) {
            System.out.printf("%2d: %s\n", count++, dino.name());
        }
    }

    public static void main(String[] args) {
        Dinobolsa dinoBag = new Dinobolsa();
        dinoBag.printBag();
    }
}
