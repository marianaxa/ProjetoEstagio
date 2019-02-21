<?php 

$idesp = $_GET['idesp'];
require 'crud.php';
$especie = new Crud();

$especie->select("SELECT id_especie, nome_cientifico, nome_vulgar, familia, num_repeticoes, qtd_repeticoes FROM especie 
  where id_especie = $idesp");

foreach ($especie->result() as $especie ){
  $nomeCientifico= $especie['nome_cientifico'];
  $nomeVulgar = $especie['nome_vulgar'];
  $familia = $especie['familia'];
  $numRepeticoes = $especie['num_repeticoes'];  
  $qtdRepeticoes = $especie['qtd_repeticoes'];
}

require_once 'header.php';

?>

<div style="padding: 30px">
  <fieldset style="padding: 10px">
    <legend align="center" style="width:70%;">Editar Especie</legend>
    <form  name="formEditarEspecie" id="formEditarEspecie" method="POST" action="crud-especie.php">

      <div class="row">
        <div class="form-group col-sm-2"></div>
        <div  class="form-group col-sm-2">
          <label for="nome">Código:</label>
          <input type="text" class="form-control" name="idesp" id="idesp" value="<?php echo $idesp?>" readonly></input>
        </div>

        <div class="form-group col-sm-6">
          <label for="nome_vulgar">Nome Vulgar: </label><!--mudar deposi pra especie ou mudar nos outro pra nome vulgar-->
          <input type="text" class="form-control" name="nome_vulgar" id="nome_vulgar" maxlength="30" minlength="5" value="<?php echo $nomeVulgar?>" >
        </div>
        <div class="form-group col-sm-2"></div>
      </div>

      <div class="row"> 
       <div class="form-group col-sm-2"></div>         
       <div class="form-group col-sm-8">
        <label for="nome_cientifico">Nome Científico: </label>
        <input type="text" class="form-control" name="nome_cientifico" id="nome_cientifico" maxlength="30" minlength="5" value="<?php echo $nomeCientifico?>" >
      </div>
      <div class="form-group col-sm-2"></div>
    </div>

    <div class="row">
     <div class="form-group col-sm-2"></div>
     <div class="form-group col-sm-8">
      <label for="familia">Família: </label>
      <input type="text"  class="form-control" name="familia" id="familia" maxlength="30" minlength="5" value="<?php echo $familia?>" >
    </div>
    <div class="form-group col-sm-2"></div>
  </div>

  <div class="row">
   <div class="form-group col-sm-2"></div>
   <div class="form-group col-sm-4">
    <label for="numRepeticoes">Número de Repetições: </label>
    <input type="text"  class="form-control" name="numRepeticoes" id="numRepeticoes" min="1" value="<?php echo $numRepeticoes?>" >
  </div>
  <div class="form-group col-sm-4">
    <label for="numRepeticoes">Quantidade de Repetições: </label>
    <input type="text"  class="form-control" name="qtdRepeticoes" id="qtdRepeticoes" min="1" value="<?php echo $qtdRepeticoes?>" >
  </div>
  <div class="form-group col-sm-2"></div>
</div>

<div class="row" style="padding: 10px">

  <div class="form-group col-sm-5"></div>
              <!--
              <div class="form-group col-sm-1">
                <a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
              </div>
              <div class="form-group col-sm-1"></div> 
            -->
            <div class="form-group col-sm-1">
              <button type="submit" name="acao" value="edit" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
            </div>
            <div class="form-group col-sm-4"></div>
          </div>

          <div class="row">
            <div class="form-group col-sm-4"></div>
          </div>
          <div class="row">
            <div class="form-group col-sm-1">
              <a href="lista-especie.php"><button type="button" class="btn btn-basic" style="color: green; min-width: 90px"><i class="fa fa-reply"></i></button></a>
            </div>
          </div>
<!-- /*
    <div class="row" style="padding: 10px">
       <div class="form-group col-sm-4"></div>
      <div class="form-group col-sm-1">
         <a href="lista-especie.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
      </div>
      <div class="form-group col-sm-1"></div>
      <div class="form-group col-sm-1">
        <button type="submit" name="acao" value="edit" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
      </div>
       <div class="form-group col-sm-4"></div>
    </div>
    */ -->
  </form>
</fieldset>
</div>
<?php
require_once 'footer.php';

?>