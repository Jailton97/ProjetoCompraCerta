<?php

class StatusPedido {
    private $idStatusPedido;
    private $dataCompra;
    private $id_pedido;
    private $id_funcionario;
    private $statusPedido;

    public function __construct()
    { 
        
    }

    public function criaStatusPedido($idStatusPedido, $id_pedido, $id_funcionario, $data, $statusPedido)
    {
        $this->idStatusPedido = $idStatusPedido;
        $this->id_pedido = $id_pedido;
        $this->id_funcionario = $id_funcionario;
        $this->dataCompra = $data;
        $this->statusPedido = $statusPedido;
    }

    public function getIdPedido()
    {
        return $this->id_pedido;
    }

    public function setIdPedido($id_pedido)
    {
        $this->id_pedido = $id_pedido;
    }

    public function getIdFuncionario()
    {
        return $this->id_funcionario;
    }

    public function setIdFuncionario($id_funcionario)
    {
        $this->id_funcionario = $id_funcionario;
    }

    public function getStatusPedido()
    {
        return $this->statusPedido;
    }

    public function setStatusPedido($statusPedido)
    {
        $this->statusPedido = $statusPedido;
    }
 
    public function getIdStatusPedido()
    {
        return $this->idStatusPedido;
    }

    public function setIdStatusPedido($idStatusPedido)
    {
        $this->idStatusPedido = $idStatusPedido;
    }

    public function getDataCompra()
    {
        return $this->dataCompra;
    }

    public function setDataCompra($dataCompra)
    {
        $this->dataCompra = $dataCompra;
    }
}

