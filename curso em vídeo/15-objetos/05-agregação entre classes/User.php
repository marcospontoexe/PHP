<?php
//classe filha de Pessoa()
require_once './Pessoa.php';
class User extends Pessoa{
    //atributos
    protected string $login;
    protected int $totAssistido;

    //construtor
    public function __construct(string $nome, int $idade, string $sex, string $login) {
        parent::__construct($nome, $idade, $sex); //passa os parâmetros para o construtor da super classe (classe mãe)
        $this->login = $login;
        $this->totAssistido=0;
    }


    //métodos
    public function assistirMaisUm(): void {
        $this->totAssistido++;
        $this->ganharExperiencia(1);    //cada vídeo assistido vale 1 ponto de experiência (método herdado de Pessoa())
    }

    //métodos especiais
    public function getLogin(): string {
        return $this->login;
    }

    public function getTotAssistido(): int {
        return $this->totAssistido;
    }

    public function setLogin(string $login): void {
        $this->login = $login;
    }

    public function setTotAssistido(int $totAssistido): void {
        $this->totAssistido = $totAssistido;
    }



}
