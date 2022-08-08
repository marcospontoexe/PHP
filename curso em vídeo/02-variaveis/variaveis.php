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
        $vetor = array(2, 5, 9, 8);     //cria um vetor

        echo "Vetor posição 0: $vetor[0] </br>";
        echo "$nome"." tem "."$idade"." anos!</br>";            /* concatenando strings */
        echo "$nome ganha $salario reais e tem $idade anos!</br>";

        //VARIÁVEIS REFERENCIADAS
        $n1 = 2;
        $n1 = &$n2;       // n1 é referencia de n2
        $n2 = 10;

        echo "n1 vale $n1 </br>";
        echo "n2 vale $n2 </br>";

        //VARIÁVEIS DE VARIÁVEIS
        $valor = "string";
        $$valor = "marcos";       // cria uma variável chamada 'string' que recebe o valor "marcos"

        echo "valor : $valor </br>";
        echo "string : $string";
?>
    
</body>
</html>