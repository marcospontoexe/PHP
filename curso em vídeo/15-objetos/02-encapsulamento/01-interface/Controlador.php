<?php
//código da interface

interface Controlador {
    //métodos abstratos
    public function ligar(): void;
    public function desligar(): void;
    public function abrirMenu(): void;
    public function fecharMenu(): void;
    public function maisVolume(): void;
    public function menosVolume(): void;
    public function ligarMudo(): void;
    public function desligarMudo(): void;
    public function play(): void;
    public function pause(): void;
}
