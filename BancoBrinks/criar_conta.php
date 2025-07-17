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
    $nomeCliente = $_POST["nome_cliente"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];

    // Iniciar a sessão
    session_start();

    // Verificar se o número da agência está na sessão e não é NULL
    if (isset($_SESSION['numero_agencia']) && $_SESSION['numero_agencia'] !== null) {
        // Recuperar o número da agência da sessão
        $numeroAgenciaFixo = $_SESSION['numero_agencia'];

        // Consultar a agência para obter o id_agencia
        $consultaAgencia = $conexao->query("SELECT id_agencia FROM agencias WHERE numero_agencia = $numeroAgenciaFixo");

        if (!$consultaAgencia) {
            die("Erro ao consultar o banco de dados: " . $conexao->error);
        }

        // Verificar se a agência foi encontrada
        if ($consultaAgencia->num_rows > 0) {
            $dadosAgencia = $consultaAgencia->fetch_assoc();
            $idAgencia = $dadosAgencia['id_agencia'];

            // Consultar o próximo número de conta disponível
            $consulta = $conexao->query("SELECT MAX(numero_conta) as max_conta FROM contas");

            if (!$consulta) {
                die("Erro ao consultar o banco de dados: " . $conexao->error);
            }

            $resultado = $consulta->fetch_assoc();
            $proximaConta = $resultado["max_conta"] + 1;

            // Inserir dados na tabela
            $sql = "INSERT INTO contas (nome_cliente, cpf, endereco, id_agencia, numero_conta, numero_agencia) VALUES ('$nomeCliente', '$cpf', '$endereco', $idAgencia, $proximaConta, $numeroAgenciaFixo)";

            if ($conexao->query($sql) === TRUE) {
                // Redirecionar para o site principal após a criação da conta
                header("Location: Agências.php");
                exit;
            } else {
                echo "Erro ao criar a conta: " . $conexao->error;
            }
        } else {
            echo "Erro: Agência não encontrada no banco de dados.";
        }
    } else {
        echo "Erro: Número da agência não encontrado ou é NULL na sessão.";
    }

    // Fechar a conexão com o banco de dados
    $conexao->close();
} else {
    echo "Erro: Método de requisição incorreto.";
}
?>
