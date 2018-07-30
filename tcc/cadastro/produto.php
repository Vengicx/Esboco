<style>
    .card{
        float: left;
        margin: 10px;
    }

    #resultado {
        float: left !important;
        position: fixed !important;
    }

</style>
    <h1 class="text-center">Cadastro de novo Produto</h1>
    <form class="form-inline my-2 my-lg-0" action="#" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Digite aqui" aria-label="Search" name="procurar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Procurar</button>
    </form>
</div>
<div class="card bg-light mb-3" style="max-width: 18rem;">
    <div class="card-header">Novo Pedido</div>
    <form>
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Nome do Produto" name="nomeProduto">

  </div>
</div>
<div class="container">
<?php
        require "conecta.php";
        
        if(isset($_POST["procurar"])){
            $nome = trim ($_POST["procurar"]);
            $nome = "%$nome%";
        }

        if(isset($nome)){
            $consulta = $pdo->prepare("SELECT * FROM materiaprima WHERE nome LIKE ?");
            $consulta->bindParam(1, $nome);

        }else{ 
            $consulta = $pdo->prepare("SELECT * FROM materiaprima WHERE tipoProduto = 2 order by nome");

        }

        $consulta->execute();
        
        $c = 0; //contador 
        
        while($dados = $consulta->fetch(PDO::FETCH_OBJ)){//ele só vai entrar no while se o $dados for verdadeiro
            $id = $dados->id;
            $nome = $dados->nome;
            $quantidade = $dados->quantidade;
            $precoCompra = $dados->precoCompra;
            $precoVenda = $dados->precoVenda;
            $tipoProduto = $dados->tipoProduto;

            echo "<div class='card' style='width: 18rem;'> 
                    <div class='card-body'>
                        <h5 class='card-title'>$nome</h5>
                        <p class='card-text'>ID: $id</p>
                        <p class='card-text'>Nome: $nome</p>
                        <p class='card-text'>Preço Compra: $precoCompra</p>
                        <p class='card-text'>Preço Venda: $precoVenda</p>
                        <div class='btn-group-toggle' data-toggle='buttons'>
                            <label class='btn btn-secondary active'>
                                <input type='checkbox'> Checked
                            </label>
                        </div>
                    </div>
                </div>";

            $c = 1;
        }

        if($c == 0){
          echo 'Matéria Prima não encontrada';
        }


        ?>
</div>