<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Vendas</title>
    <style>
        table{
            display: flex;
            margin: 200px auto auto 10%;
            border: none;
            padding: 15px;
            width: 80%;
        }

    </style>
</head>
<body>
<?php include 'menu.php'; ?>
    <h1>Consulta de Vendas</h1>

    <?php
    // Conexão com o banco de dados
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sellwebpos_data";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Consulta SQL para selecionar todas as vendas
    $sql = "SELECT * FROM vendas";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Exibe os dados das vendas em uma tabela
        echo "<table border='1'>
                <tr>
                    <th>ID Venda</th>
                    <th>Data e Hora</th>
                    <th>Total</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id_venda"] . "</td>
                    <td>" . $row["data_hora"] . "</td>
                    <td>R$ " . number_format($row["total"], 2, ',', '.') . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma venda encontrada.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>

</body>
</html>
