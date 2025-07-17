<?php
session_start();
?>

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
            overflow-x: hidden;
            /* Evita a barra de rolagem horizontal */
            background: linear-gradient(to bottom, #1D8F35, #00FF43);
            /* Gradiente de cima para baixo */
            min-height: 100vh;
        }

        header {
            background: linear-gradient(to right, #00FF43, #1d8f35);
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
            width: 100%;
        }

        img {
            width: 100%;
            height: 900px;
            display: block;
            margin-bottom: 0px;
            transition: transform 0.5s ease-in-out;
        }

        .barra-inferior {
            background: linear-gradient(to right, #00FF43, #1d8f35);
            /* Mesmo gradiente da barra superior */
            padding: 25px;
            position: absolute;
            bottom: 1;
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
    </style>
</head>

<body>
    <header>
        <div class="botoes-barra-superior">
            <button class="botao-header" onclick="window.location.href='CriarAgencia.php'">Criar Agência</button>
            <form method="post" action="">
                <button class="botao-header" type="submit" name="excluir_conta">Excluir Agência</button>
            </form>
            <button class="botao-header" onclick="window.location.href='Agências.php'">Agências</button>
        </div>
    </header>

    <div class="conteudo">
        <img id="backgroundImage" src="fundo1.jpg" alt="Imagem de Fundo">
    </div>

    <div class="barra-inferior">
        <div class="banco-info">
            <p><strong>Número do Banco:</strong> (69)9910000</p>
            <p><strong>Endereço:</strong> Rua T-rex, 7576 - Rio Branco, Acre </p>
        </div>
    </div>

    <script>
        let currentImageIndex = 1;
        const totalImages = 2;

        function changeBackground(direction) {
            currentImageIndex += direction;

            if (currentImageIndex > totalImages) {
                currentImageIndex = 1;
            } else if (currentImageIndex < 1) {
                currentImageIndex = totalImages;
            }

            document.getElementById('backgroundImage').src = `fundo${currentImageIndex}.jpg`;
        }

        // Alterar a imagem a cada 5 segundos
        setInterval(() => {
            changeBackground(1);
        }, 5000);
    </script>
</body>

</html>