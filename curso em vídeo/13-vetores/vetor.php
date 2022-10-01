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

        echo "var_dump(): <br>";
        var_dump($n);           // mostra p vetor e tb o tipo das variáveis
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>"; 

        $v = array(1, 2, 3, 4, 10); //cria um vetor
        $v[] = 8;   //cria mais um índice no final do vtore atribui uma valor
        array_push($v, 11); //adiciona o 11 no final do vetor
        print_r($v);
        echo "<br>";
        array_pop($v);    //exclui o ultimo elemento do vetor
        print_r($v);
        echo "<br>";
        array_unshift($v, 20);  //inclui o 20 no início do vetor
        print_r($v);
        echo "<br>";
        array_shift($v);    //exclui o primeiro elemento do vetor
        print_r($v);
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>"; 
       

        echo "unset(vect)";
        unset($v[1]);       //exclui o 2º elemento do vetor v
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

        echo "count(vetor) <br>";
        echo "O vetor tem ".count($cadast). " elementos! <br>";
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";

        echo "Ordenando vetores <br>";
        $res = array(5, 8, 9, 4, 88 ,12);
        echo "vetor original: ";
        print_r($res);
        echo "<br>";
        sort($res);
        echo "vetor ordenado: ";
        print_r($res);
        echo "<br>";
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";

        echo "Ordenando vetores reversamente<br>";
        $res = array(5, 8, 9, 4, 88 ,12);
        echo "vetor original: ";
        print_r($res);
        echo "<br>";
        rsort($res);
        echo "vetor ordenado: ";
        print_r($res);
        echo "<br>";
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";

        echo "Ordenando vetores associativos<br>";
        $res = array(5, 8, 9, 4, 88 ,12);
        echo "vetor original: ";
        print_r($res);
        echo "<br>";
        asort($res);    //coloca em ordem crescente, e mantém os índices assosciados ao valores (pode usar tb o arsort() para ordem reversa)
        echo "vetor ordenado: ";
        print_r($res);
        echo "<br>";
        echo "<br>";
        echo str_repeat("*-", 40) . "<br>";





    ?>
    
</body>
</html>