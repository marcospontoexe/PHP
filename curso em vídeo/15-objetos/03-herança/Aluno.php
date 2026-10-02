<?php
//tipo de herança: para diferença
require_once './Pessoa.php';
class Aluno extends Pessoa{
    //Atributos
    private ?int $matricula = null;
    private ?string $curso = null;

    //métodos
    public function pagarMensalidade(): void {

        echo "<p>Mensalidade do aluno <strong>$this->nome</strong> paga!</p>";
    }

    //métodos especiais
    public function getMatricula(): ?int {
        return $this->matricula;
    }

    public function getCurso(): ?string {
        return $this->curso;
    }

    public function setMatricula(int $matricula): void {
        $this->matricula = $matricula;
    }

    public function setCurso(string $curso): void {
        $this->curso = $curso;
    }



}
