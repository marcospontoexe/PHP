<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        $t = isset($_GET["fonte"]) ? $_GET["fonte"] : "18pt";   // usando operador ternário para evitar erro 
        $c = isset($_GET["cor"]) ? $_GET["cor"] : "#0000";
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
        $n = isset($_GET["nome"]) ? ($_GET["nome"]) : "Valor não informado!";     /* recebe o valor enviado pelo método 'GET'
        isset() retorna true caso o valor tenha sido configurado
        */
        $nasc = isset($_GET["nasce"]) ? ($_GET["nasce"]) : "Valor não informado!";        // recebe o valor enviado pelo método 'GET'
        $s = isset($_GET["sexo"]) ? $_GET["sexo"] : "Valor não informado!";
        $idade = date("Y") - $nasc;

        echo "$n tem $idade anos! </br>";
        echo "sexo: $s! </br>";
    ?>
    <a href="javascript:history.go(-1)">Voltar</a>   <!--  ou  <a href="index.html">Voltar</a>  -->
    
</body>
</html>