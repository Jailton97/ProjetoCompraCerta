<?php

require ("Conexao.php");

class funcionarioDAO
{

    public function logarFuncionario()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM funcionario WHERE cpf = :cpf");
            $sql->bindParam("cpf", $cpf);
            
            $cpf = $_POST['cpf'];
            
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                $resultado = array();
                
                while($temp = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $temp;
                }

                $_SESSION["id_funcionario"] = $resultado[0]["id"];
                $_SESSION["nome_funcionario"] = $resultado[0]["nome"];
                $_SESSION["cpf_funcionario"] = $resultado[0]["cpf"];
                $_SESSION["setor"] = $resultado[0]["setor_status"];

                if($_SESSION["setor"] == 2)
                {
                    header('Location:LISTARPEDIDOSPREP', true,302);
                } 
                else if($_SESSION["setor"] == 3)
                {
                    header('Location:LISTARPEDIDOSCONF', true,302);
                }
                else if($_SESSION["setor"] == 4)
                {
                    header('Location:LISTARENTREGAS', true,302);
                }
            }
            else
            {
                echo "FUNCIONARIO NÃO LOGOU";
            }

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }
}