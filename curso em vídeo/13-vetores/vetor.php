<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vetores</title>

</head>
<body>
    <?php
        //criando um vetor com 4 elemento;
        $n[0] = 5;
        $n[1] = 6;
        $n[2] = 7;
        $n[3] = 10;
        echo "Vetor n : ";
        print_r($n);        //mostra o vetor
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>"; 

        $v = array(1, 2, 3, 4, 10); //cria um vetor
        $v[] = 8;   //cria mais um índice e atribui uma valor
        print_r($v);
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>"; 
       

        echo "unset(vect)";
        unset($v[5]);       //exclui o 5º elemento do vetor v
        print_r($v);
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";
        
        $vt = range(1, 50, 5);  //cria um vetor de 1 até 50, pulando em 5 em 5
        echo "range(1, 50, 5): ";
        foreach($vt as $val){
            echo "$val";
            echo " - ";
        }
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";

        echo "chave personalizada: <br>";
        $vect = array(2=>"olá", 5=>"1", 8=>5);  //cria um vetor com índices personalizados
        print_r($vect);
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";

        echo "Chaves associativas: <br>";
        $cadast = array("nome"=>"marcos", "idade"=>30, "sexo"=>"masculino");
        $cadast["fuma"] = true;
        foreach($cadast as $vte=>$ind){
            echo "[$vte] = $ind <br>";
        }
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";


    ?>
    
</body>
</html>