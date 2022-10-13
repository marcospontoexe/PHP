<!DOCTYPE html>
<!-- Código principal -->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Projeto controle remoto</h1>    
        <pre>
            <?php
                require_once 'ControleRemoto.php';    //importa a classe ControleRemoto()
                $c = new ControleRemoto();          //instanciando um objeto da classe ControleRemoto()               
                $c->abrirMenu();
                $c->ligar();
                $c->maisVolume();
                $c->play();
                $c->abrirMenu();
                
            ?>
        </pre>
    </body>
</html>
