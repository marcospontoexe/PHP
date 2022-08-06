<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variáveis em PHP</title>
</head>
<body>
    <?php   
        $idade = 31;
        $salario = 30000.00;
        $nome = "Marcos";
        $casado = False;
        $peso = (int)60;        /* força a variável a ser do tipo int*/

        echo "$nome"." tem "."$idade"." anos!</br>";            /* concatenando strings */
        echo "$nome ganha $salario reais e tem $idade anos!";

    ?>
    
</body>
</html>