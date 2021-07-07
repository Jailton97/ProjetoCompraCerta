<?php
//classe de acesso ao banco de dados para recuperar os dados do produto
require_once "Conexao.php";

class ProdutoDAO{

    public function listarTodos(){
        //vai ao banco de dados e pega todos os produtos
        try{
            $minhaConexao = Conexao::getConexao();
            $sql = $minhaConexao->prepare("SELECT * FROM compracerta2.produto LIMIT 9");
        
                
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaProd=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $produto = new Produto();
            $produto->setId($linha['id']);
            $produto->setNome($linha['nome']);
            $produto->setMarca($linha['marca']);
            $produto->setDescricao($linha['descricao']);
            $produto->setPreco($linha['preco']);
            $produto->setImagem($linha['caminho_img']);
            $listaProd[$i] = $produto;
            $i++;
          }
        return $listaProd;
       }
       catch(PDOException $e){
        return array();
       }
    }


   public function listarCategoria(){

        //vai ao banco de dados e pega todos os produtos
        try{
            $minhaConexao = Conexao::getConexao();
            //$sql = $minhaConexao->prepare("SELECT * FROM compracerta.produto LIMIT 9");
            $sql = $minhaConexao->prepare("SELECT * FROM compracerta2.produto WHERE id_categoria = :id_categoria");
           
          $sql->bindParam("id_categoria", $_POST['id_categoria']);   
           
           $sql->execute();
           $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
           
           $listaProd=array();
           $i=0;

           while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $produto = new Produto();
            $produto->setId($linha['id']);
            $produto->setNome($linha['nome']);
            $produto->setMarca($linha['marca']);
            $produto->setDescricao($linha['descricao']);
            $produto->setPreco($linha['preco']);
            $produto->setImagem($linha['caminho_img']);
            $listaProd[$i] = $produto;
            $i++;
          }
        return $listaProd;
       }
       catch(PDOException $e){
        return array();
       }
    }
    
    public function mostrarProduto($prod){
      try{
        
        $minhaConexao = Conexao::getConexao();
        $sql = $minhaConexao->prepare("SELECT * FROM compracerta2.produto WHERE id = :id");
        
        $sql->bindParam("id",$id); 
        $id = $prod->getId();

        $sql->execute();
        $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
        

        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
         $prod->setNome($linha['nome']);
         $prod->setMarca($linha['marca']);
         $prod->setDescricao($linha['descricao']);
         $prod->setPreco($linha['preco']);
         $prod->setImagem($linha['caminho_img']);
       } 
      }
       catch(PDOException $e){
           echo "entrou no catch".$e->getmessage();
           exit();
       }
   }


    public function incluirProduto($prod){
       try{
           $minhaConexao = Conexao::getConexao();
           $sql = $minhaConexao->prepare("insert into compracerta2.produto (nome, marca, descricao, preco) values (:nome, :edicao,:ano,:preco)");
           $sql->bindParam("nome",$nome);
           $sql->bindParam("marca",$marca);
           $sql->bindParam("descricao",$descricao);
           $sql->bindParam("preco",$preco);
           $nome = $prod->getNome();
           $marca = $prod->getMarca();
           $descricao = $prod->getDescricao();
           $preco = $prod->getPreco();
           
           $sql->execute();
        }
        catch(PDOException $e){
            //return "entrou no catch".$e->getmessage();
            return 0;
        }
    }

    public function retornaProdutosPedidos()
    {
      // try
      // {

      //   $minhaConexao = Conexao::getConexao();
      //   $sql = $minhaConexao->prepare("SELECT cli.nome,
      //                                         prod.nome,
      //                                         prod.marca,
      //                                         item.quantidade,
      //                                         pedi.id
      //                                 FROM produto prod
      //                                 INNER JOIN itempedido item ON prod.id = item.id_produto
      //                                 INNER JOIN pedido pedi ON item.id_pedido = pedi.id
      //                                 INNER JOIN statuspedido stat ON stat.id_pedido = pedi.id  
      //                                 INNER JOIN cliente cli ON pedi.id_cliente = cli.id
      //                                 WHERE stat.status_pedido = '1'");
      //   $dados = array();
      //   if($sql->rowCount() > 0)
      //   {
      //       $i = 0;
      //       while($linha = $sql->fetch(PDO::FETCH_ASSOC))
      //       {
      //         $dados;
      //       }
      //   }

      // }
      // catch(PDOException $e)
      // {
      //   return "Mensagem de erro ".$e->getMessage();
      // }
    }
    
}

?>