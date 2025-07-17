public class Pessoa {
    private String nome;
    private int idade;
    private double peso;
    private double altura;

    public Pessoa(String nome, int idade, double peso, double altura) {
        this.nome = nome;
        this.idade = idade;
        this.peso = peso;
        this.altura = altura;
    }

    public double calcularIMC() {
        return peso / (altura * altura);
    }

    public static void main(String[] args) {
        Pessoa pessoa = new Pessoa("Fulano", 30, 70.0, 1.75);
        System.out.println("IMC da pessoa: " + pessoa.calcularIMC());
    }
}
