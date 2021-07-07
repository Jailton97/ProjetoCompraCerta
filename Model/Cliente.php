<?php

class Cliente {
    private $id;
    private $nome;
    private $email;
    private $cpf;
    private $telCelular;
    private $senha;
    private $cliente;

    public function __construct($nome = null, $email = null, $cpf = null, $telCelular = null, $senha = null)
    { 
        $this->nome=$nome;
        $this->email=$email;
        $this->cpf=$cpf;
        $this->telCelular=$telCelular;
        $this->senha = $senha;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    public function getTelCelular()
    {
        return $this->telCelular;
    }

    public function setTelCelular($telCelular)
    {
        $this->telCelular = $telCelular;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

}