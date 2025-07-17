public class Piramide {
    private double base;
    private double altura;

    public Piramide(double base, double altura) {
        this.base = base;
        this.altura = altura;
    }

    public double calcularVolume() {
        return (1.0 / 3.0) * base * altura;
    }
}
