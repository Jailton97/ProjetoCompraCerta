<?php

class EnderecoDAO{

    public function cadastrar($endereco, $cliente){
        require_once("Endereco.php");
        require_once("Cliente.php");
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare(" INSERT INTO endereco (id_cliente,rua,bairro,numero,cep,complemento) 
                                            VALUES(:id_cliente,:rua,:bairro,:numero,:cep,:complemento) ");
            $sql->bindParam("id_cliente",$id_cliente);
            $sql->bindParam("rua",$rua);
            $sql->bindParam("bairro",$bairro);
            $sql->bindParam("numero",$numero);
            $sql->bindParam("cep",$cep);
            $sql->bindParam("complemento",$complemento);

            $rua = $endereco->getRua();
            $bairro = $endereco->getBairro();
            $numero = $endereco->getNumero();
            $cep = $endereco->getCep();
            $complemento = $endereco->getComplemento();
            $id_cliente = $cliente->getId();

            $sql->execute();

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function pegarDadosEndereco()
    {
        require_once("Cliente.php");
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM endereco WHERE id_cliente = :id_cliente");
            $sql->bindParam("id_cliente", $id_cliente);

            $id_cliente = $_SESSION['id_cliente'];

            $sql->execute();

            if($sql->rowCount() > 0)
            {
                $resultado = array();
                
                while($temp = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $temp;
                }
                $_SESSION["id_endereco"] = $resultado[0]["id"];
                $_SESSION["rua"] = $resultado[0]["rua"];
                $_SESSION["bairro"] = $resultado[0]["bairro"];
                $_SESSION["numero"] = $resultado[0]["numero"];
                $_SESSION["cep"] = $resultado[0]["cep"];
                $_SESSION["complemento"] = $resultado[0]["complemento"];
            }
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function editarDadosEndereco($endereco)
    {
        require_once("Endereco.php");

        try 
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE endereco SET rua = :rua, bairro = :bairro ,numero = :numero, cep = :cep,
                                       complemento = :complemento WHERE id_cliente = :id_cliente");
            $sql->bindParam("rua", $rua);
            $sql->bindParam("bairro", $bairro);
            $sql->bindParam("numero", $numero);
            $sql->bindParam("cep", $cep);
            $sql->bindParam("complemento", $complemento);
            $sql->bindParam("id_cliente", $id_cliente);

            $rua = $endereco->getRua();
            $bairro = $endereco->getBairro();
            $numero = $endereco->getNumero();
            $cep = $endereco->getCep();
            $complemento = $endereco->getComplemento();
            $id_cliente = $_SESSION['id_cliente'];
            
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function excluirDadosEndereco($endereco)
    {
        require_once("Endereco.php");

        try 
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("DELETE FROM endereco WHERE id_cliente = :id_cliente");
            
            $sql->bindParam("id_cliente", $id_cliente);

            $id_cliente = $_SESSION['id_cliente'];
            
            $sql->execute();
        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function recuperaEnderecosClientes($clientes)
    {
        require_once("Endereco.php");
        require_once("Cliente.php");
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM endereco e
                                           INNER JOIN cliente c ON e.id_cliente = c.id
                                           WHERE c.id = :id_cliente");
            
            $resultado = array();
            $i = 0;
            
            foreach($clientes as $cliente)
            {
                $sql->bindParam("id_cliente", $id_cliente);
                $id_cliente = $cliente->getId();
                $sql->execute();
                $endereco = new Endereco();
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $endereco->setRua($linha['rua']);
                    $endereco->setBairro($linha['bairro']);
                    $endereco->setNumero($linha['numero']);
                    $endereco->setCep($linha['cep']);
                    $endereco->setComplemento($linha['complemento']);
                    $endereco->setCliente($cliente);
                    $resultado[$i] = $endereco;
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
}