import java.util.Scanner;

public class AnexoA3 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite uma string:");
        String input = scanner.nextLine();
        
        System.out.println("Digite um valor numérico N:");
        int n = scanner.nextInt();
        
        if (n >= 0 && n <= input.length()) {
            String firstNChars = input.substring(0, n);
            System.out.println("Os primeiros " + n + " caracteres da string são: " + firstNChars);
        } else {
            System.out.println("O valor de N não é válido.");
        }
    }
}
