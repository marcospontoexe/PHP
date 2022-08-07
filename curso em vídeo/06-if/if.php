<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando if else</title>
</head>
<body>
    <?php   
        $idade = 68;

        if($idade >= 0 && $idade < 18){
            echo "Menor de idade!";

        }
        elseif($idade >= 18 && $idade < 60){
            echo "Adulto!";
        }  
        else{
            echo "Idoso!";
        }

?>
    
</body>
</html>