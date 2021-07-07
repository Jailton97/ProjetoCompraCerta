<?php

class Pedido {
    private $idPedido;
    private $dataPedido;
    private $dataEntrega;
    private $avaliacao;
    private $comentario;
    private $valorTotal;
    private $status;

    //public function __construct($dataPedido, $dataEntrega, $avaliacao, $comentario, $valorTotal, $status)
    /*{
        $this->dataPedido = $dataPedido;
        $this->dataEntrega = $dataEntrega;
        $this->avaliacao = $avaliacao;
        $this->comentario = $comentario;
        $this->valorTotal = $valorTotal;
        $this->status = $status;
    }*/

    public function __construct()
    {

    }

    public function setIdPedido($id)
    {
        $this->idPedido = $id;
    }

    public function getIdPedido()
    {
        return $this->idPedido;
    }

    public function getDataPedido()
    {
        return $this->dataPedido;
    }


    public function setDataPedido($dataPedido)
    {
        $this->dataPedido = $dataPedido;

        return $this;
    }

    public function getDataEntrega()
    {
        return $this->dataEntrega;
    }

    public function setDataEntrega($dataEntrega)
    {
        $this->dataEntrega = $dataEntrega;

        return $this;
    }

    public function getAvaliacao()
    {
        return $this->avaliacao;
    }

    public function setAvaliacao($avaliacao)
    {
        $this->avaliacao = $avaliacao;

        return $this;
    }
 
    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario)
    {
        $this->comentario = $comentario;

        return $this;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
