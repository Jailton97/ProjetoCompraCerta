<?php

require_once("Conexao.php");
require_once("Model/StatusPedido.php");

class statusPedidoDAO
{

    public function cadastrarStatusPedido($pedido)
    {
        require_once("StatusPedido.php");
        require_once("Pedido.php");

        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("INSERT INTO statuspedido(id_pedido, data_compra, status_pedido)
                                    VALUES (:id_pedido, :data_compra, :status_pedido)");
            $sql->bindParam("id_pedido", $id_pedido);                                    
            $sql->bindParam("data_compra", $data_compra);
            $sql->bindParam("status_pedido", $status_pedido);

            $id_pedido = $pedido->getIdPedido();
            $data_compra = $pedido->getDataPedido();
            $status_pedido = 1; // Status de 'EM ESPERA' do banco de dados

            $sql->execute();

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function rastrearCompra()
    {
        
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM statuspedido sp
                                           INNER JOIN pedido p ON sp.id_pedido = p.id
                                           INNER JOIN cliente c ON p.id_cliente = c.id
                                           WHERE c.id = :id_cliente AND sp.status_pedido <= 5");

            $sql->bindParam("id_cliente", $_SESSION['id_cliente']);

            $sql->execute();

            if($sql->rowCount() > 0)
            {
                $resultado = array();
                $i = 0;
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $statusPedido = new StatusPedido();
                    $statusPedido->setIdPedido($linha['id_pedido']);
                    $statusPedido->setIdFuncionario($linha['id_funcionario']);
                    $statusPedido->setDataCompra($linha['data_compra']);
                    $statusPedido->setStatusPedido($linha['status_pedido']);
                    $resultado[$i] = $statusPedido;
                    $i++;
                } 
                return $resultado;
            }
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function setaValorPreparacao()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE statuspedido SET id_funcionario = :id_funcionario, status_pedido = 2
                                           WHERE id_pedido = :id_pedido");    
            $sql->bindParam("id_pedido",$_POST['id_pedido']);
            $sql->bindParam("id_funcionario",$_SESSION['id_funcionario']);
            $_SESSION['id_pedido'] = $_POST['id_pedido']; // Guarda na sessao para usar na outra tela de enviar para conferência
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function setaValorPreparacao2()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE statuspedido SET status_pedido = 2
                                           WHERE id_pedido = :id_pedido");    
            $sql->bindParam("id_pedido",$_SESSION['id_pedido']);
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function setaValorConferencia()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE statuspedido SET id_funcionario = NULL, status_pedido = 3
                                           WHERE id_pedido = :id_pedido");    
            $sql->bindParam("id_pedido",$_SESSION['id_pedido']);
            
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function setaValorConferenciaFuncionario()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE statuspedido SET id_funcionario = :id_funcionario, status_pedido = 3
                                           WHERE id_pedido = :id_pedido");    
            $sql->bindParam("id_pedido",$_POST['id_pedido']);
            $sql->bindParam("id_funcionario",$_SESSION['id_funcionario']);
            $_SESSION['id_pedido'] = $_POST['id_pedido']; // Guarda na sessao para usar na outra tela de enviar para conferência
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function setaValorEntrega()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE statuspedido SET id_funcionario = NULL, status_pedido = 4
                                           WHERE id_pedido = :id_pedido");    
            $sql->bindParam("id_pedido",$_SESSION['id_pedido']);
            
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function recuperaStatusPedidos($id_pedidos)
    {
        require_once('StatusPedido.php');
        require_once('Pedido.php');
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM statuspedido
                                           WHERE id_pedido = :id_pedido");
            
            $resultado = array();
            $i = 0;
            
            foreach($id_pedidos as $id_pedido)
            {
                $sql->bindParam("id_pedido", $id_pedido);
                $sql->execute();
                $status_pedido = new StatusPedido();
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $status_pedido->setStatusPedido($linha['status_pedido']);
                    $resultado[$i] = $status_pedido->getStatusPedido();
                    $i++;
                }
            }
            return $resultado;
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function setaValorEntregar()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE statuspedido SET status_pedido = 5
                                           WHERE id_pedido = :id_pedido");    
            $sql->bindParam("id_pedido",$_POST['id_pedido_entregar']);
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function setaValorNaoEntregar()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE statuspedido SET status_pedido = 6
                                           WHERE id_pedido = :id_pedido");    
            $sql->bindParam("id_pedido",$_POST['id_pedido_entregar']);
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }
}