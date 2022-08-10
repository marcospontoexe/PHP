<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trabalhando com matriz</title>
</head>
<body>  
    <?php
        $mat = array(       //criando uma matriz
            array(6, 4),
            array(9, 8),
            array(1, 8)
        );

        print_r($mat);
        echo "<br>";
        echo "mat[0][0]: ".$mat[0][0];
        echo "<br>";
        $mat[0][0] = 10;   
        echo "<br>";
        echo "mat[0][0]: ".$mat[0][0];
        echo "<br>"; 

        


        
    ?>
    
</body>
</html>