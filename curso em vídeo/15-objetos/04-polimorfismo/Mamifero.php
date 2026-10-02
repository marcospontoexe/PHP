<?php
//classe filha de Animal
require_once './Animal.php';
class Mamifero extends Animal{
    //atributos
    private ?string $cor = null;

    //métodos sobrescritos da classe mãe  (polimorfismo de sobreposição)
    public function alimentar(): void {
        echo "<p>Mamando</p>";

    }
    public function emitirSom(): void {
        echo "<p>Som de mamífero</p>";

    }
    public function locomover(): void {
        echo "<p>Correndo</p>";

    }

    //métodos especiais
    public function getCor(): ?string {
        return $this->cor;
    }

    public function setCor(string $cor): void {
        $this->cor = $cor;
    }



}
