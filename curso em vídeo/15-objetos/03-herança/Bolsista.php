<?php
//classe filha de Aluno()
require_once './Aluno.php';
final class Bolsista extends Aluno{     //classe final (ou classe folha), não pode gerar classe filha
    //atributos
    private ?float $bolsa = null;     //percentual de desconto


    public function pagarMensalidade(): void { //método sobrescrito da classe mãe (Aluno())
        echo "<p>Aluno $this->nome paga mensalidade com $this->bolsa% de desconto</p>";

    }

    //métodos
    public function renovarBolsa(): void {
        echo "<p>Bolsa renovada!</p>";
        echo "<p>Aluno $this->nome com bolsa de $this->bolsa%</p>";
    }

    public function getBolsa(): ?float {
        return $this->bolsa;
    }

    public function setBolsa(float $bolsa): void {
        $this->bolsa = $bolsa;
    }


}
