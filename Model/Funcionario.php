<?php

class Funcionario {
    private  $idFuncionario;
    private $nomeFuncionario;
    private $cpf;
    private $setor; 

    public function __construct($nomeFuncionario, $cpf, $setor)
    { 
        $this->nomeFuncionario=$nomeFuncionario;
        $this->nomeFuncionario=$nomeFuncionario;
        $this->cpf=$cpf;
        $this->setor=$setor;
    }

    public function getIdFuncionario()
    {
        return $this->idFuncionario;
    }

    
    public function getNomeFuncionario()
    {
        return $this->nomeFuncionario;
    }

    public function setNomeFuncionario($nomeFuncionario)
    {
        $this->nomeFuncionario = $nomeFuncionario;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this; 
    }

    public function getSetor()
    {
        return $this->setor;
    }


    public function setSetor($setor)
    {
        $this->setor = $setor;

        return $this;
    }
}