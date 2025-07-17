public class Funcionario {
    private String nome;
    private String cpf;
    private int horasTrabalhadas;
    private double valorHoraTrabalho;

    public Funcionario(String nome, String cpf, int horasTrabalhadas, double valorHoraTrabalho) {
        this.nome = nome;
        this.cpf = cpf;
        this.horasTrabalhadas = horasTrabalhadas;
        this.valorHoraTrabalho = valorHoraTrabalho;
    }

    public double calcularSalario() {
        return horasTrabalhadas * valorHoraTrabalho;
    }
}
