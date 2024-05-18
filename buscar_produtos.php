<!-- buscar_produtos.php -->
<?php
session_start(); // Inicia a sessão

// Verifica se o formulário de busca foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo de busca não está vazio
    if (!empty($_POST["search"])) {
        // Termo de busca
        $search = $_POST["search"];

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

        // Consulta SQL para buscar produtos pelo nome exato ou código
        $sql = "SELECT * FROM produtos WHERE nome = '$search' OR cod = '$search'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Adiciona os produtos encontrados à lista de compra na sessão
            while ($row = $result->fetch_assoc()) {
                $_SESSION["lista_compra"][] = $row;
            }

            // Fecha a conexão com o banco de dados
            $conn->close();
        } else {
            echo "Nenhum produto encontrado.";
            // Fecha a conexão com o banco de dados
            $conn->close();
        }
    } else {
        echo "Por favor, insira um termo de busca.";
    }
} else {
    echo "Método de requisição inválido.";
}

// Calcular o total dos preços dos produtos na lista de compra
$total = 0;
foreach ($_SESSION["lista_compra"] as $produto) {
    $total += $produto['preco'];
}

// Exibe a lista de produtos e o total
echo "<h2></h2>";
echo "<ul>";
foreach ($_SESSION["lista_compra"] as $produto) {
    echo "<li>{$produto['nome']} - R$ {$produto['preco']}</li>";
}
echo "</ul>";
// echo "<h2>" . number_format($total, 2, ',', '.') . "</h2>";

// Botão para limpar a lista de compra e resetar o total
echo "<form method='post'>";
echo "<input type='submit' name='limpar' value='Limpar'>";
echo "</form>";

// Verifica se o botão "Limpar" foi clicado
if (isset($_POST['limpar'])) {
    // Limpa a lista de compra
    $_SESSION["lista_compra"] = array();
    // Reseta o total para zero
    $total = 0;
    // Redireciona para a mesma página para atualizar a exibição
    header("Refresh:0");
}
?>
