<?php


require_once "Model/Produto.php";


class ControllerMostrarProduto {
    private $produto;

    public function __construct(){
        $this->produto = new Produto();
    }

    public function mostrarProduto(){
        $this->produto->setId($_POST['id']);
        $this->produto->mostrarProduto();
        $id = $this->produto->getId();
        $nome = $this->produto->getNome();
        $marca = $this->produto->getMarca();
        $descricao = $this->produto->getDescricao();
        $preco = $this->produto->getPreco();
        $imagem = $this->produto->getImagem();

        require "View/PaginaProduto.php";

    }

    

}
    
    
?>