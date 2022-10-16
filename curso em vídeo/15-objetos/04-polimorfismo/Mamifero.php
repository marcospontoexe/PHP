<?php
//classe filha de Animal
require_once './Animal.php';
class Mamifero extends Animal{
    //atributos
    private $cor;
    
    //métodos sobrescritos da classe mãe  (polimorfismo de sobreposição)  
    public function alimentar() {
        echo "<p>Mamando</p>";
        
    }
    public function emitirSom() {
        echo "<p>Som de mamídero</p>";
        
    }
    public function locomover() {
        echo "<p>Correndo</p>";
        
    }
    
    //métodos especiais
    public function getCor() {
        return $this->cor;
    }

    public function setCor($cor): void {
        $this->cor = $cor;
    }



}
