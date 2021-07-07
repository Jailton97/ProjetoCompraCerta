<?php

require_once ('ItemPedido.php');

class CarrinhoSession
{
    private $itens = array();

    public function __construct()
    {
        $this->itens = $this->restaura();
    }

    public function restaura()
    {
        if($_SESSION['carrinho2'])
        {
            return unserialize($_SESSION['carrinho2']);
        }
        else
        {
            return array();
        }
    }

    public function verificaProdutoCarrinho($id)
    {
        // Verifica se um determinado produto já se encontra presente no carrinho
        return isset($this->itens[$id]);
    }

    public function adicionarItem($item)
    {
        $id = $item->getProduto()->getId();
        if(!$this->verificaProdutoCarrinho($id))
        {
            $this->itens[$id] = $item;
        }
        else
        {
            $this->itens[$id]->setQuantidade($this->itens[$id]->getQuantidade() + 1);
        }
    }

    public function atualizar($item)
    {
        $id = $item->getProduto()->getId();
        if($this->verificaProdutoCarrinho($id))
        {
            if($item->getQuantidade() == 0)
            {
                $this->apagar($id);
                return;
            }
            $this->itens[$id] = $item;
        }
    }

    public function apagar($id)
    {
        if($this->verificaProdutoCarrinho($id))
        {
            unset($this->itens[$id]);
        }
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->itens as $item)
        {
            $total += $item->getSubTotal();
        }
        return $total;
    }

    public function getItensCarrinho()
    {
        return $this->itens;
    }

    public function __destruct()
    {
        $_SESSION['carrinho2'] = serialize($this->itens);
    }
}