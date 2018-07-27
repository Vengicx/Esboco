<form method="post" action="index.php?fd=salvar&pg=produto">
  <div class="form-row">
	  <div class="form-group col-md-12">
	    <label for="mesa">ID do produto</label>
	    <input type="number" class="form-control" name="mesa" placeholder="ID do produto" disabled>
	  </div>
	  <div class="form-group col-md-6">
	    <label for="nomeProduto">Nome do Produto</label>
	    <input type="text" class="form-control" name="nomeProduto" placeholder="Digite o nome do produto" required>
	  </div>
	  <div class="form-group col-md-3">
	    <label for="nomeProduto">Quantidade</label>
	    <input type="number" class="form-control" name="quantidade" placeholder="Digite a quantidade a cadastrar" required>
	  </div>
	  <div class="form-group col-md-6">
	    <label for="precoCompra">Preço de Compra (Por Unidade)</label>
	    <input type="text" class="form-control" name="precoCompra" placeholder="Digite o preço de compra" required>
	  </div>	
	  <div class="form-group col-md-6">
	    <label for="precoVenda">Preço de Venda (Por Unidade)</label>
	    <input type="text" class="form-control" name="precoVenda" placeholder="Digite o preço de Venda" required>
	  </div>
	  <div class="col-md-12">
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="tipoProduto" value="1">
		  <label class="form-check-label" for="tipoProduto">
		    Acompanhamento
		  </label>
		</div>
		<div class="form-check">
		  <input class="form-check-input" type="radio" name="tipoProduto" value="2">
		  <label class="form-check-label" for="tipoProduto">
		    Matéria-Prima
		  </label>
		</div>
	</div>
		<button type="submit" class="btn btn-primary col-md-3" style="margin: 0 auto;">Enviar</button>
   </div><!-- fim do form row-->
</form>
