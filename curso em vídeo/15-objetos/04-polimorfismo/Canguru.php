<?php
//classe filha de Mamifero()
require_once './Mamifero.php';
class Canguru extends Mamifero{
    //atributos
    
    //métodos sobrescrito (polimorfismo de sobreposição)
    public function locomover() {
        echo "<p>Saltando</p>";
        
    }
    
    //polimorfismo de sobrecarga
    //PHP não tem suporte a polimorfísmo de sobrecarga.
    public function reagirFrase($frase){
        if($frase == "coma"){
            echo "<p>Abrindo a boca</p>";
        }
        else { 
            echo "<p>Fugindo</p>";
            
        }
            
    }
    public function reagirDono($dono){
        if($dono){
            echo "<p>Abraçando</p>";
        }
        else{
            echo "<p>dando soco</p>";
        }
 
    }
    public function reagirIdade($idade){
        if($idade<2){
            echo "<p>Pedindo carinho</p>";
        }
        else{
            echo"<p>Mordendo a sua mão</p>";
        }
    }
}
