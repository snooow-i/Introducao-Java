<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contas - Brinks</title>
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

        .titulo-lista {
            text-align: center;
            color: #00FF43;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>

    <div class="conteudo">
        <h1 class="titulo-lista">Lista de Contas</h1>
        <div class="botoes-acoes">
                <a class="botao-acao" href="Agências.php">Ir para Agências</a>
                <a class="botao-acao" href="Conta.php">Criar Conta</a>
                <a class="botao-acao" href="ContaLogin.php">Logar na Conta</a>
                <a class="botao-acao" href="banco.php">Ir para Banco</a>
                <a class="botao-acao" href="Gerenciabanco.php">Gerenciar Banco</a>
        </div>
        <?php
        // Seu código PHP anterior aqui
        ?>
    </div>

    <div class="barra-inferior">
        <div class="banco-info">
            <!-- Informações do banco aqui -->
        </div>
    </div>
</body>

</html>
