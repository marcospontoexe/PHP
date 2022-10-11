<?php
require_once 'Lutador.php';
class Luta {
    //atributos
    private $desafiado;
    private $desafiante;
    private $rounds;
    private $aprovada;
    
    //métodos
    public function marcarLuta($l1, $l2){
        if($l1->getCategoria() === $l2->getCategoria() && $l1!=$l2){
            $this->aprovada = true;
            $this->desafiado = $l1;
            $this->desafiante = $l2;
        }
        else{            
            $this->aprovada = false;
            $this->desafiado = null;
            $this->desafiante = null;
        }
    }
    public function lutar(){
        if($this->aprovada){
            $this->desafiado->apresentar();
            $this->desafiante->apresentar();
            $vencedor = rand(0,2);
            switch ($vencedor) {
                case 0:     //empate
                    $this->desafiado->empatarLuta();
                    $this->desafiante->empatarLuta();
                    break;
                
                case 1:     //desafiado vence
                    echo $this->desafiado->getNome() + " venceu a luta<br>";
                    $this->desafiado->ganharLuta();
                    $this->desafiante->perderLuta();
                    break;
                
                case 2:     //desafiante vence
                    echo $this->desafiante->getNome() + " venceu a luta<br>";
                    $this->desafiante->ganharLuta();
                    $this->desafiado->perderLuta();

                    break;

                default:
                    break;
            }
        }
        else{
            echo "A luta não pode ser marcada!<br>";
        }
        
    }
    
    //métodos especiais
    public function getDesafiado() {
        return $this->desafiado;
    }

    public function getDesafiante() {
        return $this->desafiante;
    }

    public function getRounds() {
        return $this->rounds;
    }

    public function getAprovada() {
        return $this->aprovada;
    }

    public function setDesafiado($desafiado): void {
        $this->desafiado = $desafiado;
    }

    public function setDesafiante($desafiante): void {
        $this->desafiante = $desafiante;
    }

    public function setRounds($rounds): void {
        $this->rounds = $rounds;
    }

    public function setAprovada($aprovada): void {
        $this->aprovada = $aprovada;
    }


}
