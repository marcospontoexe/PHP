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
                
        function soma($n1, $n2){
            $s = $n1 + $n2;
            echo "A soma entre $n1 e $n2 é $s";

        }
     
        function multiplo($m1, $m2){
            return $m1 * $m2;
        }

        soma(5, 2);

        $v1 = 5;
        $v2 = 3;
        echo "</br>";
        echo "A multiplicação entre $v1 e $v2 é: ". multiplo($v1, $v2);

        /*--------------ROTINA COM MULTIPLOS PARÂMETROS------------------*/
        function total(){   /* parâmetros de entrada indeterminado */
            $vet = func_get_args();     /* cria um vetor com os parâmetros passados para a função */
            $tot = func_num_args();     /* recebe a quantidade de parâmetros passados para a função */
            $s = 0;
            for($i=0; $i<$tot; $i++){
                $s +=$vet[$i];
            }
            return $s;
        }
        echo "</br>";
        echo "A soma entre 2, 3, 8, 7 é :".total(2, 3, 8, 7). "</br>";

    ?>
    
</body>
</html>