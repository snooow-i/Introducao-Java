import java.util.Scanner;

public class AnexoA12 {
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        
        System.out.println("Digite o tamanho do array:");
        int tamanho = scanner.nextInt();
        
        String[] array = new String[tamanho];
        int countLessThanTen = 0;
        
        System.out.println("Digite as strings do array:");
        for (int i = 0; i < tamanho; i++) {
            array[i] = scanner.next();
            if (array[i].length() < 10) {
                countLessThanTen++;
            }
        }
        
        System.out.println("Número de strings com menos de dez caracteres: " + countLessThanTen);
    }
}
