<!-- consultar_produtos.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Produtos</title>
    <link rel="stylesheet" href="style.css">

</head>
<?php include 'menu.php'; ?>
<body>
    <h1 class="titulo">Consultar Produtos</h1>
    <form class="formulario" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="search">Pesquisar por Código ou Nome:</label><br>
        <input type="text" id="search" name="search">
        <input type="submit" value="Pesquisar">
    </form>
    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexão com o banco de dados (assumindo que já foi criada)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sellwebpos_data";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Processamento da pesquisa
        $search = $_POST["search"];
        $sql = "SELECT * FROM produtos WHERE cod = '$search' OR nome LIKE '%$search%'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostra os resultados da pesquisa
            echo "<h2>Resultados da Pesquisa:</h2>";
            echo "<table>";
            echo "<tr><th>Código</th><th>Nome</th><th>Preço</th><th>Quantidade em Estoque</th><th>Ações</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["cod"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["preco"] . "</td>";
                echo "<td>" . $row["quantidade"] . "</td>";
                echo "<td><a href='editar_produto.php?cod=" . $row["cod"] . "'>Editar</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum resultado encontrado.";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    }
    ?>
</body>
</html>
