<?php
//classe abstrata (classe raiz)
abstract class Pessoa {
    //atributos
    protected $nome;
    protected $idade;
    protected $sexo;
    protected $experiencia;
    
    //construtor
    public function __construct($nome, $idade, $sexo) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->sexo = $sexo;
        $this->experiencia=0;
    }
    
    //métodos abstrato
    public function ganharExperiencia($n){
        $this->experiencia += $n;
    }
    
    //métodos especiais
    public function getNome() {
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getExperiencia() {
        return $this->experiencia;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setIdade($idade): void {
        $this->idade = $idade;
    }

    public function setSexo($sexo): void {
        $this->sexo = $sexo;
    }

    public function setExperiencia($experiencia): void {
        $this->experiencia = $experiencia;
    }


}
