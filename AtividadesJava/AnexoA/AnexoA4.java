import java.util.Scanner;

public class AnexoA4 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite uma string:");
        String input = scanner.nextLine();
        
        String output = input.replaceAll("[aeiouAEIOU]", "?");
        
        System.out.println("String após trocar as vogais não acentuadas por '?': " + output);
    }
}
