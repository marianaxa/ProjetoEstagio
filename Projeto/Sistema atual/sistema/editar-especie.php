<?php 

$idesp = $_GET['idesp'];
require 'crud.php';
$especie = new Crud();

$especie->select("SELECT id_especie, nome_cientifico, nome_vulgar, familia, num_repeticoes FROM especie 
  where id_especie = $idesp");

foreach ($especie->result() as $especie ){
  $nomeCientifico= $especie['nome_cientifico'];
  $nomeVulgar = $especie['nome_vulgar'];
  $familia = $especie['familia'];
  $numRepeticoes = $especie['num_repeticoes'];
}

require_once 'header.php';

?>

<fieldset>
  <legend>Editar Especie</legend>
  <form  name="formEditarEspecie" id="formEditarEspecie" method="POST" action="crud-especie.php">

    <div class="row">
      <div  class="form-group col-sm-1">
        <label for="nome">Código:</label>
        <input type="text" class="form-control" name="idesp" id="idesp" value="<?php echo $idesp?>" readonly></input>
      </div>

      <div class="form-group col-sm-5">
        <label for="nome_vulgar">Nome Vulgar: </label><!--mudar deposi pra especie ou mudar nos outro pra nome vulgar-->
        <input type="text" class="form-control" name="nome_vulgar" id="nome_vulgar" maxlength="30" minlength="5" value="<?php echo $nomeVulgar?>" >
      </div>
    </div>

    <div class="row">          
      <div class="form-group col-sm-6">
        <label for="nome_cientifico">Nome Científico: </label>
        <input type="text" class="form-control" name="nome_cientifico" id="nome_cientifico" maxlength="30" minlength="5" value="<?php echo $nomeCientifico?>" >
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="familia">Família: </label>
        <input type="text"  class="form-control" name="familia" id="familia" maxlength="30" minlength="5" value="<?php echo $familia?>" >
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="numRepeticoes">Número de Repetições: </label>
        <input type="text"  class="form-control" name="numRepeticoes" id="numRepeticoes" min="1" value="<?php echo $numRepeticoes?>" >
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <button type="submit" class="btn btn-primary">Voltar</button>
        <button type="submit" name="acao" value="edit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </form>
</fieldset>
<?php
require_once 'footer.php';

?>