<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agências Bancárias - Brinks</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative;
            overflow-x: hidden;
            background: linear-gradient(to bottom, #1D8F35, #00FF43);
            min-height: 100vh;
        }

        header {
            background: linear-gradient(to bottom, #00FF43, #1d8f35);
            padding: 5px;
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

        .botao-header {
            padding: 10px;
            margin: 5px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-family: Tahoma, Arial, sans-serif;
            background-color: #00FF43;
            color: #ffffff;
        }

        .botao-header:hover {
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

        .barra-inferior {
            background: linear-gradient(to bottom, #00FF43, #1d8f35);
            padding: 25px;
            position: absolute;
            bottom: 0;
            width: 100%;
            color: #000000;
        }

        .banco-info {
            margin-left: 20px;
            font-family: Tahoma, 'Adriana', sans-serif;
        }

        .banco-info p {
            margin: 0;
        }

        .contas-lista {
            margin-top: 20px;
        }

        .conta-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .botoes-acoes {
            display: flex;
            gap: 10px;
        }

        .botao-acao {
            padding: 10px;
            margin: 5px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            font-family: Tahoma, Arial, sans-serif;
            background-color: #00FF43;
            color: #ffffff;
            text-decoration: none;
            /* Removendo sublinhado padrão para links */
            display: inline-block;
        }

        .botao-acao:hover {
            background-color: #1d8f35;
        }
    </style>
</head>

<body>
    <header>
        <div class="botoes-barra-superior">
            <div class="botoes-acoes">
                <a class="botao-acao" href="Conta.php">Criar Conta</a>
                <a class="botao-acao" href="ContaLogin.php">Logar na Conta</a>
                <a class="botao-acao" href="Gerenciabanco.php">Sair do Site</a>
            </div>
        </div>
    </header>

    <div class="conteudo">
        <h1>Listagem de Contas</h1>

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

        session_start();
        // Inicializar a variável $agencia
        $agencia = array();
        if (
            isset($_SESSION['numero_agencia'], $_SESSION['nome_agencia'], $_SESSION['endereco_agencia'])
        ) {
            // Configurar as informações da agência a partir da sessão
            $agencia['numero_agencia'] = $_SESSION['numero_agencia'];
            $agencia['nome_agencia'] = $_SESSION['nome_agencia'];
            $agencia['endereco_agencia'] = $_SESSION['endereco_agencia'];

            // Consultar o banco de dados para obter as informações da agência
            $numeroAgencia = $agencia['numero_agencia'];

            $consultaAgencia = $conexao->query("SELECT * FROM agencias WHERE numero_agencia = '$numeroAgencia'");

            if (!$consultaAgencia) {
                die("Erro ao consultar o banco de dados: " . $conexao->error);
            }

            // Se houver resultados na consulta da agência
        
            $consultaContas = $conexao->query("SELECT * FROM contas WHERE numero_agencia = '$numeroAgencia'");
            if (!$consultaContas) {
                die("Erro ao consultar o banco de dados: " . $conexao->error);
            }

            // Se houver resultados na consulta de contas
            if ($consultaContas->num_rows > 0) {
                // Exibir as informações da conta
                while ($conta = $consultaContas->fetch_assoc()) {
                    echo "<div class='conta-item'>";
                    echo "<strong>Número da Conta:</strong> {$conta['numero_conta']}<br>";
                    echo "<strong>Nome do Cliente:</strong> {$conta['nome_cliente']}<br>";
                    echo "<strong>Saldo:</strong> R$ {$conta['saldo']}<br>";
                    echo "</div>";
                }
            } else {
                echo "Não há contas associadas a esta agência.";
            }
        }
        // Fechar a conexão com o banco de dados
        $conexao->close();
        ?>
    </div>

    <div class="barra-inferior">
        <div class="banco-info">
            <p><strong>Nome da Agência:</strong>
                <?php echo $_SESSION['nome_agencia']; ?>
            </p>
            <p><strong>Número da Agência:</strong>
                <?php echo $_SESSION['numero_agencia']; ?>
            </p>
            <p><strong>Endereço:</strong>
                <?php echo $_SESSION['endereco_agencia']; ?>
            </p>
        </div>
    </div>
</body>

</html>