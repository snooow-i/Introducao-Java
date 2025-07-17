<?php
// Iniciar ou retomar a sessão
session_start();

// Se o botão "Excluir Conta" foi pressionado
if (isset($_POST['excluir_conta'])) {
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

    // Verificar se o número da conta está na sessão
    if (isset($_SESSION['numero_conta'])) {
        $numeroConta = $_SESSION['numero_conta'];

        // Excluir a conta do banco de dados
        $conexao->query("DELETE FROM contas WHERE numero_conta = $numeroConta");
        header("Location: Gerenciabanco.php");
        exit(); // Certifique-se de parar a execução após redirecionar
    } else {
        echo "Erro: Número da conta não encontrado na sessão.";
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
}
?>
