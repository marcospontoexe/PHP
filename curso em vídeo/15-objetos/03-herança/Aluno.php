<?php
//tipo de herança: para diferença
require_once './Pessoa.php';
class Aluno extends Pessoa{
    //Atributos
    private $matricula;
    private $curso;
    
    //métodos
    public function pagarMensalidade(){
        echo "<p>Mensalidade do aluno $this-> paga...</p>";
    }
    
    
}
