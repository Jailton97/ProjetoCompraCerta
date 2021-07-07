<?php


require_once "Model/ItemPedido.php";
require_once "Model/ItemPedidoDAO.php";



class ControllerListarItensHistorico {
    private $listaHistoricoProdutos;
    private $produto;
    private $itemPedidoDAO;


    public function __construct(){
        $this->itemPedidoDAO = new itemPedidoDAO();
    }

    public function recuperaProdutos(){
        $listaHistoricoProdutos = array();
        $listaHistoricoProdutos = $this->itemPedidoDAO->recuperarItensPedido();
        require "View/detalhesPedido.php";
    }

  

}
    
    
?>