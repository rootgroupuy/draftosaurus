package logicaDeClases.java;
public class Dinotablero 
{
    
    public static String zonasTablero()
    {
        // CREA UNA INSTANCIA DEL DADO
        Dinodado dice = new Dinodado();
        // LANZA EL DADO
        dice.roll();
        // OBTIENE LA CARA RESULTANTE
        Dinodado.DiceType result = dice.getCurrentFace();

        String r = "";
        // CADENA DE IF PARA DETERMINAR LA ZONA DE JUEGO
        if (result == Dinodado.DiceType.BOSQUE) 
        {
            r = "solo se podra colocar un dino en la zona de bosque";    
        }
        else if (result == Dinodado.DiceType.ROCOSA)
        {
            r = "solo se podra colocar un dino en la zona rocosa";
        }
        else if (result == Dinodado.DiceType.NODINO)
        {
            r = "solo se podra colocar un dino en la zona donde no haya un dino";
        }
        else if(result == Dinodado.DiceType.NOREX)
        {
            r = "solo se podra colocar un dino en la zona donde no haya un t-rex";
        }
        else if(result == Dinodado.DiceType.CAFE)
        {
            r = "solo se podra colocar un dino en la zona cafe";
        }
        else if(result == Dinodado.DiceType.ASEOS)
        {
            r = "solo se podra colocar un dino en la zona de aseos";
        }

        return r;
    }
    
    public static void main(String[] args) 
    {   
        System.out.println(zonasTablero());
    }
}

