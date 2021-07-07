<?php require("CabecalhoFunc.php"); ?>

<!-- Masthead-->
<header class="masthead">
  <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Itens de Compra</h2>

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
              for ($i = 0; $i < count($listaItens); $i++) : ?>
              <div class="box">
                <img src="assets/img/destaques/amaciante.png" width="100px200">
                <p class="card-text"><?php echo $listaItens[$i]->getNome(); ?></P>
                <p class="text-muted"><?php echo $listaItens[$i]->getMarca(); ?></p>
              </div>
              <?php endfor ?>
            </div>
            <form action="enviarSetorConf" method="post">
                <center>
                  <button class="btn btn-success" type="submit">Enviar para Conferência</button>
                </center>
                <br>
            </form>
          </div><br>
    </div>
  </div>
</header>

<!-- Footer -->
<?php require("RodapeFunc.php") ?>