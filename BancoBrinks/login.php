<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "bancobrinks";

// Conectar ao banco de dados
$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Receber dados do formulário
    $cpf = $_POST["cpf"];
    $numeroConta = $_POST["numero_conta"];

    // Consultar se a conta existe no banco de dados
    $consulta = $conexao->query("SELECT * FROM contas WHERE cpf = '$cpf' AND numero_conta = $numeroConta");

    if (!$consulta) {
        die("Erro ao consultar o banco de dados: " . $conexao->error);
    }

    // Verificar se a conta foi encontrada
    if ($consulta->num_rows > 0) {
        // Iniciar ou retomar a sessão
        session_start();

        // Armazenar dados na sessão
        $_SESSION['cpf'] = $cpf;
        $_SESSION['numero_conta'] = $numeroConta;

        // Redirecionar para a página principal
        header("Location: banco.php");
        exit;
    } else {
        // Mensagem de erro se a conta não for encontrada
        echo "Conta não encontrada ou informações incorretas.";
    }
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>
