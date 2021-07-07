<?php

require_once("Conexao.php");

class PagamentoDAO
{

    public function cadastrarPagamento($pedido)
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("INSERT INTO pagamento(id_pedido, num_cartao,codigo_verificacao)
                                           VALUES(:id_pedido, :num_cartao, :codigo_cartao)");
            $sql->bindParam("id_pedido", $id_pedido);
            $sql->bindParam("num_cartao", $_POST['num_cartao']);
            $sql->bindParam("codigo_cartao", $_POST['codigo_cartao']);
            
            $id_pedido = $pedido->getIdPedido();

            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }
}