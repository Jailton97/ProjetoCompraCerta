<?php require("Cabecalho.php"); ?>

            <h1>Página de Rastrear Compra</h1>
            <div class="container" >
              <div class="p-3 mb-2 bg-info text-white opacity-3" id="info_cliente_rastreio">
                <span>
                  <i class="bi bi-person-circle"></i>
                  <p>Cliente: <?php echo $_SESSION['nome_cliente']?></p>
                </span>
                <p>CPF: <?php echo $_SESSION['cpf_cliente']?></p>
              </div>
            </div>
              <br />
              <hr />
              <br />
              <?php if(isset($rastreio)):?>
                <?php foreach($rastreio as $r): ?>
              <div class="container align-items-center">
              <h3 style="font-size: 15px;"> <?php echo $r->getIdPedido(); ?> </h3>
              <h5 style="font-size: 15px;"> <?php echo $r->getDataCompra(); ?> </h5>
                <div class="progress" style="height: 64px">
                
                <?php if($r->getStatusPedido() == 1): ?>
                  
                  <div class="progress-bar bg-light" role="progressbar" style="width: 100%; color: rgb(38, 0, 255); font-size:large;">
                    <p style="color: black;">Aguarde um momento, um funcionário irá atender o seu pedido!!</p>
                  </div>
                
                  <?php elseif($r->getStatusPedido() == 2): ?>
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 33%; color: rgb(255, 255, 255); font-size:large;">
                    Setor Preparação
                  </div>
                  
                  <?php elseif($r->getStatusPedido() == 3): ?>
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 66%; color: rgb(0, 0, 0); font-size:large;">
                    Setor Conferência
                  </div>
                  
                  <?php elseif($r->getStatusPedido() == 4 || $r->getStatusPedido() == 5): ?>
                  <div class="progress-bar bg-green" role="progressbar" style="width: 100%;color: rgb(255, 255, 255); font-size:large;">
                    Setor de Entrega
                  </div>
                  <?php endif; ?>
                </div>
                <br>
                <?php if($r->getStatusPedido() == 4 || $r->getStatusPedido() == 5): ?>
                <div>
                  <center>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form"> Avaliar Compra </button>
                  </center>
                </div>
                <?php endif ?>
              </div>
      <br>
      <hr>
      <?php endforeach; ?>
      </div>
      </div>
      <?php else: ?>
        <h1 style="text-align: center;">Você não tem nenhum pedido para rastrear!</h1>
      <?php endif ?>

<?php require("Rodape.php"); ?>

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="text-right cross"> <i class="fa fa-times mr-2"></i> </div>
            <div class="card-body text-center"> <img src=" https://i.imgur.com/d2dKtI7.png" height="100" width="100">
                <div class="comment-box text-center">
                    <h4>Adicionar Comentário</h4>
                    <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div>
                    <div class="comment-area"> <textarea class="form-control" placeholder="O que achou da Compra?" rows="4"></textarea> </div>
                    <br>
                    <form action="confirmaRecebimento" method="post">
                      <input type="hidden" value="<?php echo $r->getIdPedido();?> ">
                      <button type="submit" class="btn-md btn-success">Confirmar Recebimento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
