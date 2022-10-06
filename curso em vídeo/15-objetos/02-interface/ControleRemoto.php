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
    
    public function getVolume() {
        return $this->volume;
    }
    public function getLigado() {
        return $this->ligado;
    }
    public function getTocando() {
        return $this->tocando;
    }
    public function setVolume($volume): void {
        $this->volume = $volume;
    }
    public function setLigado($ligado): void {
        $this->ligado = $ligado;
    }
    public function setTocando($tocando): void {
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
        echo('Está ligado: ' . ($this->getLigado())?"Sim":"Não");
        echo "Está tocando: " . ($this->getTocando()?"Sim":"Não");
        echo "Volume: " . $this->getVolume();
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

    public function pause() {
        
    }

    public function play() {
        
    }

    


}
