public class Paciente {
    private String nome;
    private double peso;
    private double altura;

    public Paciente(String nome, double peso, double altura) {
        this.nome = nome;
        this.peso = peso;
        this.altura = altura;
    }

    public double calcularIMC() {
        return peso / (altura * altura);
    }

    public String calcularFaixaPeso() {
        double imc = calcularIMC();
        if (imc < 20) {
            return "Abaixo do peso ideal";
        } else if (imc >= 20 && imc <= 25) {
            return "Peso normal";
        } else if (imc > 25 && imc <= 30) {
            return "Excesso de peso";
        } else if (imc > 30 && imc <= 35) {
            return "Obesidade";
        } else {
            return "Obesidade mórbida";
        }
    }
}
