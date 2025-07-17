public class Funcionario2 {
    private String nome;
    private double salario;
    private int numFilhos;

    public Funcionario2(String nome, double salario, int numFilhos) {
        this.nome = nome;
        this.salario = salario;
        this.numFilhos = numFilhos;
    }

    public void calcularAumentoSalario(double porcentagem) {
        salario *= (1 + porcentagem / 100);
    }

    public double calcularDescontoIRPF() {
        return 1250.25 * numFilhos;
    }

    public double calcularINSS() {
        if (salario <= 2545.00) {
            return salario * 0.06;
        } else {
            return salario * 0.10;
        }
    }
}
