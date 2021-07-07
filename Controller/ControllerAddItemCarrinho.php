<?php

require_once("Model/CarrinhoSession.php");
require_once("Model/ItemPedido.php");

class ControllerAddItemCarrinho
{
    private $carrinhoSession;

    public function __construct($carrinhoSession)
    {
        $this->carrinhoSession = $carrinhoSession;
    }

    public function processaRequisicao()
    {
        if(isset($_POST['id_prod']))
        {
            $itemCarrinho = new itemPedido($_POST['id_prod'], 1);
            $this->carrinhoSession->adicionarItem($itemCarrinho);
        }
        header('Location:carrinho', true, 302);
    }
}