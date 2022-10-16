<?php
//agregação entre as classes User() e Video()
require_once './Video.php';
require_once './User.php';
class Visualizacao {
    //atributos
    private $espectador;
    private $filme;
    
    //construtor
    public function __construct($espectador, $filme) {
        $this->espectador = $espectador;
        $this->filme = $filme;
        $this->filme->setViews($this->filme->getViews()+1);   
        $this->espectador->setTotAssistido($this->espectador->getTotAssistido()+1);
    }
    
    //métodos especiais
    public function getEspectador() {
        return $this->espectador;
    }

    public function getFilme() {
        return $this->filme;
    }

    public function setEspectador($espectador): void {
        $this->espectador = $espectador;
    }

    public function setFilme($filme): void {
        $this->filme = $filme;
    }



}
