<!DOCTYPE html>
<!-- programa principal -->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'Lutador.php';
            require_once 'Luta.php';
            $l = array();                   //cria um array
            //cria  objetos
            $l[0] = new Lutador("PretyBoy", "França", 31, 1.75, 68.9, 11, 2, 1);  
            $l[1] = new Lutador("PutScript", "Brasil", 29, 1.68, 57.8, 14, 2, 3);
            $l[2] = new Lutador("SnapShadow", "EUA", 35, 1.65, 80.9, 12, 1, 2);
            $l[3] = new Lutador("DeadCode", "Austrália", 28, 1.93, 81.6, 13, 0, 2);
            $l[4] = new Lutador("UFOCobol", "Brasil", 37, 1.7, 119.3, 5, 4, 3);
            $l[5] = new Lutador("NerdArt", "EUA", 30, 1.81, 105.7, 12, 2, 4);
            
            
            
            
            $pancadaria = new Luta();
            $pancadaria->marcarLuta($l[0], $l[1]);      //agregação entre a classe Luta() e Lutador()
            $pancadaria->lutar();
            $l[0]->status();
            $l[1]->status();
            
            
        ?>
    </body>
</html>
