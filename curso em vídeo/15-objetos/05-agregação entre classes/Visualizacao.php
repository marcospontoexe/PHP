<?php
//agregação entre as classes User() e Video()
require_once './Video.php';
require_once './User.php';
class Visualizacao {
    //atributos
    private User $espectador;
    private Video $filme;

    //construtor
    public function __construct(User $espectador, Video $filme) {
        $this->espectador = $espectador;
        $this->filme = $filme;
        $this->filme->setViews($this->filme->getViews()+1);
        $this->espectador->assistirMaisUm();
    }

    //métodos especiais
    public function getEspectador(): User {
        return $this->espectador;
    }

    public function getFilme(): Video {
        return $this->filme;
    }

    public function setEspectador(User $espectador): void {
        $this->espectador = $espectador;
    }

    public function setFilme(Video $filme): void {
        $this->filme = $filme;
    }



}
