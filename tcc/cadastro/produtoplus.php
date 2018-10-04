<style>
    .materia-prima{
        float: left;
        margin: 10px;
    }

    .carrinho {
      float: left;
      margin: 2em;
    }
</style>
    <h1 class="text-center">Cadastro de novo Produto</h1>
    

    <div class="row ">
    <form name="materiaprimas" action="./salvar/produtoplus.php" method="post">

<?php
    require "conecta.php";

    $consulta = $pdo->prepare("SELECT * FROM materiaprima WHERE tipoProduto = 2 order by nome");
    $consulta->execute();

    while($dados = $consulta->fetch(PDO::FETCH_OBJ)){
        $id = $dados->id;
        $nome = $dados->nome;
        $quantidade = $dados->quantidade;
        $precoCompra = $dados->precoCompra;
        $precoVenda = $dados->precoVenda;
        $tipoProduto = $dados->tipoProduto;

        echo "<div class='card materia-prima col-md-4' >
                  <div class='card-body'>
                      <h5 class='card-title'>$nome</h5>
                      <p class='card-text'>Preço Compra: R$ $precoCompra </p>
                      <p class='card-text'>Quantidade: $quantidade </p>
                      
                      <div data-toggle='buttons'>
                          <label class='btn btn-primary'>
                              <input type='checkbox' autocomplete='off' name='codigo[]' value='$id'> Adicionar
                          </label>
                      </div>
                  </div>
              </div>";
    
    }

?>
    <button type="submit" class="btn btn-success col-md-5">Cadastrar</button>
    </form>
    </div>