<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Venda</title>
    <style>
        h2{
            font-size: 50px;
            display: flex;
            margin-top: 200px;
            margin-left: 200px;
            height: 55px;
            width: 400px;
            text-align: center;
            margin-right: 0px;

        }
    </style>
</head>
<body>
<?php include 'menu.php'; ?>
    

    <?php

    if(isset($_POST['total'])) {
        $total = $_POST['total'];
    } else {
        $total = 0; 
    }
    ?>


    <h2>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h2>


    <form action="processar_venda.php" method="post" id="form_venda">

        <input type="hidden" name="id_venda" value="<?php echo rand(1000, 9999); ?>">

        <input type="hidden" name="data_hora" value="<?php echo date("Y-m-d H:i:s"); ?>">

        <input type="hidden" name="total" value="<?php echo $total; ?>">

        <label for="metodo_pagamento">Escolha o método de pagamento:</label>
        <select name="metodo_pagamento" id="metodo_pagamento">
            <option value="dinheiro">Dinheiro</option>
            <option value="pix">PIX</option>
            <option value="cartao">Cartão Crédito/Débito</option>
        </select>


        <div id="valor_dinheiro" style="display: none;">
            <label for="valor_dinheiro_input">Insira o valor em dinheiro:</label>
            <input type="number" name="valor_dinheiro_input" id="valor_dinheiro_input" step="0.01">
        </div>


        <div id="troco" style="display: none;">
            <label for="troco_input">Troco:</label>
            <input type="text" id="troco_input" disabled>
        </div>

        <input type="submit" value="Finalizar Venda">
    </form>

    <script>

    document.getElementById('metodo_pagamento').addEventListener('change', function() {
        var metodoSelecionado = this.value;
        var valorDinheiro = document.getElementById('valor_dinheiro');

        if(metodoSelecionado === 'dinheiro') {
            valorDinheiro.style.display = 'block';
        } else {
            valorDinheiro.style.display = 'none';
        }
    });


    document.getElementById('valor_dinheiro_input').addEventListener('input', function() {
        var valorDinheiro = parseFloat(this.value);
        var troco = valorDinheiro - <?php echo $total; ?>;


        if(troco >= 0) {
            document.getElementById('troco').style.display = 'block';
            document.getElementById('troco_input').value = 'R$ ' + troco.toFixed(2).replace('.', ',');
        } else {
            document.getElementById('troco').style.display = 'none';
        }
    });
    </script>
</body>
</html>
