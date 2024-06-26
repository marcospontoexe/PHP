<?php

class Caneta {
    //atributos
    private $modelo;
    private $cor;
    private $ponta;
    private $carga;
    private $tampada;    
    
    //construtor
    public function Caneta($cor, $ponta) {
        $this->cor = $cor;      // this significa uma auto referência. Faz referência ao objeto que chamou a classe
        $this->ponta = $ponta;
        $this->carga = 100;
        $this->tampar();
    }

    
    //métodos
    public function rabiscar(){
        echo '<p>Estou rabiscando...</p>';
    }
    public function tampar(){
        $this->tampada = true;
    }
    public function destampar(){
        $this->tampada = false;
    }
    
    //métodos acessores
    public function getModelo() {
        return $this->modelo;
    }

    public function getCor() {
        return $this->cor;
    }

    public function getPonta() {
        return $this->ponta;
    }

    public function getCarga() {
        return $this->carga;
    }

    public function getTampada() {
        return $this->tampada;
    }

    public function setModelo($modelo): void {
        $this->modelo = $modelo;
    }

    public function setCor($cor): void {
        $this->cor = $cor;
    }

    public function setPonta($ponta): void {
        $this->ponta = $ponta;
    }

    public function setCarga($carga): void {
        $this->carga = $carga;
    }

    public function setTampada($tampada): void {
        $this->tampada = $tampada;
    }


}
