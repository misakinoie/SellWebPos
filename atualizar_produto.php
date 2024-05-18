<!-- atualizar_produto.php -->
<?php
// Verifica se o método de requisição é POST
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

    // Obtém os dados do formulário
    $cod = $_POST["cod"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    // Query para atualizar os dados do produto
    $sql = "UPDATE produtos SET nome='$nome', preco='$preco', quantidade='$quantidade' WHERE cod='$cod'";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado com sucesso!";
        // Redireciona para a página de consulta de produtos após o sucesso
        header("Location: consultar_produtos.php");
        exit();
    } else {
        echo "Erro ao atualizar o produto: " . $conn->error;
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
} else {
    // Redireciona para a página de consulta de produtos se o método de requisição não for POST
    header("Location: consultar_produtos.php");
    exit();
}
?>
