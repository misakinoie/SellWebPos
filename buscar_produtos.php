<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["search"])) {
        $search = $_POST["search"];


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sellwebpos_data";
        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

 
        $sql = "SELECT * FROM produtos WHERE nome = '$search' OR cod = '$search'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $_SESSION["lista_compra"][] = $row;
            }


            $conn->close();
        } else {
            echo "Nenhum produto encontrado.";
 
            $conn->close();
        }
    } else {
        echo "Por favor, insira um termo de busca.";
    }
} else {
    echo "Método de requisição inválido.";
}


$total = 0;
foreach ($_SESSION["lista_compra"] as $produto) {
    $total += $produto['preco'];
}


echo "<h2></h2>";
echo "<ul>";
foreach ($_SESSION["lista_compra"] as $produto) {
    echo "<li>{$produto['nome']} - R$ {$produto['preco']}</li>";
}
echo "</ul>";

echo "<form method='post'>";
echo "<input type='submit' name='limpar' value='Limpar'>";
echo "</form>";


if (isset($_POST['limpar'])) {

    $_SESSION["lista_compra"] = array();

    $total = 0;

    header("Refresh:0");
}
?>
