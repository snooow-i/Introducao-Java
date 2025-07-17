import java.util.Random;

public class Dado {
    public static void main(String[] args) {
        System.out.println("O valor do dado é: " + arremesso());
    }
    
    public static int arremesso() {
        Random rand = new Random();
        return rand.nextInt(6) + 1;
    }
}
