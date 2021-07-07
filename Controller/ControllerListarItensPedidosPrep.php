<?php

require_once("Model/itemPedidoDAO.php");
require_once("Model/ItemPedido.php");
require_once("Model/statusPedidoDAO.php");

class ControllerListarItensPedidosPrep
{
    private $itemPedidoDAO;
    private $statusPedidoDAO;

    public function __construct()
    {
        $this->itemPedidoDAO = new itemPedidoDAO();
        $this->statusPedidoDAO = new statusPedidoDAO();

    }

    public function processaRequisicao()
    {
        $listaItens = array();
        $listaItens = $this->itemPedidoDAO->recuperarItensPedidoPrep();
        $this->statusPedidoDAO->setaValorPreparacao();
        require_once("View/ItensPedidoPrep.php");
    }
}