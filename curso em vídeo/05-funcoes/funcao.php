<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando funções.</title>
</head>
<body>
    <?php
    $n1 = 5.5;
    $n2 = 3;
    $n3 = 3000;
    
    echo "A raiz módulo de $n1 é ". abs($n1) . "</br>";
    echo "A potenciação de $n1 <sup>$n2</sup> é igual a ". pow($n1, $n2) . "</br>";
    echo "A raiz quadrada de $n1 é ". sqrt($n1) . "</br>";
    echo "$n1 arredondado é ". round($n1) . "</br>";        /* ceil() arredonda pra cima, e floor()arredonda para baixo */
    echo "A parte inteira de $n1 é ". intval($n1) . "</br>";
    echo "O valor em Real de $n3 é R$: ". number_format($n3, 2, ',', '.') . "</br>";    /* number_format($n3, n° decimais, 'centavos', 'milhar') */

    ?>
    
</body>
</html>