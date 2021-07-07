<?php require_once("Cabecalho.php"); ?>
    <!-- Masthead-->
    <header class="masthead">


        <div class="container d-flex align-items flex-column">


    <!--Section: Block Content-->
        <section>

    <!--Grid row-->
    <div class="row">

    <!--Grid column-->
    <div class="col-lg-8">

      <!-- Card -->
      <div class="mb-3">
        <div>

          <h5 class="mb-4">Meu carrinho (<span><?php echo count($itensCarrinho); ?></span> itens)</h5>  
                <?php foreach($itensCarrinho as $item): ?>
                          <div class="row mb-4">
                    <div class="col-md-5 col-lg-3 col-xl-3">
                      <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                        <img class="img-fluid w-100"
                          src="<?php echo $item->getProduto()->getImagem(); ?>" alt="Sample">
                      </div>
                    </div>
                    <div class="col-md-7 col-lg-9 col-xl-9">
                      <div>
                        <div class="d-flex justify-content-between">
                          <div>
                            <h5><?php echo $item->getProduto()->getNome(); ?> </h5>
                            <p class="mb-3 text-muted text-uppercase small"><?php echo $item->getProduto()->getMarca(); ?></p>
                            <p class="mb-2 text-muted text-uppercase small"><?php echo $item->getProduto()->getDescricao(); ?></p>
                          </div>
                          <div>
                          <form action="alteraQuantidadeProduto" method="post">
                              <input type="hidden" name="id" value="<?php echo $item->getProduto()->getId(); ?>">
                              <input class="quantity" name="qtd" type="number" value="<?php echo $item->getQuantidade(); ?>">
                            
                              <small id="passwordHelpBlock" class="form-text text-muted text-center">
                              <button type="submit" class="buttonTransparente btn-outline-success btn-sm"><i class="fas fa-plus-square"></i> Alterar Quantidade</button>
                              <!-- <a type="button" class="card-link-secondary medium text-uppercase mr-3">
                              <i class="fas fa-plus-square"></i> Alterar Quantidade </a> -->
                            </small>
                          </form>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <div>
                          <form method="post" action="removeItemCarrinho">
                            <input type="hidden" name="id" value="<?php echo $item->getProduto()->getId(); ?>">
                            <button type="submit" class="buttonTransparente btn-outline-success btn-sm"><i class="fas fa-trash-alt mr-1"></i> Remover item</button>
                            <!-- <a type="button" class="card-link-secondary small text-uppercase mr-3">
                            <i
                                class="fas fa-trash-alt mr-1"></i> Remover item </a>  -->
                          </form>
                          </div>
                          <p class="mb-0"><span><strong id="summary">R$<?php echo $item->getProduto()->getPreco(); ?></strong></span></p class="mb-0">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="mb-4">  
                <?php endforeach; ?>
          
        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-4">Estimativa de entrega</h5>

          <p class="mb-0"> Ter., 25.04. - Sex., 28.04.</p>
        </div>
      </div>

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-4">Aceitamos</h5>

          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
            alt="Visa">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
            alt="American Express">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
            alt="Mastercard">
          <img class="mr-2" width="45px"
            src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
            alt="PayPal acceptance mark">
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-lg-4">

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <h5 class="mb-3">Resumo da Compra</h5>

          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Subtotal
              <span>R$<?php echo number_format($carrinho->getTotal(),2,',','.'); ?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
              Frete
              <span>R$0,00</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>Valor total</strong>
              </div>
              <span><strong>R$<?php echo number_format($carrinho->getTotal(),2,'.','.'); ?></strong></span>
            </li>
          </ul>
          <form>
              <?php if(isset($_SESSION['id_cliente'])):?>
              <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-block">Finalizar Compra</button>
              <?php else: ?>
              <h5>Você precisa estar logado para concluir a compra!</h5>
              <?php endif ;?>
          </form>
  

        </div>
      </div>
      <!-- Card -->

      <!-- Card -->
      <div class="mb-3">
        <div class="pt-4">

          <div class="collapse" id="collapseExample">
            <div class="mt-3">
              <div class="md-form md-outline mb-0">
                <input type="text" id="discount-code" class="form-control font-weight-light"
                  placeholder="Enter discount code">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Card -->

    </div>
    <!--Grid column-->

  </div>
  <!-- Grid row -->

</section>
<!--Section: Block Content-->

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
                        <form action="finalizarCompra" method="post">
                               <input type="hidden" value="<?php echo number_format($carrinho->getTotal(),2,'.','.'); ?>" name="valor_total">
                               <div class="mb-3">
                                   <label class="form-label required">Nome no cartão</label>
                                   <input type="text" class="form-control" name="nome_cartao">
                               </div>
                               <div class="mb-3">
                                   <label class="form-label">CPF</label>
                                   <input type="number" placeholder="000.000.000-00" class="form-control" name="cpf_titular">
                               </div>
                               <div class="mb-3">
                                   <label class="form-label required">Número do cartão</label>
                                   <input type="number" class="form-control" name="num_cartao">
                               </div>
                               <div class="mb-3">
                                   <label class="form-label required">Data de validade</label>
                                   <input type="date" class="form-control">
                               </div>
                   
                               <div class="mb-3">
                                   <label class="form-label required">código de segurança</label>
                                   <input type="number" class="form-control" name="codigo_cartao">
                               </div>

                               <label style="margin-right: 10px;" class="checkbox-inline"><input type="radio" name="Cartao" value=""> Credito</label>
                               <label style="margin-right: 10px;" class="checkbox-inline"><input type="radio" name="Cartao" value="">  Débito</label>
                           
                          </div>
           
                          <div class="modal-footer align-items-center">
                                  <button type="submit" class="btn btn-primary">Comprar</button>
                                  <button type="submit" class="btn btn-danger">Cancel</button>
                          </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
        <!-- Footer -->
       <?php require("Rodape.php"); ?>
       
       
