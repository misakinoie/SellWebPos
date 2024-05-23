<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['id_venda']) && isset($_POST['data_hora']) && isset($_POST['total'])) {

        $id_venda = $_POST['id_venda'];
        $data_hora = $_POST['data_hora'];
        $total = $_POST['total'];


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "sellwebpos_data";
        $conn = new mysqli($servername, $username, $password, $dbname);


        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }


        $sql = "INSERT INTO vendas (id_venda, data_hora, total) VALUES ('$id_venda', '$data_hora', '$total')";
        if ($conn->query($sql) === TRUE) {
            echo "Venda realizada com sucesso!";

            header("refresh:3; url=realizar_compra.php");
            exit; 
        } else {
            echo "Erro ao realizar a venda: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Dados incompletos para processar a venda.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
