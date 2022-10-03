<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Criando Classes</title>
    </head>
    <body>
        <pre>
            <?php
                require_once 'Caneta.php';  //importando a classe caneta
                $c1 = new Caneta();         //instanciando um objeto

                $c1->setCor("preta");
                $c1->setPonta(0.5);
                $c1->setModelo("bic");
                $c1->setTampada(false);

                print_r($c1);       //mostra o estado do objeto c1

                $c1->rabiscar();
                $c1->tampar();
                print_r($c1); 

            ?>
        </pre>
    </body>
</html>
