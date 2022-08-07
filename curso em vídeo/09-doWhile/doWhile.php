<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando Do While</title>
</head>
<body>
    <?php   
        $valor = 1;

        do{
            echo "$valor </br>";
            $valor++;
        }
        while($valor <= 10);

?>
    
</body>
</html>