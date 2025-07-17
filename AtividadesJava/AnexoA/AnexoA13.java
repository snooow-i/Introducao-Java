import java.util.Scanner;

public class AnexoA13 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite uma frase:");
        String frase = scanner.nextLine();
        
        if (frase.contains("-help") || frase.contains("-h")) {
            System.out.println("A frase contém '-help' ou '-h'.");
        } else {
            System.out.println("A frase não contém '-help' ou '-h'.");
        }
    }
}
