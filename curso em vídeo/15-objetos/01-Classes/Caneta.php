<?php

class Caneta {
    //atributos (o tipo declarado garante que só valores daquele tipo sejam guardados; ? permite null)
    private ?string $modelo = null;
    private string $cor;
    private float $ponta;
    private int $carga;
    private bool $tampada;

    //construtor (no PHP 8, um método com o nome da classe não é mais construtor; use __construct)
    public function __construct(string $cor, float $ponta) {
        $this->cor = $cor;      // this significa uma auto referência. Faz referência ao objeto que chamou a classe
        $this->ponta = $ponta;
        $this->carga = 100;
        $this->tampar();
    }


    //métodos
    public function rabiscar(): void {
        echo '<p>Estou rabiscando...</p>';
    }
    public function tampar(): void {
        $this->tampada = true;
    }
    public function destampar(): void {
        $this->tampada = false;
    }

    //métodos acessores
    public function getModelo(): ?string {
        return $this->modelo;
    }

    public function getCor(): string {
        return $this->cor;
    }

    public function getPonta(): float {
        return $this->ponta;
    }

    public function getCarga(): int {
        return $this->carga;
    }

    public function getTampada(): bool {
        return $this->tampada;
    }

    public function setModelo(string $modelo): void {
        $this->modelo = $modelo;
    }

    public function setCor(string $cor): void {
        $this->cor = $cor;
    }

    public function setPonta(float $ponta): void {
        $this->ponta = $ponta;
    }

    public function setCarga(int $carga): void {
        $this->carga = $carga;
    }

    public function setTampada(bool $tampada): void {
        $this->tampada = $tampada;
    }


}
