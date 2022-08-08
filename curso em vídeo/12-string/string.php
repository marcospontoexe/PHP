<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções para manipulação de string</title>
</head>
<body>
    <?php
        $item = "leite";
        $val = 4.5;
        printf("O %s custa %0.2f R$", $item, $val); //Permite exibir uma string com itens formatados.
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $x = array(8, 5, 1, 7);       
        print_r($x); //Exibe coleções, objetos e variáveis compostas (vetores e matrizes) de maneira organizada.
        // para exibir vetores tb pode ser usados= var_dump() e var_export()
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $palavra = "Este é um exemplo usado para mostrar string grandes, usadndo o wordwra para fazer quebra de linhas!";
        $quebra = wordwrap($palavra, 10, "<br>\n", true); /*Cria quebras de linha ou divisões em uma string em um tamanho especificado. O false quabra nas palavras, o true quebra nas letras*/
        echo "$quebra";
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $nome = "marcos daniel santana";
        $nnome = strlen($nome); /*Retorna o tamanho de uma string, contando seus caracteres (inclusive espaços em branco).*/
        echo "a string nnome contém $nnome caracteres! ";
    
        /*
        trim(); //Retorna uma string sem espaços em branco antes e depois de uma string.
        ltrim(); //Elimina espaços no início de uma string.
        rtrim(); //Elimina espaços em branco no final de uma string.
        */
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";
        $ex = "hoje eu vou estudar pra valer";
        $qex = str_word_count($ex, 0); //Conta quantas palavras uma string possui.
        echo "A string contém $qex palavras!";
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $aex = str_word_count($ex, 1); /*Cria uma array com as palavras da string, mantendo a posição dos elementos d astring.*/
        print_r($aex);
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";
        
        $exp = explode(" ", $ex); //Separa os itens da string em função do caractere escolhido. e coloca os itens em um vetor.
        print_r($exp);
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $spl = str_split($ex); //Coloca cada letra de uma string em uma posição de um vetor.
        print_r($spl);
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $vtr = array("meu", "nome", "é", "marcos");
        $tnome = implode("#", $vtr); //Transforma um vetor inteiro em uma string, tb pode ser usada a função join() .
        echo "$tnome";
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $lt = chr(69); //Retorna um caractere de acordo com seu código ASCII passado como parâmetro.  
        echo "O 69 equilava a letra $lt!";     
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        $cod = ord("a"); //Retorna o código ASCII de um caractere passado como parâmetro
        echo "A letra 'a' equivale a $cod!";     
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

    ?>
</body>
</html>