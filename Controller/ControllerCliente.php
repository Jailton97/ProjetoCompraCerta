<?php

    require("Model/Cliente.php");
    require("Model/Endereco.php");
    require("Model/ClienteDAO.php");
    require("Model/EnderecoDAO.php");

class ControllerCliente
{
    private $cliente;
    private $endereco;
    private $clienteDAO;
    private $enderecoDAO;

    public function __construct()
    {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $tel_cel = $_POST['telCel'];
        $senha = $_POST['senha2'];

        $rua = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $numero = $_POST['num'];
        $cep = $_POST['cep'];
        $complemento = $_POST['complemento'];

        $this->cliente = new Cliente($nome, $email, $cpf, $tel_cel, $senha);
        $this->endereco = new Endereco($rua, $bairro, $numero, $cep, $complemento, $this->cliente);
        $this->EnderecoDAO = new EnderecoDAO();
        $this->clienteDAO = new ClienteDAO();
    }
    
    public function processaRequisicao()
    {
        $this->clienteDAO->cadastrar($this->cliente);
        $this->EnderecoDAO->cadastrar($this->endereco, $this->cliente);
        require_once('View/home.php');
    }
    

    
}