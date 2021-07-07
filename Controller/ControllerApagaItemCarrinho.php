<?php

require_once("Model/CarrinhoSession.php");
require_once("Model/ItemPedido.php");

class ControllerApagaItemCarrinho
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
            $this->carrinhoSession->apagar($_POST['id']);
        }
        header('Location:Carrinho',true,302);
    }
}