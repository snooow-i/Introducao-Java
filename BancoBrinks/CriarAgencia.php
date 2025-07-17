<?php
// CriarAgencia.php
session_start();
$mensagem = ""; // Inicializa a mensagem vazia

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Obter os dados do formulário
    $nomeAgencia = $_POST['nome_agencia'];
    $numeroAgencia = $_POST['numero_agencia'];
    $enderecoAgencia = $_POST['endereco_agencia'];

    // Validar e inserir os dados na tabela 'agencias'
    if (!empty($nomeAgencia) && is_numeric($numeroAgencia) && !empty($enderecoAgencia)) {
        $conexao->query("INSERT INTO agencias (nome_agencia, numero_agencia, endereco_agencia) VALUES ('$nomeAgencia', $numeroAgencia, '$enderecoAgencia')");
    
        // Obter o ID da agência recém-inserida
        $idDaAgencia = $conexao->insert_id;
    
        // Consultar as informações da agência no banco de dados
        $consultaAgencia = $conexao->query("SELECT * FROM agencias WHERE id_agencia = $idDaAgencia");
    
        if ($consultaAgencia) {
            $agencia = $consultaAgencia->fetch_assoc();
    
            // Configurar informações da agência na sessão
            $_SESSION['nome_agencia'] = $agencia['nome_agencia'];
            $_SESSION['numero_agencia'] = $agencia['numero_agencia'];
            $_SESSION['endereco_agencia'] = $agencia['endereco_agencia'];
    
            // Redirecionar para Agencias.php após o sucesso
            header("Location: Agências.php");
            exit();
        } else {
            $mensagem = "Erro ao obter informações da agência do banco de dados.";
        }
    } else {
        $mensagem = "Por favor, preencha todos os campos corretamente.";
    }
    
    // Fechar a conexão com o banco de dados
    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Agência - Brinks</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            background: linear-gradient(to bottom, #1D8F35, #00FF43);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            flex-direction: column; /* Alteração para exibir elementos verticalmente */
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Defina a largura do formulário conforme necessário */
        }
        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px; /* Ajuste o espaçamento conforme necessário */
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #00FF43;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #1d8f35;
        }
        p {
            color: #fff;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Criar Nova Agência</h1>

    <!-- Formulário para criar uma nova agência -->
    <form method="post" action="">
        <label for="nome_agencia">Nome da Agência:</label>
        <input type="text" name="nome_agencia" required>
        <br>
        <label for="numero_agencia">Número da Agência:</label>
        <input type="number" name="numero_agencia" required>
        <br>
        <label for="endereco_agencia">Endereço da Agência:</label>
        <input type="text" name="endereco_agencia" required>
        <br>
        <button type="submit">Criar Agência</button>
    </form>

    <!-- Exibir mensagem após criar a agência -->
    <?php if (!empty($mensagem)): ?>
        <p><?= $mensagem ?></p>
    <?php endif; ?>
</body>
</html>
