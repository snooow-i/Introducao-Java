import java.util.HashSet;
import java.util.Random;
import java.util.Set;

public class Main {
    public static void main(String[] args) {
        Set<Integer> numerosSorteados = new HashSet<>();
        Random rand = new Random();
        
        while (numerosSorteados.size() < 50) {
            numerosSorteados.add(rand.nextInt(100));
        }
        
        System.out.println("Números sorteados: " + numerosSorteados);
    }
}
