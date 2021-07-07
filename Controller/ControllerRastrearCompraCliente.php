<?php

require_once("Model/statusPedidoDAO.php");

class ControllerRastrearCompraCliente
{
    private $statusPedidoDAO;

    public function __construct()
    {
        $this->statusPedidoDAO = new StatusPedidoDAO();    
    }

    public function processaRequisicao()
    {
        $rastreio = array();
        $rastreio = $this->statusPedidoDAO->rastrearCompra();
        require_once("View/rastrearCompraCliente.php");
    }
}