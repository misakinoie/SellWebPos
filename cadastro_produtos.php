<!-- index.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Isso centraliza verticalmente */
            margin: 0;
        }

        form {
            width: 300px; /* Defina a largura do formulário conforme necessário */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h1{
            margin-left: 100px;
        }
    </style>

</head>

<body>
<?php include 'menu.php'; ?>

    <h1>Cadastro de Produto</h1>
    <form action="config.php" method="post">
        <label for="cod">Código:</label><br>
        <input type="text" id="cod" name="cod"><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="preco">Preço:</label><br>
        <input type="text" id="preco" name="preco"><br>
        <label for="quantidade">Quantidade em Estoque:</label><br>
        <input type="text" id="quantidade" name="quantidade"><br><br>
        <input type="submit" value="Salvar">
    </form>
</body>
</html>
