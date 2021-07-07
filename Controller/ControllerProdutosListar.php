<?php


require_once "Model/Produto.php";


class ControllerProdutosListar {
    private $produto;

    public function __construct(){
        $this->produto = new Produto();
    }

    public function processaRequisicao(){
        $listaProdutos = $this->produto->listarTodos();
        require "View/Produtos.php";
    }

    public function listarCategoria(){
        $listaProdutos = $this->produto->listarCategoria();
        require "View/Produtos.php";
    }


}
    
    
?>