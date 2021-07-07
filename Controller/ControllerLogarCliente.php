<?php

require ("Model/ClienteDAO.php");

class ControllerLogarCliente
{
    
    private $clienteDAO;

    public function __construct()
    {
        $this->clienteDAO = new ClienteDAO();
    }
    public function processaRequisicao()
    {
        $this->clienteDAO->logarCliente();
    }
}