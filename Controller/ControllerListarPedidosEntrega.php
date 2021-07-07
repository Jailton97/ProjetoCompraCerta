<?php

require_once("Model/PedidoDAO.php");
require_once("Model/statusPedidoDAO.php");
require_once("Model/ClienteDAO.php");
require_once("Model/EnderecoDAO.php");

class ControllerListarPedidosEntrega
{
    private $pedidoDAO;
    private $statusPedidoDAO;
    private $clienteDAO;
    private $enderecoDAO;

    public function __construct()
    {
        $this->pedidoDAO = new PedidoDAO();
        $this->statusPedidoDAO = new statusPedidoDAO();
        $this->clienteDAO = new ClienteDAO();
        $this->enderecoDAO = new EnderecoDAO();
    }

    public function processaRequisicao()
    {
        $listaPedidosEmEntrega = array();
        $listaPedidosEmEntrega = $this->pedidoDAO->recuperarPedidosEmEntrega();
        $listaStatusPedidos = array();
        $listaStatusPedidos = $this->statusPedidoDAO->recuperaStatusPedidos($listaPedidosEmEntrega);
        $listaNomesClientes = $this->clienteDAO->recuperaNomesClientes($listaPedidosEmEntrega);
        $listaEnderecos = $this->enderecoDAO->recuperaEnderecosClientes($listaNomesClientes);

        require_once("View/setorEntrega.php");
    }
}