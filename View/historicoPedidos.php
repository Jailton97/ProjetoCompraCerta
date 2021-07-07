<?php require("Cabecalho.php"); ?>

<!-- Masthead-->
<header class="masthead">
  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">MEUS PEDIDOS</h2>

  <!-- Icon Divider-->
  <div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
  </div>
  <!-- Card-->
  <?php if (count($listaPedidos) > 0) : ?>
        <?php
        for ($i = 0; $i < count($listaPedidos); $i++) : ?>
  <div class="container align-items flex-column">

          <div class="card ">
            <div>
              
              <h5 class="card-header">Número do Pedido: <?php echo $listaPedidos[$i]->getIdPedido(); ?><br>
              <form action="DETALHESPEDIDO" method="POST">
              <input type="hidden" value="<?php echo $listaPedidos[$i]->getIdPedido() ?>" name="id_pedido">
              <button type="submit"  class="btn btn-sm btn-warning btn-md mr-1 mb-2">VISUALIZAR PRODUTOS DO PEDIDO</button>
         </form>
              </h5>
            </div>

            <div class="card-body ">
              <h6>Data e Hora do Pedido: <?php echo $listaPedidos[$i]->getDataPedido(); ?></h6>

              <p class="card-text" style=" font-size:large">Valor do Pedido: R$ <?php echo $listaPedidos[$i]->getValorTotal(); ?></p>

            </div>
          </div><br>
    </div>
  </div>
<?php endfor ?>
<?php else : ?>
  <div class="row">
    <h1>Você ainda não comprou nada! Compre agora e aproveite nossas promoções!</h1>
  </div>
<?php endif ?>
</header>


<!-- Footer -->
<?php require("Rodape.php") ?>