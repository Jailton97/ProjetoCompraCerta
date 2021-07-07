<?php

class Promocoes {
    private $id;
    private $desconto;
    private $dataPromocao;

    public function __construct($desconto, $dataPromocao)
    { 
        $this->nome=$desconto;
        $this->marca=$dataPromocao;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;
    }

    public function getDataPromo()
    {
        return $this->dataPromocao;
    }

    public function setDataPromo($dataPromocao)
    {
        $this->dataPromocao = $dataPromocao;
    }
}