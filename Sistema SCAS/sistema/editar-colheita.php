<?php 


$idcol = $_GET['idcol'];
require 'crud.php';
$colheita = new Crud();

  $colheita->select("SELECT idcolheita, data, local, colhedores FROM colheita 
    where idcolheita = $idcol");

  foreach ($colheita->result() as $colheita ){
    $dataColheita= $colheita['dataColheita'];
    $localColheita = $colheita['localColheita'];
    $colhedores = $colheita['colhedores'];
    $obsColheita = $colheita['obsColheita'];
  }

require_once 'header.php';
?>

<fieldset>
  <legend>Cadastro de Colheita</legend>
  <form  name="formEditarColheita" id="formEditarColheita" method="POST" action="crud-colheita.php">

    <div class="row">
      <div  class="form-group col-sm-1">
        <label for="nome">Código:</label>
        <input type="text" class="form-control" name="idesp" id="idesp" value="<?php echo $idesp?>" readonly></input>
      </div>
      
      <div class="form-group col-sm-5">
        <label for="dataColheita">Data: </label><!--mudar deposi pra especie ou mudar nos outro pra nome vulgar-->
        <input type="text" class="form-control" name="dataColheita" id="dataColheita" maxlength="30" minlength="5" value="<?php echo $dataColheita?>" >
      </div>
    </div>

    <div class="row">          
      <div class="form-group col-sm-6">
        <label for="localColheita">Local: </label>
        <input type="text" class="form-control" name="localColheita" id="localColheita" maxlength="30" minlength="5" value="<?php echo $localColheita?>" >
      </div>
    </div>
    <div class="row">
      <div class="form-group col-sm-6">
        <label for="colhedores">Colhedores: </label>
        <input type="text"  class="form-control" name="colhedores" id="colhedores" maxlength="30" minlength="5" value="<?php echo $colhedores?>" >
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary">Voltar</button>
        <button type="submit" name="acao" value="edit" class="btn btn-primary">Confirmar</button>
      </div>
    </div>
  </form>
</fieldset>
<?php
require_once 'footer.php';

?>