<form method="post" action="index.php?fd=salvar&pg=mesa" id="formMesa">
  <div class="form-row">
    <div class="form-group col-md-10">
      <label for="mesa">Número da mesa</label>
      <input type="number" class="form-control" name="mesa" placeholder="Digite o número da mesa" required>
    </div>
    <div class="form-group col-md-6">
      <label for="sabor">Sabor da Pizza</label>
      <select class="form-control" name="sabor" required>
        <option>Queijo</option>
        <option>Frango</option>
        <option>Catupiry</option>
        <option>Moda da Casa</option>
        <option>Peperoni</option>
      </select>
    </div>
    <div class="tamanhos col-md-3">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tamanho" value="pequeno">
        <label class="form-check-label" for="exampleRadios1">Pequeno</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tamanho" value="medio">
        <label class="form-check-label" for="exampleRadios2">Médio</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tamanho" value="grande">
        <label class="form-check-label" for="exampleRadios2">Grande</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="tamanho" value="gigante">
        <label class="form-check-label" for="exampleRadios2">Gigante</label>
      </div>
    </div>
  </div>
<button type="submit" class="btn btn-primary text-center">Enviar</button>
</form>