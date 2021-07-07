<?php require("CabecalhoFunc.php");?>
    <!-- Masthead-->
    <header class="masthead">
  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Pedidos em Espera</h2>

  <!-- Icon Divider-->
  <div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
  </div>
  <!-- Card-->
  <?php if (count($listaPedidosEmEspera) > 0) : ?>
        <?php
        for ($i = 0; $i < count($listaPedidosEmEspera); $i++) : ?>
  <div class="container align-items flex-column">

          <div class="card ">
            <div>
              
              <h5 class="card-header">Pedido: <?php echo $listaPedidosEmEspera[$i]->getIdPedido(); ?>
              <form action="ListarItensPrep" method="POST">
              <input type="hidden" value="<?php echo $listaPedidosEmEspera[$i]->getIdPedido() ?>" name="id_pedido">
              <button type="submit" class="btn btn-light btn-md mr-1 mb-2">Detalhes Pedido</button>
         </form>
              </h5>
            </div>
          </div><br>
    </div>
  </div>
<?php endfor ?>
<?php else : ?>
  <div class="align-items-center">
    <h1>Não há pedidos para este setor no momento</h1>
  </div>
<?php endif ?>
</header>

<?php require("RodapeFunc.php"); ?>