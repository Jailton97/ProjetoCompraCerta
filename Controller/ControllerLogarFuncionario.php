<?php

require ("Model/FuncionarioDAO.php");

class ControllerLogarFuncionario
{
    private $funcionarioDAO;

    public function __construct()
    {
        $this->funcionarioDAO = new funcionarioDAO();
    }

    public function processaRequisicao()
    {
        $this->funcionarioDAO->logarFuncionario();
    }
}