<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        // fonte e cor vão direto para o CSS, então só aceita valores conhecidos (evita injeção de CSS)
        $fontes = ["8pt", "10pt", "14pt", "20pt", "40pt"];     // as mesmas opções do <select> do index.html
        $t = isset($_GET["fonte"]) && in_array($_GET["fonte"], $fontes, true) ? $_GET["fonte"] : "18pt";   // usando operador ternário para evitar erro
        $c = isset($_GET["cor"]) && preg_match('/^#[0-9a-f]{6}$/i', $_GET["cor"]) ? $_GET["cor"] : "#000000";   // só cor hexadecimal (#rrggbb)
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <style>
        body{
            font-size: <?php echo $t; ?>;
            color: <?php echo $c; ?>;

        }
        
    </style>
</head>
<body>
   
    <?php
        /* htmlspecialchars() converte < > " ' & em entidades HTML, para que o texto digitado
        não seja interpretado como código (evita XSS) */
        $n = isset($_GET["nome"]) ? htmlspecialchars($_GET["nome"]) : "Valor não informado";     /* recebe o valor enviado pelo método 'GET'
        isset() retorna true caso o valor tenha sido configurado
        */
        $nasc = isset($_GET["nasce"]) ? ($_GET["nasce"]) : "Valor não informado";        // recebe o valor enviado pelo método 'GET'
        $s = isset($_GET["sexo"]) ? htmlspecialchars($_GET["sexo"]) : "Valor não informado";

        if (is_numeric($nasc)) {       // só calcula a idade se o ano for um número
            $idade = date("Y") - $nasc;
            echo "$n tem $idade anos! <br>";
        } else {
            echo "Nome: $n <br>";
            echo "Ano de nascimento não informado! <br>";
        }
        echo "sexo: $s! <br>";
    ?>
    <a href="javascript:history.go(-1)">Voltar</a>   <!--  ou  <a href="index.html">Voltar</a>  -->
    
</body>
</html>