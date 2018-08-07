<?php 
//conexao
require_once 'header.php';

?>
<div class="container">
  <fieldset>
    <legend>Cadastro de Especie</legend>
    <form  name="formCardastroEspecie" id="formCardastroEspecie" method="POST" action="crud-especie.php">


      <div class="row">
        <div class="form-group col-sm-6">
          <label for="nome_vulgar">Nome Vulgar: </label><!--mudar deposi pra especie ou mudar nos outro pra nome vulgar-->
          <input type="text" class="form-control" name="nome_vulgar" id="nome_vulgar" maxlength="30" minlength="4" placeholder="Ex.: Pupunha" required="">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="nome_cientifico">Nome Científico: </label>
          <input type="text" class="form-control" name="nome_cientifico" id="nome_cientifico" maxlength="30" minlength="5" placeholder="Ex.: Bactris gasipaes" required="">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="familia">Família: </label>
          <input type="text"  class="form-control" name="familia" id="familia" maxlength="30" minlength="5" placeholder="Ex.: Arecaceae" required="">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-sm-6">
          <label for="numRepeticoes">Numero de Repetições: </label>
          <input type="number"  class="form-control" name="numRepeticoes" id="numRepeticoes" min="1"  required="">
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-8">
         <a href="#"><button type="submit" class="btn btn-primary"><span class="fa fa-mail-reply"></span> Voltar</button></a>
          <button type="submit" name="acao" value="create" class="btn btn-primary">Confirmar</button>
        </div>
        <div class="form-group col-sm-2"></div>
      </div>
    </form>
  </fieldset>
</div>
<?php
require_once 'footer.php';

?>