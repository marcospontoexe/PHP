<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando variáveis de input</title>
</head>
<body>
    <?php
        $n1 = $_GET["a"];       /* n1 recebe o valor fornecido na URL (.../input.php?a=5&b=4) */
        $n2 = $_GET["b"];       /* n2 recebe o valor fornecido na URL (.../input.php?a=5&b=4) */
        $soma = $n1 + $n2;

        echo "A soma entre $n1 e $n2 é igual a $soma";

    ?>
</body>
</html>