<?php 

require("Cabecalho.php"); 
require("../Model/Conexao.php");

$consulta  = "SELECT * FROM produto";

$resultado_produtos = mysqli_query($minhaConexao, $consulta);


?>



<!-- Masthead-->
<header class="masthead">
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Produtos</h2>
    
    <!-- Icon Divider-->
    <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
        <div class="divider-custom-line"></div>
    </div>
    
    <div class="container d-flex align-items flex-column">
        <!--Section: Block Content-->
        <section class="mb-5">

            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0">

                    <div id="mdb-lightbox-ui"></div>

                    <div class="mdb-lightbox">

                        <div class="row product-gallery mx-1">



                        </div>

                    </div>

                </div>
                <div class="container d-flex align-items-center flex-column">
                    <!-- Card -->
                    
                    <?php while ($linha_produto = mysqli_fetch_assoc($resultado_produtos)) {?> 
                   
                        <div class="card">
                            <img class="card-img-top" src="assets/img/destaques/feijao.jpg" width="100px200" alt="Imagem de capa do card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $linha_produto['id']; ?> <br></h5>
                                <p class="card-text"><?php echo $linha_produto['nome']; ?> </p>
                                <p class="card-text"><?php echo $linha_produto['marca']; ?> </p>
                                <p class="card-text"><?php echo $linha_produto['descricao']; ?> </p>
                                <p class="card-text"><?php echo $linha_produto['preco']; ?></p>


                                <a href="carrinho.php">
                                    <button class="btn btn-primary btn-block">COMPRAR</button>
                                </a>
                            </div>
                        </div>
                        
                    <?php } ?>

                    
                </div>
        </div>
    </div>
</header>

<!-- Modal -->

<div class="container mt-5">
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comprar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label required">Nome no cartão</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">CPF</label>
                            <input type="number" placeholder="000.000.000-00" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Número do cartão</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Data de validade</label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">código de segurança</label>
                            <input type="number" class="form-control">
                        </div>

                        <label style="margin-right: 10px;" class="checkbox-inline"><input type="radio" name="Cartao" value=""> Credito</label>
                        <label style="margin-right: 10px;" class="checkbox-inline"><input type="radio" name="Cartao" value=""> Débito</label>
                    </form>
                </div>

                <div class="modal-footer align-items-center">

                    <button type="submit" class="btn btn-primary">Comprar</button>
                    <button type="submit" class="btn btn-danger">Cancel</button>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require("Rodape.php"); ?>