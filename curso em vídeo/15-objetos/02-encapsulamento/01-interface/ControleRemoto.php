<?php
require_once './Controlador.php';   //importando a interface
class ControleRemoto implements Controlador{
    //atributos
    private int $volume;
    private bool $ligado;
    private bool $tocando;

    //métodos especiais
    public function __construct() { //construtos
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }

    private function getVolume(): int {
        return $this->volume;
    }
    private function getLigado(): bool {
        return $this->ligado;
    }
    private function getTocando(): bool {
        return $this->tocando;
    }
    private function setVolume(int $volume): void {
        $this->volume = $volume;
    }
    private function setLigado(bool $ligado): void {
        $this->ligado = $ligado;
    }
    private function setTocando(bool $tocando): void {
        $this->tocando = $tocando;
    }

    //métodos abstratos sobrescritos
    public function ligar(): void {
        $this->setLigado(true);
    }
    public function desligar(): void {
        $this->setLigado(false);
    }
    public function abrirMenu(): void {
        echo "<p>-------Menu-------</p>";
        echo "Está ligado: " . ($this->getLigado()?"Sim":"Não") . "<br>";
        echo "Está tocando: " . ($this->getTocando()?"Sim":"Não") . "<br>";
        echo "Volume: " . $this->getVolume() . "<br>";
    }
    public function fecharMenu(): void {
        echo "Fechando menu...";
    }
    public function ligarMudo(): void {
        if($this->getVolume()>0 && $this->getLigado()){
            $this->setVolume(0);
        }
    }
    public function desligarMudo(): void {
        if($this->getVolume()==0 && $this->getLigado()){
            $this->setVolume(20);
        }
    }
    public function maisVolume(): void {
        if($this->getVolume()<=95 && $this->getLigado()){
            $this->setVolume($this->getVolume()+5);
        }
    }
    public function menosVolume(): void {
        if($this->getVolume()>=5 && $this->getLigado()){
            $this->setVolume($this->getVolume()-5);
        }
    }
    public function play(): void {
        if($this->getLigado() && !$this->getTocando()){
            $this->setTocando(true);
        }
    }
    public function pause(): void {
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }

    }




}
