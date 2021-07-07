<?php

require_once("Conexao.php");

class PedidoDAO
{

    public function recuperarPedidos()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM pedido WHERE id_cliente = :id_cliente");
            $sql->bindParam("id_cliente", $_SESSION['id_cliente']);
            $sql->execute();

            $listaPedidos = array();
            if($sql->rowCount() > 0)
            {
                
                $i = 0;
                while($linha = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $pedido = new Pedido();
                    
                    $pedido->setIdPedido($linha['id']);
                    $pedido->setDataPedido($linha['data_pedido']);
                    $pedido->setDataEntrega($linha['data_entrega']);
                    $pedido->setAvaliacao($linha['avaliacao']);
                    $pedido->setComentario($linha['comentario']);
                    $pedido->setValorTotal($linha['valor_total']);
                    $listaPedidos[$i] = $pedido;
                    $i++;
                }
            }
                return $listaPedidos;
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage(); 
        }
    }

    public function cadastrarPedido()
    {

        require_once("Pedido.php");

        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("INSERT INTO pedido (id_cliente, data_pedido, valor_total) 
                                           VALUES (:id_cliente, :data_pedido, :valor_total)");
            $sql->bindParam("id_cliente", $_SESSION['id_cliente']);
            $sql->bindParam("data_pedido", $data);
            $sql->bindParam("valor_total", $valor_total);

            $valor_total = $_POST['valor_total'];
            $data = date('Y-m-d H:i:s');

            $sql->execute();
            $pedido = new Pedido();
            $id_pedido = $minhaConexao->lastInsertId();
            $pedido->setIdPedido($id_pedido);
            $pedido->setDataPedido($data);
            $pedido->setValorTotal($valor_total);
            return $pedido; // Retorna o pedido para usar em statusPedido e em ItemPedido
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage(); 
        }
    }

    public function recuperarPedidosEmEspera()
    {
        require_once('Pedido.php');
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT p.id, p.data_pedido,p.data_entrega,p.avaliacao,p.comentario,p.valor_total FROM pedido p
                                           INNER JOIN statuspedido sp ON p.id = sp.id_pedido
                                           WHERE sp.status_pedido = 1 OR sp.status_pedido = 2");
            $sql->execute();

            $listaPedidos = array();
            if($sql->rowCount() > 0)
            {
                
                $i = 0;
                while($linha = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $pedido = new Pedido();
                    
                    $pedido->setIdPedido($linha['id']);
                    $pedido->setDataPedido($linha['data_pedido']);
                    $pedido->setDataEntrega($linha['data_entrega']);
                    $pedido->setAvaliacao($linha['avaliacao']);
                    $pedido->setComentario($linha['comentario']);
                    $pedido->setValorTotal($linha['valor_total']);
                    $listaPedidos[$i] = $pedido;
                    $i++;
                }
            }
                return $listaPedidos;
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage(); 
        }
    }

    public function recuperarPedidosEmConferencia()
    {
        require_once('Pedido.php');
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT p.id, p.data_pedido,p.data_entrega,p.avaliacao,p.comentario,p.valor_total FROM pedido p
                                           INNER JOIN statuspedido sp ON p.id = sp.id_pedido
                                           WHERE sp.status_pedido = 3");
            $sql->execute();

            $listaPedidos = array();
            if($sql->rowCount() > 0)
            {
                
                $i = 0;
                while($linha = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $pedido = new Pedido();
                    
                    $pedido->setIdPedido($linha['id']);
                    $pedido->setDataPedido($linha['data_pedido']);
                    $pedido->setDataEntrega($linha['data_entrega']);
                    $pedido->setAvaliacao($linha['avaliacao']);
                    $pedido->setComentario($linha['comentario']);
                    $pedido->setValorTotal($linha['valor_total']);
                    $listaPedidos[$i] = $pedido;
                    $i++;
                }
            }
                return $listaPedidos;
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage(); 
        }
    }

    public function recuperarPedidosEmEntrega()
    {
        require_once('Pedido.php');
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT p.id, p.data_pedido,p.data_entrega,p.avaliacao,p.comentario,p.valor_total FROM pedido p
                                           INNER JOIN statuspedido sp ON p.id = sp.id_pedido
                                           WHERE sp.status_pedido >= 4");
            $sql->execute();

            $listaPedidos = array();
            if($sql->rowCount() > 0)
            {
                
                $i = 0;
                while($linha = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $pedido = new Pedido();
                    
                    $pedido->setIdPedido($linha['id']);
                    $pedido->setDataPedido($linha['data_pedido']);
                    $pedido->setDataEntrega($linha['data_entrega']);
                    $pedido->setAvaliacao($linha['avaliacao']);
                    $pedido->setComentario($linha['comentario']);
                    $pedido->setValorTotal($linha['valor_total']);
                    $listaPedidos[$i] = $pedido->getIdPedido();
                    $i++;
                }
            }
                return $listaPedidos;
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage(); 
        }
    }
}