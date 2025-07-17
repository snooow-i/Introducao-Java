import java.util.Scanner;

public class AnexoA5 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite uma string:");
        String input = scanner.nextLine();
        
        StringBuilder output = new StringBuilder();
        
        for (char c : input.toCharArray()) {
            if (Character.isDigit(c)) {
                output.append(c);
            }
        }
        
        System.out.println("String contendo somente os valores numéricos: " + output.toString());
    }
}
