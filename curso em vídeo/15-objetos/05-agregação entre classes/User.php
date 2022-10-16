<?php
//classe filha de Pessoa()
require_once './Pessoa.php';
class User extends Pessoa{
    //atributos
    protected $login;
    protected $totAssistido;
    
    //construtor
    public function __construct($nome, $idade, $sex, $login) {
        parent::__construct($nome, $idade, $sex); //passa os parâmetros para o construtor da super classe (classe mãe)
        $this->login = $login;
        $this->totAssistido=0;
    }

    
    //métodos
    public function assitirMaisUm(){
        $this->totAssistido++;
    }
    
    //métodos especiais
    public function getLogin() {
        return $this->login;
    }

    public function getTotAssistido() {
        return $this->totAssistido;
    }

    public function setLogin($login): void {
        $this->login = $login;
    }

    public function setTotAssistido($totAssistido): void {
        $this->totAssistido = $totAssistido;
    }


    
}
