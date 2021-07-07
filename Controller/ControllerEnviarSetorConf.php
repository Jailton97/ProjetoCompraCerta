<?php

require_once("Model/itemPedidoDAO.php");
require_once("Model/ItemPedido.php");
require_once("Model/statusPedidoDAO.php");

class ControllerEnviarSetorConf
{

    private $statusPedidoDAO;

    public function __construct()
    {
        $this->statusPedidoDAO = new statusPedidoDAO();
    }

    public function processaRequisicao()
    {
        $this->statusPedidoDAO->setaValorConferencia();
    }

}