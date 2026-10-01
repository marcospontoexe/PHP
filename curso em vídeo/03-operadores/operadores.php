<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando operadores.</title>
</head>
<body>
    <?php
    $n1 = -5;
    $n2 = 10.75;
    $soma = $n1 + $n2;
    $n3 = 3000;

    echo "A soma entre $n1 e $n2 é igual a $soma </br>";

    //OPERADOR TERNÁRIO   ->        expressão ? true : false
    $maior = $n1 > $n2 ? $n1 : $n2;
    $menor = $n1 < $n2 ? $n1 : $n2;
    echo "O maior nº é: $maior </br>";
    echo "O menor nº é: $menor </br>";
   
    
    echo "O módulo de $n1 é ". abs($n1) . "</br>";
    echo "A potenciação de $n1 <sup>2</sup> é igual a ". pow($n1, 2) . "</br>";     /* base negativa com expoente decimal resulta em NAN */
    echo "A raiz quadrada de $n2 é ". sqrt($n2) . "</br>";     /* sqrt() de número negativo resulta em NAN */
    echo "$n2 arredondado é ". round($n2) . "</br>";        /* ceil() arredonda pra cima, e floor()arredonda para baixo */
    echo "A parte inteira de $n2 é ". intval($n2) . "</br>";
    echo "O valor em Real de $n3 é R$: ". number_format($n3, 2, ',', '.') . "</br>";    /* number_format($n3, n° decimais, 'centavos', 'milhar') */


    ?>
    
</body>
</html>