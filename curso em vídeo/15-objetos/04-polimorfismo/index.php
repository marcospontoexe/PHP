<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
            <?php
                require_once './Mamifero.php';            
                $m1 = new Mamifero();       
                $m1->setCor("marrom");
                $m1->setIdade(3);
                $m1->setMembros(4);
                $m1->setPeso(30.5);
                print_r($m1);
                $m1->alimentar();
                $m1->emitirSom();
                
                require_once './Canguru.php';
                $c1 = new Canguru();
                $c1->locomover();   //saltando
                $m1->locomover();   //correndo
                
                $c1->reagirFrase("coma");
                $c1->reagirFrase("sentar");
                $c1->reagirDono(true);
                $c1->reagirIdade(3);
                
            ?>
        </pre>
    </body>
</html>
