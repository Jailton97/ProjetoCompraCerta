<?php

require_once('Model/Pedido.php');
require_once('Model/PedidoDAO.php');
require_once('Model/statusPedidoDAO.php');
require_once('Model/itemPedidoDAO.php');
require_once('Model/PagamentoDAO.php');

class ControllerFinalizarCompra
{

    private $pedidoDAO;
    private $statusPedidoDAO;
    private $itemPedidoDAO;
    private $pagamentoDAO;
    private $pedido;

    public function __construct()
    {
        $this->pedidoDAO = new PedidoDAO();  
        $this->statusPedidoDAO = new statusPedidoDAO();
        $this->itemPedidoDAO = new ItemPedidoDAO();
        $this->pagamentoDAO = new PagamentoDAO();
        $this->pedido = new Pedido();  
    }

    public function processaRequisicao()
    {
        $this->pedido = $this->pedidoDAO->cadastrarPedido();
        $this->statusPedidoDAO->cadastrarStatusPedido($this->pedido);
        $this->itemPedidoDAO->cadastrarItensPedido($this->pedido);
        $this->pagamentoDAO->cadastrarPagamento($this->pedido);
        require_once("View/home.php");
    }

}