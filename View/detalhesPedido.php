<?php require("Cabecalho.php"); ?>

<!-- Masthead-->
<header class="masthead">
  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">DETALHES DO PEDIDO</h2>

  <!-- Icon Divider-->
  <div class="divider-custom">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
    <div class="divider-custom-line"></div>
  </div>
  <!-- Card-->
  <?php //if (count($listaPedidos) > 0) : ?> -->
        <?php
        //for ($i = 0; $i < count($listaPedidos); $i++) : ?>
  <div class="container align-items flex-column">

          <div class="card ">

            <div class="card-body ">
              <?php
              for ($i = 0; $i < count($listaHistoricoProdutos); $i++) : ?>
              <div class="box">
                <img src="assets/img/destaques/amaciante.png" width="100px200">
                <p class="card-text"><?php echo $listaHistoricoProdutos[$i]->getNome(); ?></P>
                <p class="text-muted"><?php echo $listaHistoricoProdutos[$i]->getMarca(); ?></p>
              </div>
              <?php endfor ?>
            </div>
          </div><br>
    </div>
  </div>
</header>

<!-- Footer -->
<?php require("Rodape.php") ?>