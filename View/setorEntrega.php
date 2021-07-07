<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <title>Página Inicial do setor de Entrega</title>
</head> -->
<?php require("CabecalhoFunc.php"); ?>
    <div class="container" id="tabela_clientes_entrega">
        <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Status</th>
                <th scope="col">Opções</th>
              </tr>
            </thead>
            <tbody>
            
              <tr>
              <?php $i=0; foreach($listaNomesClientes as $cliente):?>
                <th scope="row"><?php echo $listaPedidosEmEntrega[$i];?></th>
                
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo $cliente->getTelCelular(); ?></td>
                <?php if($listaStatusPedidos[$i] == 4):?>
                <td class="bg-warning"><?php echo "Entrega Pendente";?> </td>
                <?php elseif($listaStatusPedidos[$i] == 5):?>
                <td class="bg-success"><?php echo "Entrega Efetuada";?> </td>
                <?php elseif($listaStatusPedidos[$i] == 6):?>
                <td class="bg-danger"><?php echo "Entrega não Efetuada";?> </td>
                <?php endif ?>
                
                <td>
                <div>
                    <a href="" data-toggle="modal" data-target="#exampleModal"><i class="bi bi-eye"></i></a>
                    <form action="efetuarEntrega" method="post">
                      <input type="hidden" value="<?php echo $listaPedidosEmEntrega[$i];?>" name="id_pedido_entregar">
                      <button class="buttonTransparente" type="submit"><i style="color: green" class="bi bi-check-circle-fill"></i></button>
                    </form>
                    <form action="naoEfetuarEntrega" method="post">
                      <input type="hidden" value="<?php echo $listaPedidosEmEntrega[$i];?>" name="id_pedido_entregar">
                      <button class="buttonTransparente" type="submit"><i style="color: red" class="bi bi-x-circle-fill"></i></button>
                    </form>
                </div>
                </td>
                
              </tr>
              <?php $i++;?>
              <?php endforeach;?>
            </tbody>
          </table>
    </div>
  <!-- Modal para ver o endereço do cliente -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Endereço de Entrega</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php foreach($listaEnderecos as $endereco):?>
        <div class="modal-body">
          <p><?php echo $endereco->getRua();?></p>
          <p><?php echo $endereco->getBairro();?></p>
          <p><?php echo $endereco->getNumero();?></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
  
  <?php require("RodapeFunc.php"); ?>
<!-- Copyright Section-->
<!-- <div class="copyright py-4 text-center text-white">
  <div class="container"><small>Copyright © Your Website 2021</small></div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html> -->