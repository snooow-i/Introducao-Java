public class Cone {
    private double raio;
    private double altura;

    public Cone(double raio, double altura) {
        if (raio < 0 || altura < 0) {
            throw new IllegalArgumentException("O raio e a altura não podem ser negativos.");
        }
        this.raio = raio;
        this.altura = altura;
    }

    public double calcularGeratriz() {
        return Math.sqrt(altura * altura + raio * raio);
    }

    public double calcularAreaLateral() {
        return Math.PI * raio * calcularGeratriz();
    }

    public double calcularAreaTotal() {
        return Math.PI * raio * (calcularGeratriz() + raio);
    }

    public double calcularVolume() {
        return (1.0/3.0) * Math.PI * raio * raio * altura;
    }
}
