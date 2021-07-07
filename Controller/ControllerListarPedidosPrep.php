<?php

require_once("Model/PedidoDAO.php");

class ControllerListarPedidosPrep
{
    private $pedidoDAO;

    public function __construct()
    {
        $this->pedidoDAO = new PedidoDAO();
    }

    public function processaRequisicao()
    {
        $listaPedidosEmEspera = array();
        $listaPedidosEmEspera = $this->pedidoDAO->recuperarPedidosEmEspera();
        require_once("View/setorPreparacao.php");
    }
}