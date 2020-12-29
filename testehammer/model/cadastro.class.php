<?php
class Cadastro
{
    private $idCadastro;
    private $nome;
    private $beber;
    private $convidado;
    private $nomeDoConvidado;
    private $convidadoBeber;
    private $contribuir;

    public function __construct()
    {
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function verificarBebidas()
    {
        switch ($this->beber) {
            case "sim":
                return $this->contribuir + 20;
            default:
                return $this->contribuir + 10;
        }
    }

    public function verificarConvidado()
    {
        switch ($this->convidado) {
            case "sim":
                return $this->contribuir + 10;
            case "nao":
                return $this->contribuir;
        }
    }
    public function verificarConvidadoBebidas()
    {
        switch ($this->convidadobeber) {
            case "sim":
                return $this->contribuir + 10;
            case "nao":
                return $this->contribuir;
        }
    }


    public function calcularTotal()
    {
        return $this->verificarBebidas() + $this->contribuir + $this->verificarConvidado() + $this->verificarConvidadoBebidas();
    }
    

    public function toString()
    {
        return "<br>Nome: " . $this->nome .
            "<br>Você vai beber: " . $this->beber .
            "<br>Levará convidado: " . $this->convidado .
            "<br>Nome do seu convidado: " . $this->nomeDoConvidado .
            "<br>Seu convidado vai beber: " . $this->convidadoBeber .
            "<br>Total a contribuir: " . $this->calcularTotal();
    }
}
