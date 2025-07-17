public class Paralelepipedo {
    private double altura;
    private double largura;
    private double comprimento;

    public Paralelepipedo(double altura, double largura, double comprimento) {
        this.altura = altura;
        this.largura = largura;
        this.comprimento = comprimento;
    }

    public double calcularVolume() {
        return altura * largura * comprimento;
    }

    public double calcularArea() {
        return 2 * (altura * largura + altura * comprimento + largura * comprimento);
    }
}
