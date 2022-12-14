<?php

class Lutador {
    //atributos
    private $nome;
    private $nacionalidade;
    private $idade;
    private $altura;
    private $peso;
    private $categoria;
    private $vitorias;
    private $derrotas;
    private $empates;
    
    
    //metodos
    public function apresentar(){
        echo "-----------APRESENTANDO------------------<br>";
        echo "Chegou a hora!<br>";        
        echo "Vindo diretamente da " . $this->getNacionalidade();
        echo " com " . $this->getIdade() . " anos, e pesando " . $this->getPeso() . " quilos";
        echo "<br>com " .$this->getVitorias() . " vitórias, " . $this->getDerrotas() . " derrotas e " . $this->getEmpates() . " empates...";
        echo "<br>O lutador " . $this->getNome() . "<br>";
        echo "<p></p>";
        
    }
    public function status(){
        echo "-----------STATUS------------------<br>";
        echo $this->getNome() . " da categoria " . $this->getCategoria()."<br>";
        echo "já ganhou " . $this->getVitorias() . " lutas<br>";
        echo "perdeu " . $this->getDerrotas() . " lutas<br>";
        echo " e empatou " . $this->getEmpates() . "vezes.<br>";
        echo "<p></p>";
        
    }
    public function ganharLuta(){
        $this->setVitorias($this->getVitorias()+1);
        
    }
    public function perderLuta(){
        $this->setDerrotas($this->getDerrotas()+1);
    }
    public function empatarLuta(){
        $this->setEmpates($this->getEmpates()+1);
    }
    
    //métodos especiais
    public function __construct($nome, $nacionalidade, $idade, $altura, $peso, $vitorias, $derrotas, $empates) {
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->vitorias = $vitorias;
        $this->empates = $empates;
        $this->derrotas = $derrotas;
        $this->setPeso($peso);
    }
    //métodos acessores e modificadores
    public function getNome() {
        return $this->nome;
    }

    public function getNacionalidade() {
        return $this->nacionalidade;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getVitorias() {
        return $this->vitorias;
    }

    public function getDerrotas() {
        return $this->derrotas;
    }

    public function getEmpates() {
        return $this->empates;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setNacionalidade($nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }

    public function setIdade($idade): void {
        $this->idade = $idade;
    }

    public function setAltura($altura): void {
        $this->altura = $altura;
    }

    public function setPeso($peso): void {
        $this->peso = $peso;
        $this->setCategoria();
    }

    private function setCategoria(): void {
        if($this->peso < 52.2){
            $this->categoria = "Categoria inválida, peso muito leve";
        }
        elseif ($this->peso <= 70.3) {
            $this->categoria = "Peso leve";
        }
        elseif ($this->peso <= 83.9) {
            $this->categoria = "Peso médio";
        }
        elseif ($this->peso <= 120.2) {
            $this->categoria = "Peso pesado";
        }
        else{          
            $this->categoria = "Categoria inválida, peso acima do limite";
        }
    }

    public function setVitorias($vitorias): void {
        $this->vitorias = $vitorias;
    }

    public function setDerrotas($derrotas): void {
        $this->derrotas = $derrotas;
    }

    public function setEmpates($empates): void {
        $this->empates = $empates;
    }
}
