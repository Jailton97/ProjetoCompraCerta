<?php /*session_start();*/ if(!isset($_SESSION['nome_cliente'])):?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <title>Cadastro/Edição de Dados do Cliente</title>
</head>
<body>
    <nav
      class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top"
      id="mainNav"
    >
      <div class="container">
        <img src="assets/img/logo/testelogo.png" width="100px" height="50px" />
        <a class="navbar-brand js-scroll-trigger" href="#page-top"
          >Compra Certa</a
        >
        <button
          class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded" href="index"
                >Home</a
              >
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a
                class="nav-link py-3 px-0 px-lg-3 rounded"
                href="loginPage.html"
                >Login</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php else: require("Cabecalho.php"); ?>
  <?php endif ?>
    <div class="container" id="cadastro_cliente">
        <h4>Preencha seus Dados</h4>
        <form <?php echo isset($_SESSION['nome_cliente']) ? "action=EditarDadosBD" : 'action="CadastrarCliente"'?> method="post">
            <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Dados Pessoais
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="nome">Nome Completo</label>
                                <input class="form-control form-control-sm" type="text" name="nome" id="nomeCliente" value="<?php echo isset($_SESSION['nome_cliente']) ? $_SESSION['nome_cliente'] :  "";?>" placeholder="">
                            </div>
                            <div class="col-md-4">
                                <label for="email">E-mail</label>
                                <input class="form-control form-control-sm" type="email" name="email" id="emailCliente" value="<?php echo isset($_SESSION['email_cliente']) ? $_SESSION['email_cliente'] : "";?>" placeholder="">
                            </div>
                            <div class="col-md-3">
                                <label for="cpf">CPF</label>
                                <input class="form-control form-control-sm" type="text" name="cpf" id="cpfCliente" value="<?php echo isset($_SESSION['cpf_cliente']) ? $_SESSION['cpf_cliente'] : "";?>" placeholder="" maxlength="14">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="dt_nascimento">Nascimento</label>
                                <input class="form-control form-control-sm" type="date" name="dt_nascimento" id="nascimentoCliente" placeholder="">
                            </div>
                            <div class="offset-md-1 col-md-3">
                                <label for="senha1">Senha</label>
                                <input class="form-control form-control-sm" type="password" name="senha1" id="senhaCliente" value="<?php echo isset($_SESSION['senha']) ? $_SESSION['senha'] : "";?>" placeholder="">
                            </div>
                            <div class="offset-md-1 col-md-3">
                                <label for="cpf">Confirmar Senha</label>
                                <input class="form-control form-control-sm" type="password" name="senha2" id="confSenhaCliente" value="<?php echo isset($_SESSION['senha']) ? $_SESSION['senha'] : "";?>" placeholder="">
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Endereço
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="cep">CEP</label>
                                <input class="form-control form-control-sm" type="text" name="cep" id="cepCliente" value="<?php echo isset($_SESSION['cep']) ? $_SESSION['cep'] : ""; ?>" placeholder="" maxlength="10">
                            </div>
                            <div class="col-md-6">
                                <label for="endereco">Endereço</label>
                                <input class="form-control form-control-sm" type="text" name="endereco" id="enderecoCliente" value="<?php echo isset($_SESSION['rua']) ? $_SESSION['rua'] : ""; ?>" placeholder="">
                            </div>
                            <div class="col-md-2">
                                <label for="num">N°</label>
                                <input class="form-control form-control-sm" type="text" name="num" id="numEnderecoCliente" value="<?php echo isset($_SESSION['numero']) ? $_SESSION['numero']: ""; ?>" placeholder="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <label for="bairro">Bairro</label>
                                <input class="form-control form-control-sm" type="text" name="bairro" id="bairroCliente" value="<?php echo isset($_SESSION['bairro']) ? $_SESSION['bairro']:""; ?>" placeholder="">
                            </div>
                            <div class="col-md-3">
                                <label for="complemento">Complemento</label>
                                <input class="form-control form-control-sm" type="text" name="complemento" id="complementoCliente" value="<?php echo isset($_SESSION['complemento']) ? $_SESSION['complemento']:""; ?>" placeholder="">
                            </div>
                            <div class="col-md-3">
                                <label for="telCel">Telefone Celular</label>
                                <input class="form-control form-control-sm" type="text" name="telCel" id="telCelularCliente" value="<?php echo isset($_SESSION['tel_cliente']) ? $_SESSION['tel_cliente']:""; ?>" placeholder="" maxlength="14">
                            </div>
                        </div>
                        <hr>
                        <center>
                            <button type="submit" class="btn btn-success">Realizar Cadastro</button>
                            <?php if(isset($_SESSION['nome_cliente']))
                              {
                                echo '<a href="ExcluirConta" class="btn btn-danger">Excluir Conta</a>';
                              }
                            ?>
                        </center>
                    </div>
                  </div>
                </div>
              </div>
        </form>
    </div>
      <!-- Copyright Section-->
      <script>
        $(document).ready(function(){
          $('#cpfCliente').mask('000.000.000-00');
        });
      </script>
      <?php require("Rodape.php"); ?>
