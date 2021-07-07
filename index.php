<?php
    session_start();
    
    if(isset($_GET['url']))
    {
        $url = strtoupper($_GET['url']);
        
        switch($url)
        {
            case "VIEW/LOGARCLIENTE":
                require("Controller/ControllerLogarCliente.php");
                $controller = new ControllerLogarCliente();
                $controller->processaRequisicao();
                break;
            case "VIEW/LOGARFUNCIONARIO":
                require("Controller/ControllerLogarFuncionario.php");
                $controller = new ControllerLogarFuncionario();
                $controller->processaRequisicao();
                break;
            case "VIEW/PAGINALOGIN":
                require("Controller/ControllerRedirecionaLogin.php");
                $controller = new ControllerRedirecionaLogin();
                $controller->processaRequisicao();
                break;
            case "VIEW/PAGINALOGINFUNCIONARIO":
                require("Controller/ControllerRedirecionaLogin.php");
                $controller = new ControllerRedirecionaLogin();
                $controller->processaRequisicaoFuncionario();
                break;
            case "VIEW/HISTORICOPEDIDOS":
                require("Controller/ControllerHistoricoCliente.php");
                $controller = new ControllerHistoricoCliente();
                $controller->processaRequisicao();
                break;
            case "VIEW/DETALHESPEDIDO":
                require("Controller/ControllerListarItensHistorico.php");
                $controller = new ControllerListarItensHistorico();
                $controller->recuperaProdutos();
                break;
            case "VIEW/RASTREARCOMPRACLIENTE":
                require("Controller/ControllerRastrearCompraCliente.php");
                $controller = new ControllerRastrearCompraCliente();
                $controller->processaRequisicao();
                break;
            case "VIEW/EDITARDADOS":
                require("Controller/ControllerEndereco.php");
                $controller = new ControllerEndereco();
                $controller->processaRequisicao();
                break;
            case "VIEW/EDITARDADOSBD":
                require("Controller/ControllerEditarDadosCliente.php");
                $controller = new ControllerEditarDadosCliente();
                $controller->editarDadosCliente();
                break;
            case "VIEW/LISTARPRODUTOS":
                require("Controller/ControllerProdutosListar.php");
                $controller = new ControllerProdutosListar();
                $controller->processaRequisicao();
                break;
            case "VIEW/EXCLUIRCONTA":
                require("Controller/ControllerExcluirConta.php");
                $controller = new ControllerExcluirConta();
                $controller->processaRequisicao();
                break;
            case "VIEW/CADASTRARCLIENTE":
                require("Controller/ControllerCliente.php");
                $controller = new ControllerCliente();
                $controller->processaRequisicao();
                break;
            case "VIEW/PRODUTO":
                require("Controller/ControllerMostrarProduto.php");
                $controller = new ControllerMostrarProduto();
                $controller->mostrarProduto();
                break;
            case "VIEW/ADDITEMCARRINHO":
                require("Controller/ControllerAddItemCarrinho.php");
                require_once("Model/CarrinhoSession.php");
                $carrinhoSession = new CarrinhoSession();
                $controller = new ControllerAddItemCarrinho($carrinhoSession);
                $controller->processaRequisicao();
                break;
            case "VIEW/CARRINHO":
                require("Controller/ControllerListarCarrinho.php");
                $controller = new ControllerListarCarrinho();
                $controller->processaRequisicao();
                break;
            case "VIEW/FINALIZARCOMPRA":
                require("Controller/ControllerFinalizarCompra.php");
                $controller = new ControllerFinalizarCompra();
                $controller->processaRequisicao();
                break;
            case "VIEW/REMOVEITEMCARRINHO":
                require("Controller/ControllerApagaItemCarrinho.php");
                require_once("Model/CarrinhoSession.php");
                $carrinhoSession = new CarrinhoSession();
                $controller = new ControllerApagaItemCarrinho($carrinhoSession);
                $controller->processaRequisicao();
                break;
            case "VIEW/ALTERAQUANTIDADEPRODUTO":
                require("Controller/ControllerAlteraQtdCarrinho.php");
                require_once("Model/CarrinhoSession.php");
                $carrinhoSession = new CarrinhoSession();
                $controller = new ControllerAlteraQtdCarrinho($carrinhoSession);
                $controller->processaRequisicao();
                break;
            case "VIEW/LISTARPEDIDOSPREP":
                require("Controller/ControllerListarPedidosPrep.php");
                $controller = new ControllerListarPedidosPrep();
                $controller->processaRequisicao();
                break;
            case "VIEW/LISTARITENSPREP":
                require("Controller/ControllerListarItensPedidosPrep.php");
                $controller = new ControllerListarItensPedidosPrep();
                $controller->processaRequisicao();
                break;
            case "VIEW/ENVIARSETORCONF":
                require("Controller/ControllerEnviarSetorConf.php");
                $controller = new ControllerEnviarSetorConf();
                $controller->processaRequisicao();
                require("Controller/ControllerListarPedidosPrep.php");
                $controller2 = new ControllerListarPedidosPrep();
                $controller2->processaRequisicao();
                break;
            case "VIEW/LISTARPEDIDOSCONF":
                require("Controller/ControllerListarPedidosConf.php");
                $controller = new ControllerListarPedidosConf();
                $controller->processaRequisicao();
                break;
            case "VIEW/LISTARITENSCONF":
                require("Controller/ControllerListarItensPedidosConf.php");
                $controller = new ControllerListarItensPedidosConf();
                $controller->processaRequisicao();
                break;
            case "VIEW/ENVIARSETORENTREGA":
                require("Controller/ControllerEnviarSetorEntrega.php");
                $controller = new ControllerEnviarSetorEntrega();
                $controller->processaRequisicao();
                require("Controller/ControllerListarPedidosConf.php");
                $controller2 = new ControllerListarPedidosConf();
                $controller2->processaRequisicao();
                break;
            case "VIEW/DEVOLVERSETORPREP":
                require("Controller/ControllerDevolverSetorPrep.php");
                $controller = new ControllerDevolverSetorPrep();
                $controller->processaRequisicao();
                require("Controller/ControllerListarPedidosConf.php");
                $controller2 = new ControllerListarPedidosConf();
                $controller2->processaRequisicao();
                break;
            case "VIEW/LISTARENTREGAS":
                require("Controller/ControllerListarPedidosEntrega.php");
                $controller = new ControllerListarPedidosEntrega();
                $controller->processaRequisicao();
                    break;
            case "VIEW/EFETUARENTREGA":
                require("Controller/ControllerEfetuarEntrega.php");
                $controller = new ControllerEfetuarEntrega();
                $controller->processaRequisicao();
                require("Controller/ControllerListarPedidosEntrega.php");
                $controller2 = new ControllerListarPedidosEntrega();
                $controller2->processaRequisicao();
                break;
            case "VIEW/NAOEFETUARENTREGA":
                require("Controller/ControllerNaoEfetuarEntrega.php");
                $controller = new ControllerNaoEfetuarEntrega();
                $controller->processaRequisicao();
                require("Controller/ControllerListarPedidosEntrega.php");
                $controller2 = new ControllerListarPedidosEntrega();
                $controller2->processaRequisicao();
                break;
            case "VIEW/LISTARCATEGORIA":
                    require("Controller/ControllerProdutosListar.php");
                    $controller = new ControllerProdutosListar();
                    $controller->listarCategoria();
            break;
            case "VIEW/SAIR":
                $_SESSION = array();
                session_destroy();
                require_once('View/home.php');
                break;
            default:
                require_once("View/home.php");
                break;
        }
    }
    else if(sizeof($_GET) == 0)
    {
        header('Location:View/home.php', true,302);
    }
    else 
    {
        echo $_GET['url'];
    }