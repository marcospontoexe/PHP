<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando switch</title>
</head>
<body>
    <?php   
        $idade = -25;

        switch($idade){

            case($idade >= 0 && $idade < 18):
                echo "Menor de idade!";
                break;
            
            case($idade >= 18 && $idade < 60):
                echo "Adulto!";
                break;
              
            case($idade >= 60 && $idade < 130):
                echo "Idoso!";
                break;

            default:
                echo "Idade incorreta!";

        }

?>
    
</body>
</html>