<?php

require_once("Model/Cliente.php");
require_once("Model/Endereco.php");
require_once('Model/ClienteDAO.php');
require_once('Model/EnderecoDAO.php');

class ControllerExcluirConta
{
    private $cliente;
    private $endereco;
    private $clienteDAO;
    private $enderecoDAO;

    public function __construct()
    {
        $nome = $_SESSION['nome_cliente'];
        $email = $_SESSION['email'];
        $cpf = $_SESSION['cpf'];
        $tel_cel = $_SESSION['tel_cliente'];
        $senha = $_SESSION['senha'];
    
        $rua = $_SESSION['rua'];
        $bairro = $_SESSION['bairro'];
        $numero = $_SESSION['numero'];
        $cep = $_SESSION['cep'];
        $complemento = $_SESSION['complemento'];

        $this->cliente = new Cliente($nome, $email, $cpf, $tel_cel, $senha);
        $this->endereco = new Endereco($rua, $bairro, $numero, $cep, $complemento, $this->cliente);
        $this->clienteDAO = new ClienteDAO();
        $this->enderecoDAO = new EnderecoDAO();
    }

    public function processaRequisicao()
    {
        $this->enderecoDAO->excluirDadosEndereco($this->endereco);
        $this->clienteDAO->excluirDadosCliente($this->cliente);
        session_destroy();
        require_once("View/home.php");
    }
}

