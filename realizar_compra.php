<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Compra</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #e3e9f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: auto 1px;
        }

        label, input[type="text"], input[type="submit"] {
            display: block;
            margin: 10px auto;
            width: 80%;
            max-width: 300px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4f46e5;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 70px;
        }

        input[type="submit"]:hover {
            background-color: #342dbf;
        }

        h2, h3 {
            text-align: center;
            margin-top: 20px;
            font-size: 30px;
            margin-right: 8px;
            width: 180px;
            
        }

        #lista-compra {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
<button onclick="window.history.back()" style="position: fixed; top: 20px; left: 20px;">Voltar</button>

    <form action="" method="post">
        <label for="search">Buscar por Código ou Nome:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Buscar">
    </form>

    <div id="lista-compra">
        <!-- Lista de produtos encontrados -->
        <?php include_once 'buscar_produtos.php'; ?>
    </div>

    <?php 
    // Calcular o total dos preços dos produtos na lista de compra
    $total = 0;
    foreach ($_SESSION["lista_compra"] as $produto) {
        $total += $produto['preco'];
    }
    ?>

    <h3>Total: R$ <?php echo number_format($total, 2, ',', '.'); ?></h3>

    <form action="venda.php" method="post">
        <!-- Redireciona para a página de venda com o total como parâmetro GET -->
        <input type="hidden" name="total" value="<?php echo $total; ?>">
        <input type="submit" value="VENDA">
    </form>
</body>
</html>
