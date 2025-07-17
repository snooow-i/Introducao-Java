<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta Corrente</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(to right, #00FF43, #1d8f35);
        }
        form {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fff; /* Cor de fundo da caixa */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Sombra suave */
        }
        h1 {
            text-align: center;
            color: #333; /* Cor do texto do cabeçalho */
            font-family: 'Tahoma', sans-serif;
            font-weight: 700; /* Ajuste o peso da fonte para dar uma aparência mais arredondada */
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333; /* Cor do texto dos rótulos */
            font-family: 'Tahoma', sans-serif;
            font-weight: 700;
        }
        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            font-family: 'Tahoma', sans-serif;
            font-weight: 500; /* Ajuste o peso da fonte para dar uma aparência mais arredondada */
        }
        button {
            width: 100%;
            padding: 12px;
            cursor: pointer;
            background-color: #00FF43;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Tahoma', sans-serif;
            font-weight: 700;
        }
        button:hover {
            background-color: #1d8f35;
        }
    </style>
</head>
<body>
    <?php
        // Exibir mensagens de feedback ao usuário
        if (isset($_GET['status'])) {
            if ($_GET['status'] === 'success') {
                echo '<p style="color: green;">Conta criada com sucesso!</p>';
            } elseif ($_GET['status'] === 'error') {
                echo '<p style="color: red;">Erro ao criar a conta. Tente novamente.</p>';
            }
        }
    ?>
    <form action="criar_conta.php" method="post">
        <h1>Criar Conta Corrente</h1>

        <label for="nome_cliente">Nome:</label>
        <input type="text" id="nome_cliente" name="nome_cliente" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required>

        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required>

        <button type="submit">Criar Conta</button>
    </form>
</body>
</html>
