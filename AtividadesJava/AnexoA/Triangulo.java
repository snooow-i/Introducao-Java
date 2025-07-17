public class Triangulo {
    private double lado1;
    private double lado2;
    private double lado3;
    
    public Triangulo(double lado1, double lado2, double lado3) {
        this.lado1 = lado1;
        this.lado2 = lado2;
        this.lado3 = lado3;
    }
    
    public double calculaPerimetro() {
        return lado1 + lado2 + lado3;
    }
    
    public double calculaArea() {
        double p = calculaPerimetro() / 2;
        return Math.sqrt(p * (p - lado1) * (p - lado2) * (p - lado3));
    }
    
    public int tipo() {
        if (lado1 == lado2 && lado2 == lado3) {
            return 3; // Equilátero
        } else if (lado1 == lado2 || lado2 == lado3 || lado1 == lado3) {
            return 2; // Isósceles
        } else {
            return 1; // Escaleno
        }
    }
    
    public static void main(String[] args) {
        Triangulo triangulo = new Triangulo(3, 4, 5);
        System.out.println("Perímetro do triângulo: " + triangulo.calculaPerimetro());
        System.out.println("Área do triângulo: " + triangulo.calculaArea());
        System.out.println("Tipo do triângulo: " + triangulo.tipo());
    }
}
