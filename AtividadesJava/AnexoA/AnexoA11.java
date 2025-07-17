import java.util.Scanner;

public class AnexoA11 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite o tamanho do vetor:");
        int tamanho = scanner.nextInt();
        
        boolean[] vetor = new boolean[tamanho];
        int countTrue = 0;
        
        System.out.println("Digite os valores do vetor (true/false):");
        for (int i = 0; i < tamanho; i++) {
            vetor[i] = scanner.nextBoolean();
            if (vetor[i]) {
                countTrue++;
            }
        }
        
        System.out.println("Número de elementos iguais a true: " + countTrue);
    }
}
