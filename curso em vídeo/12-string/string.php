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
        echo "printf()</br>";
        $item = "leite";
        $val = 4.5;
        printf("O %s custa %0.2f R$", $item, $val); //Permite exibir uma string com itens formatados.
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "print_r()</br>";
        $x = array(8, 5, 1, 7);       
        print_r($x); //Exibe coleções, objetos e variáveis compostas (vetores e matrizes) de maneira organizada.
        // para exibir vetores tb pode ser usados= var_dump() e var_export()
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "wordwrap()</br>";
        $palavra = "Este é um exemplo usado para mostrar string grandes, usadndo o wordwra para fazer quebra de linhas!";
        $quebra = wordwrap($palavra, 10, "<br>\n", true); /*Cria quebras de linha ou divisões em uma string em um tamanho especificado. O false quabra nas palavras, o true quebra nas letras*/
        echo "$quebra";
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "strlen()</br>";
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

        echo "str_word_coun(0)</br>";
        $ex = "hoje eu vou estudar pra valer";
        $qex = str_word_count($ex, 0); //Conta quantas palavras uma string possui.
        echo "A string contém $qex palavras!";
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "str_word_coun(1)</br>";
        $aex = str_word_count($ex, 1); /*Cria uma array com as palavras da string, mantendo a posição dos elementos d astring.*/
        print_r($aex);
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";
        
        echo "explode()</br>";
        $exp = explode(" ", $ex); //Separa os itens da string em função do caractere escolhido. e coloca os itens em um vetor.
        print_r($exp);
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "str_split()</br>";
        $spl = str_split($ex); //Coloca cada letra de uma string em uma posição de um vetor.
        print_r($spl);
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "implode()</br>";
        $vtr = array("meu", "nome", "é", "marcos");
        $tnome = implode("#", $vtr); //Transforma um vetor inteiro em uma string, tb pode ser usada a função join() .
        echo "$tnome";
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "chr()</br>";
        $lt = chr(69); //Retorna um caractere de acordo com seu código ASCII passado como parâmetro.  
        echo "O 69 equilava a letra $lt!";     
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "ord()</br>";
        $cod = ord("a"); //Retorna o código ASCII de um caractere passado como parâmetro
        echo "A letra 'a' equivale a $cod!";     
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "strtolower()</br>";
        $maxnome = "Marcos Daniel Santana";
        echo "nome em minúsculo: ". strtolower($maxnome);   //strtolower() deixa tudo em minúsculo
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "strtoupper()</br>";
        echo "nome em maiúsculo: ". strtoupper($maxnome);       //deixa tudo em maiúsculo
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "ucfirst()</br>";
        $name = "marcondes dos santos";
        echo "nome modificado: ". ucfirst($name);       //deixa a primeira letra da string em maiúsculo
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "ucwords()</br>";
        $name = "marcondes dos santos";
        echo "nome modificado: ". ucwords($name);       //deixa a primeira letra de cada palavra em maiúsculo
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "strrev()</br>";
        $name = "marcondes dos santos";
        echo "nome modificado: ". strrev($name);       //reverte os caracteres da string
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "strpos(str, str)</br>";
        $txtt = "estou estudando PHP";
        echo "frase original: $txtt</br>";
        echo "'PHP' foi encontrada na posição: ". strpos($txtt, "PHP");   //mostra em que indice o caractere foi achado dentro da string
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "stripos(str, str)</br>";
        $txtt = "estou estudando PHP";
        echo "frase original: $txtt</br>";
        echo "'php' foi encontrada na posição: ". stripos($txtt, "php");   //mostra em que indice o caractere foi achado dentro da string, ignorando o tamanho da letra
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "substr_count(str, str)</br>";
        $exp = "estou estudando PHP, no curso de PHP, e estou gostando do PHP.";
        echo "frase original: $exp</br>";
        echo "'PHP' foi encontrada ". substr_count($exp, "PHP"). " vezes!";   //mostra quantas vezes a substring foi encontrada dentro da string
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "substr(str, int, int)</br>";
        echo "frase original: $txtt</br>";
        echo "substr(str, 0, 4): ". substr($txtt, 0, 5). "<br>";   //mostra apenas os 5 primeiros caracteres
        echo "substr(str, 5): ". substr($txtt, 6). "<br>";   //mostra apenas os caracteres a partir da 6° posição
        echo "substr(str, 5): ". substr($txtt, -3). "<br>";   //mostra apenas os 3 ultimos caracteres
        echo "substr(str, 5): ". substr($txtt, -3, 1). "<br>";   //considerando os 3 ultimos caracteres, mostra apenas o 1°
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "str_pad(str, int, str, STR_PAD_RIGHT)</br>";
        $nommee = "marcos";
        echo "frase original: $nommee</br>";
        echo "str_pad(TR_PAD_RIGHT): ". str_pad($nommee, 20, "#", STR_PAD_RIGHT). " <br>!";   /*completa com '#' a direita, até a string ficar com 20 elementos*/
        echo "str_pad(STR_PAD_BOTH): ". str_pad($nommee, 20, "#", STR_PAD_BOTH). " <br>!";   /*completa com '#' a esquerda e direita, até a string ficar com 20 elementos*/
        echo "str_pad(STR_PAD_LEFT): ". str_pad($nommee, 20, "#", STR_PAD_LEFT). " <br>!";   /*completa com '#' a esquerda, até a string ficar com 20 elementos*/
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "str_repeat(str, int)</br>";
        echo "str_repeat('-', 20): ". str_repeat("-", 20);   //mostra determinado caractere n vezes
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";

        echo "str_replace(str, str, str)</br>";
        $l = "estou estudando bordado!";
        echo "frase original: $l</br>";
        echo "str_replace('bordado', 'php', str): ". str_replace("bordado", "php", $l). "<br>";   //substitui a 1° str pela 2°
        echo "str_ireplace('BORDADO', 'php', str): ". str_ireplace("BORDADO", "php", $l). "<br>";   //substitui a 1° str pela 2°, ignorando o tamanho da letra
        echo "</br>";
        echo "*-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-**-*-*-*-*-*-*-*-*";
        echo "</br>";
    ?>
</body>
</html>