<?php
require_once './Controlador.php';   //importando a interface
class ControleRemoto implements Controlador{
    //atributos
    private $volume;
    private $ligado;
    private $tocando;

    //métodos especiais
    public function __construct() { //construtos
        $this->volume = 50;
        $this->ligado = false;
        $this->tocando = false;
    }
    
    private function getVolume() {
        return $this->volume;
    }
    private function getLigado() {
        return $this->ligado;
    }
    private function getTocando() {
        return $this->tocando;
    }
    private function setVolume($volume): void {
        $this->volume = $volume;
    }
    private function setLigado($ligado): void {
        $this->ligado = $ligado;
    }
    private function setTocando($tocando): void {
        $this->tocando = $tocando;
    }

    //métodos abstratos sobrescritos    
    public function ligar() {
        $this->setLigado(true);
    }
    public function desligar() {
        $this->setLigado(false);
    }
    public function abrirMenu() {
        echo "<p>-------Menu-------</p>";
        echo "Esta ligado: " . ($this->getLigado()?"Sim":"Não") . "<br>";
        echo "Está tocando: " . ($this->getTocando()?"Sim":"Não") . "<br>";
        echo "Volume: " . $this->getVolume() . "<br>";
    }
    public function fecharMenu() {
        echo "Fechando menu...";
    }
    public function ligarMudo() {
        if($this->getVolume()>0 && $this->getLigado()){
            $this->setVolume(0);
        }
    }
    public function desligarMudo() {
        if($this->getVolume()==0 && $this->getLigado()){
            $this->setVolume(20);
        }
    } 
    public function maisVolume() {
        if($this->getVolume()<=95 && $this->getLigado()){
            $this->setVolume($this->getVolume()+5);
        }
    }
    public function menosVolume() {
        if($this->getVolume()>=5 && $this->getLigado()){
            $this->setVolume($this->getVolume()-5);
        }
    }  
    public function play() {
        if($this->getLigado() && !$this->getTocando()){
            $this->setTocando(true);
        }
    }
    public function pause() {
        if($this->getLigado() && $this->getTocando()){
            $this->setTocando(false);
        }
        
    }

    


}
