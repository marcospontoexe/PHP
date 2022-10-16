<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>        
        <pre>
            <?php
                require_once './Video.php';
                require_once './User.php';
                require_once './Visualizacao.php';
                
                $v[0] = new Video("Aula 02 de Java");
                $v[1] = new Video("Aula 09 de PHP");                
                print_r($v);
                
                $u[0] = new User("Jurandir", 59, "M", 12345);
                print_r($u);
                
                $vis[0] = new Visualizacao($u[0], $v[1]); //agregação da classe User ao Video
                print_r($vis);
            ?>
        </pre>
    </body>
</html>
