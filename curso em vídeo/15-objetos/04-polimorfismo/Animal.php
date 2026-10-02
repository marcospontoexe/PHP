<?php
//Classe mãe (abstrata)
abstract class Animal {
    //atributos
    protected ?float $peso = null;
    protected ?int $idade = null;
    protected ?int $membros = null;

    //métodos abstratos
    abstract public function locomover(): void;
    abstract public function alimentar(): void;
    abstract public function emitirSom(): void;


    //métodos especiais
    public function getPeso(): ?float {
        return $this->peso;
    }

    public function getIdade(): ?int {
        return $this->idade;
    }

    public function getMembros(): ?int {
        return $this->membros;
    }

    public function setPeso(float $peso): void {
        $this->peso = $peso;
    }

    public function setIdade(int $idade): void {
        $this->idade = $idade;
    }

    public function setMembros(int $membros): void {
        $this->membros = $membros;
    }




}
