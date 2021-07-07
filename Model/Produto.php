<?php
require_once 'ProdutoDAO.php';

class Produto {
    private $id;
    private $nome;
    private $marca;
    private $descricao;
    private $preco;
    private $imagem;
    private $categoria;


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }

    public function getImagem()
    {
        return $this->imagem;
    }

    public function setImagem($img)
    {
        $this->imagem = $img;
    }

    public function listarTodos(){
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->listarTodos();
    }

    public function mostrarProduto(){
        $produtoDAO = new ProdutoDAO();
        $produtoDAO->mostrarProduto($this);
    }

    public function listarCategoria(){
        $produtoDAO = new ProdutoDAO();
        return $produtoDAO->listarCategoria();
    }


    public function getCategoria()
    {
        return $this->categoria;
    }


    public function setCategoria(Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
}