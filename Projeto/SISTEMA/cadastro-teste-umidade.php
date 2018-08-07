<?php 
require_once 'header.php';

?>


<fieldset>
  <legend>Teor de Água</legend>
  <!--Essas informações talvez sejam cadastradas uma unica vez -->
  <form name="formTesteTeorAgua" id="formTesteTeorAgua" method="get" action="#">


    <div class="row">
      <div class="form-group col-sm-6">
        <label for="analistaTesteTeorAgua">Analista:</label>
        <input type="text" class="form-control" name="analistaTesteTeorAgua" id="analistaTesteTeorAgua"    maxlength="30" minlength="4" placeholder="Ex.: João da Silva" required="">  
      </div>
      <div class="form-group col-sm-2">
        <label for="dataTesteTeorAgua">Data de realização do teste:</label> 
        <input type="date" class="form-control" name="dataTesteTeorAgua" id="dataTesteTeorAgua" required="">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-2">
        <label for="numCadinho">N° Cadinho:</label>
        <input type="number" class="form-control" name="numCadinho" id="numCadinho"   min="0" placeholder="Ex.: 1" required="">
      </div>

      <div class="form-group col-sm-3">
        <label for="pesoCadinho">Peso do Cadinho:</label>
        <input type="number" class="form-control" name="pesoCadinho" id="pesoCadinho" min="0" placeholder="Ex.: 1,25" required=""> 
      </div>

      <div class="form-group col-sm-3">
        <label for="pesoUmido">Peso Úmido:</label> 
        <input type="number" class="form-control" name="pesoUmido" id="pesoUmido" min="0" placeholder="Ex.: 3,45" required="">
      </div>
    </div>

    <div class="row">
      <div class="form-group col-sm-2">
        <label for="pesoSeco">Peso Seco:</label>      
        <input type="number" class="form-control" name="pesoSeco" id="pesoSeco" min="0" placeholder="Ex.: 1" required="">
      </div>

      <div class="form-group col-sm-3">
        <label for="umidade">Umidade (%):</label>
        <input type="number" class="form-control" name="umidade" id="umidade" min="0"  placeholder="Ex.: 30" required="">
      </div>

      <div class="form-group col-sm-3">
        <label for="umidadeMedia">Umidade Média (%):</label>
        <input type="number" class="form-control" name="umidadeMedia" id="umidadeMedia" min="1" placeholder="Ex.: 30" required="">
      </div>
    </div>

    <div class="row">  
     <div class="form-group col-sm-8">
      <label for="obsTesteUmidade">Observação</label>
      <textarea  class="form-control" rows="5" name="obsTesteUmidade"  maxlength="255" minlength="1"  id="obsTesteUmidade"></textarea>
    </div>
  </div>

  <div class="row">          
    <div class="form-group col-sm-8">
      <button type="submit" class="btn btn-primary">Voltar</button>
      <button type="submit" class="btn btn-primary">Confirmar</button>
    </div>
  </div>

</form>
</fieldset>
<?php
require_once 'footer.php';

?>
