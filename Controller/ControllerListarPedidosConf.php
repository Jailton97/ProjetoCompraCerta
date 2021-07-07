<?php

require_once("Model/PedidoDAO.php");

class ControllerListarPedidosConf
{
    private $pedidoDAO;

    public function __construct()
    {
        $this->pedidoDAO = new PedidoDAO();
    }

    public function processaRequisicao()
    {
        $listaPedidosEmConferencia = array();
        $listaPedidosEmConferencia = $this->pedidoDAO->recuperarPedidosEmConferencia();
        require_once("View/setorConferencia.php");
    }
}