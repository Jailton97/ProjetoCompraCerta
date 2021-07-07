<?php

require_once("Conexao.php");
require_once("CarrinhoSession.php");
require_once("ItemPedido.php");
require_once("statusPedido.php");

class itemPedidoDAO
{
    private $carrinho;

    public function cadastrarItensPedido($pedido)
    {

        $this->carrinho = new CarrinhoSession();
        $itensCarrinho = $this->carrinho->getItensCarrinho();
    
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("INSERT INTO itempedido(id_produto,id_pedido,quantidade)
                                            VALUES(:id_produto, :id_pedido, :quantidade)");
            foreach($itensCarrinho as $item)
            {
                $sql->bindParam("id_produto", $id_produto);
                $sql->bindParam("id_pedido", $id_pedido);
                $sql->bindParam("quantidade", $quantidade);

                $id_pedido = $pedido->getIdPedido();
                $id_produto = $item->getProduto()->getId();
                $quantidade = $item->getQuantidade();
                $sql->execute();
            }

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }
    
    public function recuperarItensPedido(){      
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT p.nome, p.marca, p.descricao, p.preco FROM produto as p
                                            INNER JOIN itempedido as ip
                                            ON p.id = ip.id_produto
                                            INNER JOIN pedido as ped
                                            ON ped.id = ip.id_pedido
                                            INNER JOIN cliente as cli
                                            ON ped.id_cliente = cli.id
                                            WHERE cli.id = :id_cliente AND ped.id = :id_pedido"); 
            
            $sql->bindParam("id_cliente", $_SESSION['id_cliente']);
            $sql->bindParam("id_pedido", $_POST['id_pedido']);

            $sql->execute();


            if($sql->rowCount() > 0)
            {
                $resultado = array();
                $i = 0;
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $item = new Produto();
                    $item->setNome($linha['nome']);
                    $item->setMarca($linha['marca']);
                    $item->setDescricao($linha['descricao']);
                    $item->setPreco($linha['preco']);
                    $resultado[$i] = $item;
                    $i++;
                } 
                return $resultado;
            }
                
             }
              catch(PDOException $e){
                  echo "entrou no catch".$e->getmessage();
                  exit();
            }
    }

    public function recuperarItensPedidoPrep(){      
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT p.nome, p.marca, p.descricao, p.preco FROM produto as p
                                            INNER JOIN itempedido as ip
                                            ON p.id = ip.id_produto
                                            INNER JOIN pedido as ped
                                            ON ped.id = ip.id_pedido
                                            WHERE ped.id = :id_pedido"); 
            

            $sql->bindParam("id_pedido", $_POST['id_pedido']);

            $sql->execute();


            if($sql->rowCount() > 0)
            {
                $resultado = array();
                $i = 0;
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $item = new Produto();
                    $item->setNome($linha['nome']);
                    $item->setMarca($linha['marca']);
                    $item->setDescricao($linha['descricao']);
                    $item->setPreco($linha['preco']);
                    $resultado[$i] = $item;
                    $i++;
                } 
                return $resultado;
            }
                
             }
              catch(PDOException $e){
                  echo "entrou no catch".$e->getmessage();
                  exit();
            }
    }


}