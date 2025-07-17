<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agência Bancária - Brinks</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            background: linear-gradient(to left, #1D8F35, #00FF43);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(to right, #00FF43, #1d8f35);
            padding: 10px;
            color: #000;
            font-family: Tahoma, 'Adriana', sans-serif;
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
        }

        .botoes-barra-superior {
            display: flex;
            gap: 10px;
        }

        button {
            padding: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-family: Tahoma, Arial, sans-serif;
            background-color: #00FF43;
            color: #ffffff;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1d8f35;
        }

        .conteudo {
            position: relative;
            z-index: 1;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }

        input {
            padding: 10px;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .barra-inferior {
            background: linear-gradient(to right, #00FF43, #1d8f35);
            padding: 25px;
            position: absolute;
            bottom: 0;
            width: 100%;
            color: #000000;
        }

        .agencia-info {
            margin-left: 20px;
            font-family: Tahoma, 'Adriana', sans-serif;
        }

        .agencia-info p {
            margin: 0;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <header>
        <div class="botoes-barra-superior">
            <form method="post" action="">
                <button onclick="window.location.href='ExcluirConta.php'">Excluir Conta</button>
            </form>
            <button onclick="window.location.href='Gerenciabanco.php'">Sair do Site</button>
        </div>
    </header>
    <div class="conteudo">
        <h1 style="font-size: 24px;">Bem-vindo à sua conta bancária</h1>

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

        // Iniciar ou retomar a sessão
        session_start();

        // Verificar se o número da conta está na sessão
        if (isset($_SESSION['numero_conta'])) {
            $numeroConta = $_SESSION['numero_conta'];
        
        
            // Consultar o banco de dados para obter o CPF associado a essa conta
            $consulta = $conexao->query("SELECT cpf, saldo FROM contas WHERE numero_conta = $numeroConta");
        
            if (!$consulta) {
                die("Erro ao consultar o banco de dados: " . $conexao->error);
            }
        
            // Verificar se há resultados na consulta
            if ($consulta->num_rows > 0) {
                // Obter os resultados da consulta
                $resultado = $consulta->fetch_assoc();
        
                // Verificar se as informações foram obtidas antes de acessá-las
                if ($resultado) {
                    $cpf = $resultado["cpf"];
                    $saldo = $resultado["saldo"];
        
                    // Exibir as informações
                    echo "<p><strong>CPF:</strong> $cpf</p>";
                    echo "<p><strong>Número da Conta:</strong> $numeroConta</p>";
                    echo "<p><strong>Saldo:</strong> R$ $saldo</p>";
                } else {
                    echo "Erro: Nenhum resultado encontrado na consulta.";
                }
            } else {
                echo "Erro: Nenhuma conta encontrada para o número $numeroConta.";
            }
        } else {
            echo "Erro: Número da conta não encontrado na sessão.";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['realizar_deposito'])) {
            $valorDeposito = $_POST['valor_deposito'];
    
            // Validar o valor do depósito
            if (is_numeric($valorDeposito) && $valorDeposito > 0) {
                // Atualizar o saldo na tabela de contas
                $conexao->query("UPDATE contas SET saldo = saldo + $valorDeposito WHERE numero_conta = $numeroConta");
    
                // Redirecionar para evitar o reenvio do formulário
                header("Location: {$_SERVER['REQUEST_URI']}");
                exit();
            } else {
                echo "Erro: Valor de depósito inválido.";
            }
        }
        // Fechar a conexão com o banco de dados
        $conexao->close();
        ?>

        <!-- Formulário para depósito -->
        <form method="post" action="">
            <label for="valor_deposito">Depósito:</label>
            <input type="text" name="valor_deposito" id="valor_deposito" placeholder="Informe o valor">
            <button type="submit" name="realizar_deposito">Depositar</button>
        </form>

        <!-- Formulário para transferência -->
        <form method="post" action="">
            <label for="valor_transferencia">Transferência para conta:</label>
            <input type="text" name="valor_transferencia" id="valor_transferencia" placeholder="Informe o valor">
            <input type="text" name="conta_destino" placeholder="Número da Conta de Destino">
            <button type="submit" name="realizar_transferencia">Transferir</button>
        </form>
    </div>
    <div class="barra-inferior">
        <div class="agencia-info">
            <!-- Exibir informações da agência -->
            <p><strong>Número do Banco:</strong> (69)9910000</p>
            <p><strong>Endereço:</strong> Rua T-rex, 7576 - Rio Branco, Acre </p>
        </div>
    </div>
</body>

</html>