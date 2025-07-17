import java.util.Scanner;

public class AnexoA1 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite uma string com pelo menos 10 caracteres:");
        String input = scanner.nextLine();
        
        while (input.length() < 10) {
            System.out.println("A string deve ter pelo menos 10 caracteres. Tente novamente:");
            input = scanner.nextLine();
        }
        
        System.out.println("A string digitada é: " + input);
    }
}
