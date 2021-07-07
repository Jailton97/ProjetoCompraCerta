<?php

require_once("Model/CarrinhoSession.php");
require_once("Model/ItemPedido.php");

class ControllerListarCarrinho
{
    private $carrinho;

    public function __construct()
    {
        $this->carrinho = new CarrinhoSession();
    }

    public function processaRequisicao()
    {
        $itensCarrinho = $this->carrinho->getItensCarrinho();
        $carrinho = $this->carrinho;
        require("View/carrinho.php");
    }
}