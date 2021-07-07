<?php

require("Model/ClienteDAO.php");
require("Model/EnderecoDAO.php");

class ControllerEndereco
{
    private $enderecoDAO;

    public function __construct()
    {
        $this->enderecoDAO = new EnderecoDAO();
    }

    public function processaRequisicao()
    {
        $this->enderecoDAO->pegarDadosEndereco();
        require "View/cadastroCliente.php";
    }

}