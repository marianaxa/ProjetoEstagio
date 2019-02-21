<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$iamostra = new Crud();


$iamostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia, condicao_armazenamento, amostrador, renasem_amostrador, peneira, data_implantacao, representatividade FROM amostra, lote, especie WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie ");

foreach ($iamostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$armazenamento = $amostra['condicao_armazenamento'];
	$amostrador = $amostra['amostrador'];
	$renasemamostrador = $amostra['renasem_amostrador'];
	$peneira = $amostra['peneira'];
	$dtimplantacao = $amostra['data_implantacao'];
	$representatividade = $amostra['representatividade'];
}


?>

<div class="container">
	<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	} ?> 
	<br>

	<h3> Editar Dados da Amostra</h3>
	<br>
	<form name="formEdicaoAmostra" id="formEdicaoAmostra" method="POST" action="crud-amostra.php">
	<div class="row">
		<div class="col-sm-2 ">
			<div class="form-group">
				<label for="codamostra">Nº Amostra:</label> 
				<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly>
			</div>
		</div>
		<div class="col-sm-2 ">
			<div class="form-group">
				<label for="loteOrigem">Nº do Lote:</label> 
				<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" value="<?php echo $idlote?>" disabled="true">
			</div>
		</div>
		<div class="form-group col-sm-4 ">
			<label for="categoria">Categoria:</label> <!-- fornecido ou colhido -->
			<input type="text" class="form-control" name="categoria" id="categoria" value="<?php echo $categoria?>" disabled="">
		</div>	
		<div class="form-group col-sm-4 ">
			<label for="dataEntradaLoteOrigem">Data de entrada:</label> 
			<input type="text" class="form-control" name="dataEntradaLoteOrigem" id="dataEntradaLoteOrigem" value="<?php echo $dtchegada?>" disabled="true">
		</div>

	</div>

	<div class="row">
		<div class="form-group col-sm-4">
			<label  for="especie">Especie:</label>
			<input type="text"  class="form-control"  name="especie" id="especie"  value="<?php echo $nomevulgar?>" disabled="true">
		</div>
		
		<div class="form-group col-sm-4">
			<label  for="nomecientifico">Nome Científico</label>
			<input type="text"  class="form-control"  name="nomecientifico" id="nomecientifico"  value="<?php echo $nomecientifico?>" disabled="true">
		</div>

		<div class="form-group col-sm-4">
			<label  for="familia">Família:</label>
			<input type="text"  class="form-control"  name="familia" id="familia"  value="<?php echo $familia?>" disabled="true">
		</div>
	</div>	

	<div class="row">
		<div class="form-group col-sm-4">
			<label  for="amostrador">Amostrador:</label>
			<input type="text"  class="form-control"  name="amostrador" id="amostrador" value="<?php echo $amostrador?>" >
		</div>

		<div class="form-group col-sm-4">
			<label for="renasemamostrador">Nº Renasem:</label>	
			<input type="text" class="form-control"  name="renasemamostrador" maxlength="30" minlength="1" id="renasemamostrador" value="<?php echo $renasemamostrador?>">
		</div>

		<div class="form-group col-sm-4">
			<label  for="dataImplantacao">Data Amostragem</label>
			<input type="date"  class="form-control"  name="dataImplantacao" id="dataImplantacao" value="<?php echo $dtimplantacao?>">
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-4">
			<label for="condicaoArmazenamento">Condição de Armazenamento:</label>	
			<input type="text"  class="form-control"  name="condicaoArmazenamento"value="<?php echo $armazenamento?>" id="condicaoArmazenamento">
		</div>

		<div class="form-group col-sm-4">
			<label  for="peneira">Peneira:</label>
			<input type="text"  class="form-control"  name="peneira" id="peneira" value="<?php echo $peneira?>" >
		</div>

		<div class="form-group col-sm-4">
			<label for="representatividade">Representatividade (Kg):</label>	
			<input type="text"  class="form-control"  name="representatividade" value="<?php echo $representatividade?>" id="representatividade">
		</div>
	</div>

	<h3>Análises</h3>
	<hr>	
	<div class="row" >
		<div class="col-xs-6 col-sm-3 col-md-2" >
			<a href="editartesteteoragua.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-tint fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px">
						<p>Grau de Umidade</p>
					</div>
				</div>
			</a>
		</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="editartestegerminacao.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-leaf fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px">
					<p>Teste de Germinação</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="editartestepureza.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-microscope fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px">
					<p>Teste de Pureza</p>
				</div>
			</div>
		</a>
	</div>

	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="editarpesomilsementes.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fa fa-balance-scale fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px" >
					<p>Peso de Mil Sementes</p>
				</div>
			</div>
		</a>
	</div>


	<div class="col-xs-6 col-sm-3 col-md-2">
		<a href="editaroutrassementes.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
			<div class="row">
				<div class="col-xs-12 text-center">
					<i class="fab fa-ethereum fa-5x"></i>
				</div>
				<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px" >
					<p>Outras Sementes</p>
				</div>
			</div>
		</a>
	</div>


</div>

<div class="row" style="padding-top: 40px">
	<div class="form-group col-sm-1">
		<a href="lista-amostra.php"><button type="button" class="btn btn-basic" style="color:green; min-width: 100px"><i class="fa fa-reply"></i></button></a>
	</div>
	<div class="form-group col-sm-1"></div>
	<div class="form-group col-sm-1">
		<button type="submit" name="acao" value="edit" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
	</div>
	<div class="form-group col-sm-1"></div>
</div>


</form>
<?php
/*./pdf/boletim.php?idamostra=<?php echo $idamostra; ?>*/
require_once 'footer.php';

?>






