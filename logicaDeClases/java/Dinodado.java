package logicaDeClases.java;

import java.util.Random;

public class Dinodado 
{
    // DEFINE LAS CARAS DEL DADO
    public enum DiceType {
        BOSQUE,
        ROCOSA,
        ASEOS,
        NOREX,
        NODINO,
        CAFE
    }

    private DiceType currentFace;
    private static final Random random = new Random();

    // CONSTRUCTOR DEL DADO 
    public Dinodado() {
        roll();
    }

    // LANZADA DE DADO
    public void roll() {
        DiceType[] faces = DiceType.values();
        int index = random.nextInt(faces.length);
        currentFace = faces[index];
    }

    // OBTENER LA CARA RESULTANTE DESPUES DEL ROLL DEL DADO
    public DiceType getCurrentFace() {
        return currentFace;
    }

    // METODO PARA MOSTRAR LA CARA DEL DADO
    public String toString() {
        return "Dice showing: " + currentFace.name();
    }

    // METODO PRINCIPAL PARA PROBAR EL DADO
    public static void main(String[] args) {
        Dinodado dice = new Dinodado();
        dice.roll();
        System.out.println("Cara resultante: " + dice.getCurrentFace());
    }
}
