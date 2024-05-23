<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if (isset($_GET["cod"])) {
        $cod = $_GET["cod"];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sellwebpos_data";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM produtos WHERE cod = '$cod'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <h1>Editar Produto</h1>
            <form action="atualizar_produto.php" method="post">
                <input type="hidden" name="cod" value="<?php echo $row['cod']; ?>">
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>"><br>
                <label for="preco">Preço:</label><br>
                <input type="text" id="preco" name="preco" value="<?php echo $row['preco']; ?>"><br>
                <label for="quantidade">Quantidade em Estoque:</label><br>
                <input type="text" id="quantidade" name="quantidade" value="<?php echo $row['quantidade']; ?>"><br><br>
                <input type="submit" value="Salvar">
            </form>
            <?php
        } else {
            echo "Produto não encontrado.";
        }

        $conn->close();
    } else {
        echo "Código do produto não fornecido.";
    }
    ?>
</body>
</html>
