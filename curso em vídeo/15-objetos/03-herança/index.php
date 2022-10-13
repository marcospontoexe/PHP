<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
            <?php
                require_once 'Visitante.php';

                $v1 = new Visitante();  //instancia um objeto da classe Pessoa()

                $v1->setNome("Jurema");
                $v1->setIdade(61);
                $v1->setSexo("F");
                print_r($v1);
            ?>
        </pre>
    </body>
</html>
