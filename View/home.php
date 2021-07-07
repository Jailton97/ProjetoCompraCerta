<?php require_once("Cabecalho.php"); ?>
    <!-- Masthead-->
    <header class="masthead bg-primary  text-center">
    <div><h1 class="text-white">Confira nossos destaques!</h1><br></div>

       <div class="container d-flex align-items-center flex-column">
           <!-- Card -->     
           <div class="card-deck card-columns">
               <div class="card">
                <img class="card-img-top" src="assets/img/destaques/amaciante.png" width="100px200" alt="Imagem de capa do card">
                <div class="card-body">
                  <h5 class="card-title">Amaciante Downy concentrado brisa verão 500ml</h5>
                  <p class="card-text">R$11,99</p>
                  <a href="carrinho.php">
                  <button class="btn btn-primary btn-block">COMPRAR</button>
                  </a>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="assets/img/destaques/feijao2.jpg" width="100px200" alt="Imagem de capa do card">
                <div class="card-body">
                  <h5 class="card-title">Feijão Carioca Kicaldo <br>1kg</h5>
                  <p class="card-text">R$6,99</p>
                  <a href="carrinho.php">
                  <button class="btn btn-primary btn-block">COMPRAR</button>
                  </a>
                </div>
              </div>
              <div class="card">
                <img class="card-img-top" src="assets/img/destaques/arroz.webp" width="100px200" alt="Imagem de capa do card">
                <div class="card-body">
                  <br><h5 class="card-title">Arroz Parboilizado T1 Camil<br>1kg </h5>
                  <p class="card-text">R$4,19</p>
                  <a href="paginaProduto.php">
                  <button class="btn btn-primary btn-block">COMPRAR</button>
                  </a>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="assets/img/destaques/cafe2.webp" width="100px200" alt="Imagem de capa do card">
                <div class="card-body">
                <h5 class="card-title">Café torrado e moído tradicional 3 Corações 500g</h5>
                <p class="card-text">R$4,99</p>
                <a href="carrinho.php">
                <button class="btn btn-primary btn-block">COMPRAR</button>
                </a>
                </div>
            </div>
           
             <div class="card">
                <img class="card-img-top" src="assets/img/destaques/leite.jpg" width="100px200" alt="Imagem de capa do card">
                <div class="card-body">
                <br><h5 class="card-title">Leite Integral Piracanjuba 1L </h5>
                <p class="card-text">R$3,99</p>
                <a href="carrinho.php">
                <button class="btn btn-primary btn-block">COMPRAR</button>
                </a>
                </div>
              </div>
        </div>
</div>
</header>
<!-- Portfolio Section-->
<section class="page-section portfolio" id="portfolio">
    <div class="container" style="max-width: 100%">
        <!-- Portfolio Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Categorias</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Portfolio Grid Items-->
        <div class="row justify-content-center" >
            <!-- Portfolio Item 1-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100 w-100">
                    </div>
                <form action="LISTARCATEGORIA" method="POST">
                    <input type="hidden" name="id_categoria" value="1" />
                    <div class="col text-center">
                        <button class="btn btn-outline-secondary btn-block buttonTransparente" type="submit">Limpeza</button>
                    </div>
                </form>
                    <img class="img-fluid" src="assets/img/portfolio/limpeza.png" alt=""/>                    
                </div>
            </div>
            <!-- Portfolio Item 2-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
                    <div class="d-flex align-items-center justify-content-center h-100 w-100">
                    </div>
                    
                <form action="LISTARCATEGORIA" method="POST">
                    <input type="hidden" name="id_categoria" value="2" />
                    <div class="col text-center">
                        <button class="btn btn-outline-secondary btn-block buttonTransparente" type="submit">Higiene</button>
                    </div>
                </form>
                    <img class="img-fluid" src="assets/img/portfolio/higiene2.png" alt="" />
                </div>
            </div>
            <!-- Portfolio Item 3-->
            <div class="col-md-6 col-lg-4 mb-5">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
                    <div class="d-flex align-items-center justify-content-center h-100 w-100">
                    </div>
                <form action="LISTARCATEGORIA" method="POST">
                    <input type="hidden" name="id_categoria" value="3" />
                    <div class="col text-center">
                        <button class="btn btn-outline-secondary btn-block buttonTransparente" type="submit">Alimentos</button>
                    </div>
                </form>
                    <img class="img-fluid" src="assets/img/portfolio/alimentos.png" alt="" />
                </div>
            </div>
            <!-- Portfolio Item 4-->
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
                    <div class="d-flex align-items-center justify-content-center h-100 w-100">
                    </div>
                <form action="LISTARCATEGORIA" method="POST">
                    <input type="hidden" name="id_categoria" value="5" />
                    <div class="col text-center">
                        <button class="btn btn-outline-secondary btn-block buttonTransparente" type="submit">Bebidas</button>
                    </div>
                </form>
                    <img class="img-fluid" src="assets/img/portfolio/bebidas.png" alt="" />
                </div>
            </div>
            <!-- Portfolio Item 5-->
            <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5">
                    <div class="d-flex align-items-center justify-content-center h-100 w-100">
                    </div>
                <form action="LISTARCATEGORIA" method="POST">
                    <input type="hidden" name="id_categoria" value="4" />
                    <div class="col text-center">
                        <button class="btn btn-outline-secondary btn-block buttonTransparente" type="submit">Padaria</button>
                    </div>
                </form>
                    <img class="img-fluid" src="assets/img/portfolio/padaria.png" alt="" />
                </div>
            </div>
            <!-- Portfolio Item 6-->
            <div class="col-md-6 col-lg-4">
                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal6">
                    <div class="d-flex align-items-center justify-content-center h-100 w-100">
                    </div>
                <form action="LISTARCATEGORIA" method="POST">
                    <input type="hidden" name="id_categoria" value="6" />
                    <div class="col text-center">
                        <button class="btn btn-outline-secondary btn-block buttonTransparente" type="submit">Açougue</button>
                    </div>
                </form>
                    <img class="img-fluid" src="assets/img/portfolio/acougue.png" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once("Rodape.php");?>
