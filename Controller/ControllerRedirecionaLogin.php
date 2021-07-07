<?php

class ControllerRedirecionaLogin
{
    public function processaRequisicao()
    {
        require_once("View/loginPage.html");
    }

    public function processaRequisicaoFuncionario()
    {
        require_once("View/loginFuncionario.php");
    }
}