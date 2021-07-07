<?php

class Endereco {
    private $id;
    private $rua;
    private $bairro;
    private $numero;
    private $cep;
    private $complemento;
    private $cliente;

    public function __construct($rua = null, $bairro = null, $numero = null, $cep = null, $complemento = null, $cliente = null)
    {
        $this->rua = $rua;
        $this->bairro = $bairro;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->complemento = $complemento;
        $this->cliente = $cliente;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getRua()
    {
        return $this->rua;
    }

    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
}