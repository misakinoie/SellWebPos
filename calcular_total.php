<!-- calcular_total.php -->
<?php
// Verifica se a sessão não está ativa antes de iniciar
if (!isset($_SESSION)) {
    session_start(); // Inicia a sessão
}

// Inicializa o total
$total = 0;

// Verifica se existe uma lista de compra na sessão
if (isset($_SESSION["lista_compra"])) {
    // Calcula o total somando os preços dos produtos na lista de compra
    foreach ($_SESSION["lista_compra"] as $produto) {
        $total += $produto["preco"];
    }
}

// Exibe o total formatado
echo number_format($total, 2, ',', '.');
?>
