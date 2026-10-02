<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Criando Classes</title>
    </head>
    <body>
        <h1>Classes e objetos - Caneta</h1>
        <pre>
            <?php
                require_once 'Caneta.php';  //importando a classe caneta
                $c1 = new Caneta("verde", 0.5);         //instanciando um objeto

                print_r($c1);       //mostra o estado do objeto c1
                
                $c1->setCor("preta");
                $c1->setPonta(0.8);
                $c1->setModelo("bic");
                $c1->setTampada(false);

                print_r($c1);       //mostra o estado do objeto c1

                $c1->rabiscar();
                $c1->tampar();
                print_r($c1); 
                
                print "Eu tenho uma caneta {$c1->getModelo()} {$c1->getCor()}";

            ?>
        </pre>
    </body>
</html>
