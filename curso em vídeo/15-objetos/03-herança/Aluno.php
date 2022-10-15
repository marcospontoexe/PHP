<?php
//tipo de herança: para diferença
require_once './Pessoa.php';
class Aluno extends Pessoa{
    //Atributos
    private $matricula;
    private $curso;
    
    //métodos
    public function pagarMensalidade(){
        
        echo "<p>Mensalidade do aluno <strong>$this->nome</strong> paga!</p>";
    }
    
    //métodos especiais
    public function getMatricula() {
        return $this->matricula;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setCurso($curso): void {
        $this->curso = $curso;
    }


    
}
