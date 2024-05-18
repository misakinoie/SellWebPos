<?php
// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos obrigatórios foram recebidos
    if (isset($_POST['id_venda']) && isset($_POST['data_hora']) && isset($_POST['total'])) {
        // Obtém os dados enviados via POST
        $id_venda = $_POST['id_venda'];
        $data_hora = $_POST['data_hora'];
        $total = $_POST['total'];

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

        // Prepara e executa a consulta SQL para inserir os dados na tabela vendas
        $sql = "INSERT INTO vendas (id_venda, data_hora, total) VALUES ('$id_venda', '$data_hora', '$total')";
        if ($conn->query($sql) === TRUE) {
            echo "Venda realizada com sucesso!";
            // Redirecionamento após 3 segundos
            header("refresh:3; url=realizar_compra.php");
            exit; // Encerra o script após o redirecionamento
        } else {
            echo "Erro ao realizar a venda: " . $conn->error;
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
    } else {
        echo "Dados incompletos para processar a venda.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>
