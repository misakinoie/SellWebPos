<?php
if (!isset($_SESSION)) {
    session_start(); 
}

$total = 0;

if (isset($_SESSION["lista_compra"])) {
    foreach ($_SESSION["lista_compra"] as $produto) {
        $total += $produto["preco"];
    }
}

echo number_format($total, 2, ',', '.');
?>
