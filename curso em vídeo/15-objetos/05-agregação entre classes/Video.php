<?php
require_once './AcoesVideo.php';
class Video implements AcoesVideo{
    //atributos
    private string $titulo;
    private int $avaliacao;
    private int $views;
    private int $curtidas;
    private bool $reproduzindo;

    //construtor
    public function __construct(string $titulo) {
        $this->titulo = $titulo;
        $this->avaliacao=1;
        $this->curtidas=0;
        $this->views=0;
        $this->reproduzindo=false;
    }



    //metodos sobrescritos da interface
    public function like(): void {
        $this->curtidas++;
    }
    public function pause(): void {
        $this->reproduzindo=false;
    }
    public function play(): void {
        $this->reproduzindo=true;
    }

    //métodos especiais
    public function getTitulo(): string {
        return $this->titulo;
    }

    public function getAvaliacao(): int {
        return $this->avaliacao;
    }

    public function getViews(): int {
        return $this->views;
    }

    public function getCurtidas(): int {
        return $this->curtidas;
    }

    public function getReproduzindo(): bool {
        return $this->reproduzindo;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function setAvaliacao(int $avaliacao): void {
        $this->avaliacao = $avaliacao;
    }

    public function setViews(int $views): void {
        $this->views = $views;
    }

    public function setCurtidas(int $curtidas): void {
        $this->curtidas = $curtidas;
    }

    public function setReproduzindo(bool $reproduzindo): void {
        $this->reproduzindo = $reproduzindo;
    }



}
