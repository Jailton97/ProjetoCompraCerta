<?php

require_once("Model/itemPedidoDAO.php");
require_once("Model/ItemPedido.php");
require_once("Model/statusPedidoDAO.php");

class ControllerListarItensPedidosConf
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
        $this->statusPedidoDAO->setaValorConferenciaFuncionario();
        require_once("View/ItensPedidoConf.php");
    }
}