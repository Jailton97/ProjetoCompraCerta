<?php

require_once ("Model/Pedido.php");
require_once ("Model/PedidoDAO.php");

class ControllerHistoricoCliente
{
    private $pedido;
    private $pedidoDAO;

    public function __construct()
    {
        //$this->cliente = new Cliente();
        $this->pedidoDAO = new PedidoDAO();
    }

    public function processaRequisicao()
    {
        $listaPedidos = array();
        $listaPedidos = $this->pedidoDAO->recuperarPedidos();
        require_once("View/historicoPedidos.php");
    }
}