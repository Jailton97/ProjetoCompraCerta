<?php

class Pagamento {
    private $idPagamento;
    private $valor;
    private $numCartao;
    private $cvv;

    public function __construct($valor, $numCartao, $cvv)
    { 
        $this->valor=$valor;
        $this->numCartao=$numCartao;
        $this->cvv=$cvv;
    }

    public function getIdPagamento()
    {
        return $this->idPagamento;
    }

    
    public function setIdPagamento($idPagamento)
    {
        $this->idPagamento = $idPagamento;

        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    public function getNumCartao()
    {
        return $this->numCartao;
    }

    public function setNumCartao($numCartao)
    {
        $this->numCartao = $numCartao;

        return $this;
    }

    public function getCvv()
    {
        return $this->cvv;
    }

    public function setCvv($cvv)
    {
        $this->cvv = $cvv;

        return $this;
    }
}
