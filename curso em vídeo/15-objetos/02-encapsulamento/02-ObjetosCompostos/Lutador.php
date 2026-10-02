<?php

class Lutador {
    //atributos
    private string $nome;
    private string $nacionalidade;
    private int $idade;
    private float $altura;
    private float $peso;
    private string $categoria;
    private int $vitorias;
    private int $derrotas;
    private int $empates;


    //metodos
    public function apresentar(): void {
        echo "-----------APRESENTANDO------------------<br>";
        echo "Chegou a hora!<br>";
        echo "Nacionalidade: " . $this->getNacionalidade() . "<br>";
        echo "Com " . $this->getIdade() . " anos, pesando " . $this->getPeso() . " quilos";
        echo "<br>com " . $this->plural($this->getVitorias(), "vitória", "vitórias") . ", "
            . $this->plural($this->getDerrotas(), "derrota", "derrotas") . " e "
            . $this->plural($this->getEmpates(), "empate", "empates") . "...";
        echo "<br>O lutador " . $this->getNome() . "<br>";
        echo "<p></p>";

    }
    public function status(): void {
        echo "-----------STATUS------------------<br>";
        echo $this->getNome() . " da categoria " . $this->getCategoria()."<br>";
        echo "já ganhou " . $this->plural($this->getVitorias(), "luta", "lutas") . "<br>";
        echo "perdeu " . $this->plural($this->getDerrotas(), "luta", "lutas") . "<br>";
        echo " e empatou " . $this->plural($this->getEmpates(), "vez", "vezes") . ".<br>";
        echo "<p></p>";

    }
    public function ganharLuta(): void {
        $this->setVitorias($this->getVitorias()+1);

    }
    public function perderLuta(): void {
        $this->setDerrotas($this->getDerrotas()+1);
    }
    public function empatarLuta(): void {
        $this->setEmpates($this->getEmpates()+1);
    }

    //escreve a quantidade com a palavra no singular ou no plural (ex.: "1 empate", "2 empates")
    private function plural(int $quantidade, string $singular, string $plural): string {
        return $quantidade . " " . ($quantidade == 1 ? $singular : $plural);
    }

    //métodos especiais
    public function __construct(string $nome, string $nacionalidade, int $idade, float $altura, float $peso, int $vitorias, int $derrotas, int $empates) {
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->idade = $idade;
        $this->altura = $altura;
        $this->vitorias = $vitorias;
        $this->empates = $empates;
        $this->derrotas = $derrotas;
        $this->setPeso($peso);
    }
    //métodos acessores e modificadores
    public function getNome(): string {
        return $this->nome;
    }

    public function getNacionalidade(): string {
        return $this->nacionalidade;
    }

    public function getIdade(): int {
        return $this->idade;
    }

    public function getAltura(): float {
        return $this->altura;
    }

    public function getPeso(): float {
        return $this->peso;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }

    public function getVitorias(): int {
        return $this->vitorias;
    }

    public function getDerrotas(): int {
        return $this->derrotas;
    }

    public function getEmpates(): int {
        return $this->empates;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setNacionalidade(string $nacionalidade): void {
        $this->nacionalidade = $nacionalidade;
    }

    public function setIdade(int $idade): void {
        $this->idade = $idade;
    }

    public function setAltura(float $altura): void {
        $this->altura = $altura;
    }

    public function setPeso(float $peso): void {
        $this->peso = $peso;
        $this->setCategoria();
    }

    private function setCategoria(): void {
        if($this->peso < 52.2){
            $this->categoria = "Categoria inválida, peso muito leve";
        }
        elseif ($this->peso <= 70.3) {
            $this->categoria = "Peso leve";
        }
        elseif ($this->peso <= 83.9) {
            $this->categoria = "Peso médio";
        }
        elseif ($this->peso <= 120.2) {
            $this->categoria = "Peso pesado";
        }
        else{
            $this->categoria = "Categoria inválida, peso acima do limite";
        }
    }

    //lutadores fora dos limites de peso não podem lutar
    public function categoriaValida(): bool {
        return in_array($this->categoria, ["Peso leve", "Peso médio", "Peso pesado"], true);
    }

    public function setVitorias(int $vitorias): void {
        $this->vitorias = $vitorias;
    }

    public function setDerrotas(int $derrotas): void {
        $this->derrotas = $derrotas;
    }

    public function setEmpates(int $empates): void {
        $this->empates = $empates;
    }
}
