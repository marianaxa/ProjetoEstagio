<?php 
require_once 'header.php';

?>


<fieldset>
  <legend>Número de Sementes</legend>
  <form  name="formCardastroNumSementes" id="formCardastroNumSementes" method="get" action="#">
    <!--Essas informações talvez sejam cadastradas uma unica vez -->

    <div class="row">
      <div class="form-group col-sm-6">
        <label for="analistaTesteNumSementes"> Analista: </label>
        <input type="text" class="form-control" name="analistaTesteNumSementes" id="analistaTesteNumSementes" maxlength="30" minlength="4" placeholder="Ex.: João da Silva" required="">
      </div>

      <div class="form-group col-sm-2">
        <label for="dataTesteNumSementes"> Data de realização do teste: </label>
        <input type="date" class="form-control" name="dataTesteNumSementes" id="dataTesteNumSementes" maxlength="10" minlength="10" placeholder="Ex.: 01/01/2018" required="">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-2">
        <label for="numSementes"> N° de Sementes: </label>
        <input type="number" class="form-control" name="numSementes" id="numSementes" min="0"  placeholder="Ex.: 500" required="">
      </div>

      <div class="form-group col-sm-3">
        <label for="pesoAmostra"> Peso da Amostra: </label>
        <input type="number" class="form-control" name="pesoAmostra" id="pesoAmostra" min="0"  placeholder="Ex.: 10" required="">
      </div>

      <div class="form-group col-sm-3">
        <label for="numSementesKh"> N° Sementes (KH): </label>
        <input type="number" class="form-control" name="numSementesKh" id="numSementesKh"  min="0"  placeholder="Ex.: 10" required="">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-8">
        <label for="obsTesteUmidade">Observação</label>
        <textarea  class="form-control" rows="5" name="obsTesteUmidade" id="obsTesteUmidade"></textarea>
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-8">
        <button type="submit" class="btn btn-primary">Voltar</button>
        <input type="submit" value="Confirmar" class="btn btn-primary">
      </div>
    </div>
  </form>
</fieldset>

<?php
require_once 'footer.php';

?>