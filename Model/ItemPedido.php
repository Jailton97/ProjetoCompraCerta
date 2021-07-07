<?php 

require_once("Produto.php");

class ItemPedido {
    private $produto;
    private $idItemPedido;
    private $quantidade;
    

    public function __construct($id, $quantidade)
    { 
        $this->produto = new Produto();
        $this->produto->setId($id);
        $this->produto->mostrarProduto();
        $this->quantidade=$quantidade;
    }

    public function getProduto()
    {
        return $this->produto;
    }

    public function setProduto($produto)
    {
        $this->produto = $produto;
    }

    public function getSubTotal()
    {
        return $this->produto->getPreco() * $this->quantidade;
    }

    public function getIdItemPedido()
    {
        return $this->idItemPedido;
    }

    public function setIdItemPedido($idItemPedido)
    {
        $this->idItemPedido = $idItemPedido;

        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }
}