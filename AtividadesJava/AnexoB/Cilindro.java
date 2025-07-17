public class Cilindro {
    private double raio;
    private double altura;

    public Cilindro(double raio, double altura) {
        if (raio < 0 || altura < 0) {
            throw new IllegalArgumentException("O raio e a altura não podem ser negativos.");
        }
        this.raio = raio;
        this.altura = altura;
    }

    public double calcularAreaLateral() {
        return 2 * Math.PI * raio * altura;
    }

    public double calcularAreaTotal() {
        return 2 * Math.PI * raio * (altura + raio);
    }

    public double calcularVolume() {
        return Math.PI * raio * raio * altura;
    }
}
