<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sellwebpos_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cod = $_POST['cod'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos (cod, nome, preco, quantidade) VALUES ('$cod', '$nome', '$preco', '$quantidade')";

    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o produto: " . $conn->error;
    }
}

$conn->close();
?>
