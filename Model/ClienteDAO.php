<?php
require_once("Conexao.php");

class ClienteDAO{

    public function cadastrar($cliente)
    {
        require_once("Cliente.php");

        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare(" INSERT INTO cliente (nome,email,cpf,tel_cel,senha) VALUES(:nome,:email,:cpf,:tel_cel,:senha) ");
            $sql->bindParam("nome",$nome);
            $sql->bindParam("email",$email);
            $sql->bindParam("cpf",$cpf);
            $sql->bindParam("tel_cel",$tel_cel);
            $sql->bindParam("senha",$senha);
            $nome = $cliente->getNome();
            $email = $cliente->getEmail();
            $cpf = $cliente->getCpf();
            $tel_cel = $cliente->getTelCelular();
            $senha = $cliente->getSenha();
            $sql->execute();

            $id_cliente = $minhaConexao->lastInsertId();
            $cliente->setId($id_cliente);

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function logarCliente()
    {
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM cliente WHERE email = :email AND senha = :senha");
            $sql->bindParam("email", $email);
            $sql->bindParam("senha", $senha);
            $email = $_POST['email'];
            $senha = $_POST['password'];
            $sql->execute();
            if($sql->rowCount() > 0)
            {
                $resultado = array();
                
                while($temp = $sql->fetch(PDO::FETCH_ASSOC))
                {
                    $resultado[] = $temp;
                }
                $_SESSION["id_cliente"] = $resultado[0]["id"];
                $_SESSION["nome_cliente"] = $resultado[0]["nome"];
                $_SESSION["email_cliente"] = $resultado[0]["email"];
                $_SESSION["cpf_cliente"] = $resultado[0]["cpf"];
                $_SESSION["tel_cliente"] = $resultado[0]["tel_cel"];
                $_SESSION["senha"] = $resultado[0]["senha"];
                
                header('Location:index.php', true,302);
            }
            else
            {
                echo "CLIENTE NÃO LOGOU";
            }

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function editarDadosCliente($cliente)
    {
        require_once("Cliente.php");
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("UPDATE cliente SET nome = :nome, email = :email, cpf = :cpf, tel_cel = :tel_cel, senha = :senha
                                           WHERE id = :id_cliente");    
            $sql->bindParam("nome",$nome);
            $sql->bindParam("email",$email);
            $sql->bindParam("cpf",$cpf);
            $sql->bindParam("tel_cel",$tel_cel);
            $sql->bindParam("senha",$senha);
            $sql->bindParam("id_cliente", $id_cliente);
            $nome = $cliente->getNome();
            $email = $cliente->getEmail();
            $cpf = $cliente->getCpf();
            $tel_cel = $cliente->getTelCelular();
            $senha = $cliente->getSenha();
            $id_cliente = $_SESSION["id_cliente"];
            $sql->execute();

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function excluirDadosCliente($cliente)
    {
        require_once("Cliente.php");
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("DELETE FROM cliente WHERE id = :id_cliente");    
            
            $sql->bindParam("id_cliente", $id_cliente);

            $id_cliente = $_SESSION["id_cliente"];
            $sql->execute();

        }
        catch(PDOException $e)
        {
            return "Mensagem de erro ".$e->getMessage();
        }
    }

    public function recuperaNomesClientes($id_pedidos)
    {
        require_once('Cliente.php');
        try
        {
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM cliente c
                                           INNER JOIN pedido p ON c.id = p.id_cliente
                                           WHERE p.id = :id_pedido");
            
            $resultado = array();
            $i = 0;
            
            foreach($id_pedidos as $id_pedido)
            {
                $sql->bindParam("id_pedido", $id_pedido);
                $sql->execute();
                $cliente = new Cliente();
                while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                    $cliente->setId($linha['id']);
                    $cliente->setNome($linha['nome']);
                    $cliente->setTelCelular($linha['tel_cel']);
                    $resultado[$i] = $cliente;
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