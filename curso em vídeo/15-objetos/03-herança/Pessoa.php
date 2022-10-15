<?php
//classe abstrata (raiz)
abstract class Pessoa {
    //atributos
    protected $nome;
    private $idade;
    private $sexo;
    
    //método final, não pode ser sobreposto nas classes filhas
    public final function fazerAniversario() {
        $this->idade++;
    }
    
    //metodos especiais
    public function getNome() {
        return $this->nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getSexo() {
        return $this->sexo;
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


    
    
    
}
