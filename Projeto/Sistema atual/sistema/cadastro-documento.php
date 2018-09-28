<?php 
require_once 'header.php';

?>


<fieldset>
  <legend>Adicionar Documento</legend>
  <form>
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="adicionarArquivo">Adicionar Arquivo</label>
        <input type="file" class="form-control-file" id="adicionarArquivo">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-4">
        <label for="obsTesteUmidade">Descrição</label>
        <textarea  class="form-control" rows="3" name="obsTesteUmidade" id="obsTesteUmidade" required=""></textarea>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-4">
        <input type="submit" value="Confirmar" class="btn btn-primary">
      </div>
    </div>
  </form>
</fieldset>

<?php
require_once 'footer.php';

?>   