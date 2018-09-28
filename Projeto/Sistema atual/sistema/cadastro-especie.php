<?php 
//conexao
require_once 'header.php';

?>
<div style="padding: 30px">
  <fieldset style="padding: 10px">
    <legend align="center" style="width:70%;">Cadastro de Especie</legend>
    <form  name="formCardastroEspecie" id="formCardastroEspecie" method="POST" action="crud-especie.php">
      <div class="row">
        <div class="form-group col-sm-2"></div> 
        <div class="form-group col-sm-8">
          <label for="nome_vulgar">Nome Vulgar: </label><!--mudar deposi pra especie ou mudar nos outro pra nome vulgar-->
          <input type="text" class="form-control" name="nome_vulgar" id="nome_vulgar" maxlength="30" minlength="4" placeholder="Ex.: Pupunha" required="">
        </div>
        <div class="form-group col-sm-2"></div> 
      </div>

      <div class="row">
        <div class="form-group col-sm-2"></div> 
        <div class="form-group col-sm-8">
          <label for="nome_cientifico">Nome Científico: </label>
          <input type="text" class="form-control" name="nome_cientifico" id="nome_cientifico" maxlength="30" minlength="5" placeholder="Ex.: Bactris gasipaes" required="">
        </div>        
        <div class="form-group col-sm-2"></div> 
      </div>

      <div class="row">
        <div class="form-group col-sm-2"></div> 
        <div class="form-group col-sm-8">
          <label for="familia">Família: </label>
          <input type="text"  class="form-control" name="familia" id="familia" maxlength="30" minlength="5" placeholder="Ex.: Arecaceae" required="">
        </div>
        <div class="form-group col-sm-2"></div> 
      </div>

      <div class="row">
        <div class="form-group col-sm-2"></div> 
        <div class="form-group col-sm-8">
          <label for="numRepeticoes">Numero de Repetições: </label>
          <input type="number"  class="form-control" name="numRepeticoes" id="numRepeticoes" min="1"  required="">
        </div>
        <div class="form-group col-sm-2"></div> 
      </div>

      <div class="row" style="padding: 10px">
        <div class="form-group col-sm-4"></div>
        <div class="form-group col-sm-1">
          <a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
        </div>
        <div class="form-group col-sm-1"></div> 
        <div class="form-group col-sm-1">
          <button type="submit" name="acao" value="create" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
        </div>
        <div class="form-group col-sm-4"></div>
      </div>

    </form>
  </fieldset>
</div>
<?php
require_once 'footer.php';

?>