<?php
//classe filha de Aluno()
require_once './Aluno.php';
final class Bolsista extends Aluno{     //classe final (ou classe folha), não pode gerar classe filha
    //atributos
    private $bolsa;
    
    
    public function pagarMensalidade(){ //método sobrescrito da classe mãe (Aluno())
        echo "<p>Aluno $this->nome paga mensalidade com $this->bolsa% de desconto</p>";
    
    }
    
    //métodos
    public function renovarBolsa(){
        echo "<p>Bolsa renovada!</p>";     
        echo "<p>Aluno $this->nome com bolsa de $this->bolsa%</p>";
    }
    
    public function getBolsa() {
        return $this->bolsa;
    }

    public function setBolsa($bolsa): void {
        $this->bolsa = $bolsa;
    }


}
