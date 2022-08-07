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
    $n1 = 5;
    $n2 = 10.25;
    $soma = $n1 + $n2;

    echo "A soma entre $n1 e $n2 é igual a $soma </br>";

    //OPERADOR TERNÁRIO   ->        expressão ? true : false
    $maior = $n1 > $n2 ? $n1 : $n2;
    $menor = $n1 < $n2 ? $n1 : $n2;
    echo "O maior nº é: $maior </br>";
    echo "O menor nº é: $menor </br>";


    ?>
    
</body>
</html>