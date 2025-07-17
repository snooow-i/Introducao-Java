public class Retangulo {
    private double comprimento;
    private double largura;

    public Retangulo(double comprimento, double largura) {
        if (comprimento < 0 || largura < 0) {
            throw new IllegalArgumentException("O comprimento e a largura não podem ser negativos.");
        }
        this.comprimento = comprimento;
        this.largura = largura;
    }

    public double calcularPerimetro() {
        return 2 * (comprimento + largura);
    }

    public double calcularArea() {
        return comprimento * largura;
    }
}
