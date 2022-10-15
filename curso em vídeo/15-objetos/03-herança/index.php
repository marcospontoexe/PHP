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
                require_once 'Aluno.php';
                require_once 'Bolsista.php';                

                $v1 = new Visitante();  //instancia um objeto da classe Pessoa()                   

                $v1->setNome("Jurema");
                $v1->setIdade(61);
                $v1->setSexo("F");
                print_r($v1);
                
                $al1 = new Aluno();
                $al1->setNome("Juao");
                $al1->setIdade(28);
                $al1->setSexo("M");
                $al1->setCurso("Bordado");
                $al1->setMatricula(123345);
                print_r($al1);
                $al1->pagarMensalidade();     
                
                $b1 = new Bolsista();
                $b1->setNome("Jubileu");
                $b1->setIdade(18);
                $b1->setSexo("M");
                $b1->setCurso("Informática");
                $b1->setMatricula(1248); 
                $b1->setBolsa(100);                               
                print_r($b1);
                $b1->renovarBolsa(); 
               $b1->pagarMensalidade();
                
            ?>        
        </pre>
    </body>
</html>
