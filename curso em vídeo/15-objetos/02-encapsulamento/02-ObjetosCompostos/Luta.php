<?php
require_once 'Lutador.php';
class Luta {
    //atributos (?Lutador: guarda um objeto Lutador ou null, quando a luta não foi aprovada)
    private ?Lutador $desafiado = null;
    private ?Lutador $desafiante = null;
    private bool $aprovada = false;

    //métodos
    public function marcarLuta(Lutador $l1, Lutador $l2): void {
        // !== compara a identidade: só recusa se for o mesmo objeto (com != dois lutadores com os mesmos dados seriam "iguais")
        if($l1 !== $l2 && $l1->categoriaValida() && $l1->getCategoria() === $l2->getCategoria()){
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
    public function lutar(): void {
        if($this->aprovada){
            $this->desafiado->apresentar();
            $this->desafiante->apresentar();
            $vencedor = rand(0,2);
            switch ($vencedor) {
                case 0:     //empate
                    echo "Os lutadores empataram a luta!<br>";
                    $this->desafiado->empatarLuta();
                    $this->desafiante->empatarLuta();
                    break;

                case 1:     //desafiado vence
                    echo $this->desafiado->getNome() . " venceu a luta<br>";
                    $this->desafiado->ganharLuta();
                    $this->desafiante->perderLuta();
                    break;

                case 2:     //desafiante vence
                    echo $this->desafiante->getNome() . " venceu a luta<br>";
                    $this->desafiante->ganharLuta();
                    $this->desafiado->perderLuta();
                    break;

                default:
                    echo 'Erro no algoritmo de decisão da vitória!';
                    break;
            }
        }
        else{
            echo "A luta não pode ser marcada!<br>";
        }

    }

    //métodos especiais
    public function getDesafiado(): ?Lutador {
        return $this->desafiado;
    }

    public function getDesafiante(): ?Lutador {
        return $this->desafiante;
    }

    public function getAprovada(): bool {
        return $this->aprovada;
    }

    public function setDesafiado(?Lutador $desafiado): void {
        $this->desafiado = $desafiado;
    }

    public function setDesafiante(?Lutador $desafiante): void {
        $this->desafiante = $desafiante;
    }

    public function setAprovada(bool $aprovada): void {
        $this->aprovada = $aprovada;
    }


}
