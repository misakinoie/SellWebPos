<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sellwebpos_data";
    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

 
    $cod = $_POST["cod"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $quantidade = $_POST["quantidade"];

    $sql = "UPDATE produtos SET nome='$nome', preco='$preco', quantidade='$quantidade' WHERE cod='$cod'";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado com sucesso!";
        header("Location: consultar_produtos.php");
        exit();
    } else {
        echo "Erro ao atualizar o produto: " . $conn->error;
    }


    $conn->close();
} else {

    header("Location: consultar_produtos.php");
    exit();
}
?>
