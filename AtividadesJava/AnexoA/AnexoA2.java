import java.util.Scanner;

public class AnexoA2 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite uma string:");
        String input = scanner.nextLine();
        
        System.out.println("Caracteres da string:");
        for (int i = 0; i < input.length(); i++) {
            System.out.println(input.charAt(i));
        }
    }
}

