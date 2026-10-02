<?php
//classe abstrata (raiz)
abstract class Pessoa {
    //atributos (?: começam como null porque são preenchidos pelos setters)
    protected ?string $nome = null;
    private ?int $idade = null;
    private ?string $sexo = null;

    //método final, não pode ser sobreposto nas classes filhas
    public final function fazerAniversario(): void {
        $this->idade++;
    }

    //metodos especiais
    public function getNome(): ?string {
        return $this->nome;
    }

    public function getIdade(): ?int {
        return $this->idade;
    }

    public function getSexo(): ?string {
        return $this->sexo;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function setIdade(int $idade): void {
        $this->idade = $idade;
    }

    public function setSexo(string $sexo): void {
        $this->sexo = $sexo;
    }





}
