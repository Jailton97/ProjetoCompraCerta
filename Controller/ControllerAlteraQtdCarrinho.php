<?php

require_once("Model/CarrinhoSession.php");
require_once("Model/ItemPedido.php");

class ControllerAlteraQtdCarrinho
{
    private $carrinhoSession;

    public function __construct($carrinhoSession)
    {
        $this->carrinhoSession = $carrinhoSession;
    }

    public function processaRequisicao()
    {

        if(isset($_POST['id']))
        {
            $itemCarrinho = new ItemPedido($_POST['id'], $_POST['qtd']);
            $this->carrinhoSession->atualizar($itemCarrinho);
        }
        
        header("Location:Carrinho", true, 302);
    }
}
