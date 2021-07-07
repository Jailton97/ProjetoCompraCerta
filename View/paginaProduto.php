<?php require("Cabecalho.php");  ?>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container d-flex align-items flex-column">
   <!--Section: Block Content-->
   <section class="mb-5">

     <div class="row">
       <div class="col-md-6 mb-4 mb-md-0">

         <div id="mdb-lightbox-ui"></div>

         <div class="mdb-lightbox">

           <div class="row product-gallery mx-1">

             <div class="col-12 mb-0">
               <figure class="view overlay rounded z-depth-1 main-img">
                 <img src="<?php echo $imagem; ?>">
               </figure>
             </div>
             
           </div>

         </div>

       </div>
       <div class="col-md-6">
       <?php require_once "Model/Produto.php";?>

         <h5><?php echo  $nome; ?></h5>         
         <p><span class="mr-1"><strong><?php echo "R$" . $preco; ?></strong></span></p>
         <div class="table-responsive">
           <table class="table table-sm table-borderless mb-0">
             <tbody>
               <tr>
                 <th class="pl-0 w-25" scope="row"><strong>Fabricante</strong></th>
                 <td><?php echo  $marca; ?></td>
               </tr>
               <tr>
                 <th class="pl-0 w-25" scope="row"><strong>Peso</strong></th>
                 <td><?php echo  $descricao; ?></td>
               </tr>
             </tbody>
           </table>
         </div>
         <hr>
         <div class="table-responsive mb-2">
           <table class="table table-sm table-borderless">
             <tbody>
               <tr>
                 <td class="pl-0 pb-0 w-25">Quantidade</td>
               </tr>
               <tr>
                 <td class="pl-0">
                   <div class="def-number-input number-input safari_only mb-0">
                     <input class="quantity" min="0" name="quantity" value="1" type="number">
                   </div>
                 </td>
                 
               </tr>
             </tbody>
           </table>
         </div>
         <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-md mr-1 mb-2">Comprar Agora</button>
         
         <form action="addItemCarrinho" method="POST">
           <input type="hidden" value="<?php echo $id ?>" name="id_prod">
           <button type="submit" class="btn btn-light btn-md mr-1 mb-2"><i class="fas fa-shopping-cart pr-2"></i>Adicionar Carrinho
            </button>
         </form>
       </div>
     </div>

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
                               <label style="margin-right: 10px;" class="checkbox-inline"><input type="radio" name="Cartao" value="">  Débito</label>
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