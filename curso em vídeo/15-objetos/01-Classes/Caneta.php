<?php

class Caneta {
    //atributos
    var $modelo;
    var $cor;
    var $ponta;
    var $carga;
    var $tampada;    
    
    //métodos
    function rabiscar(){
        echo '<p>Estou rabiscando...</p>';
    }
    function tampar(){
        $this->tampada = true;
    }
    function destampar(){
        $this->tampada = false;
    }
}
