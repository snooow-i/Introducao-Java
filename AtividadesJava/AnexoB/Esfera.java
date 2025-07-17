public class Esfera {
    private double raio;

    public Esfera(double raio) {
        if (raio < 0) {
            throw new IllegalArgumentException("O raio não pode ser negativo.");
        }
        this.raio = raio;
    }

    public double calcularArea() {
        return 4 * Math.PI * raio * raio;
    }

    public double calcularVolume() {
        return (4.0/3.0) * Math.PI * Math.pow(raio, 3);
    }
}
