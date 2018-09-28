<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();


$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia, condicao_armazenamento, data_implantacao FROM amostra, lote, especie WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$armazenamento = $amostra['condicao_armazenamento'];
	$dtimplantacao = $amostra['data_implantacao'];
}



?>

<div class="container">
	<br>
	<h3> Dados da Amostra</h3>
	<br>
	<div class="row">
		<div class="col-sm-2 ">
			<div class="form-group">
				<label for="loteOrigem">Código:</label> 
				<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" disabled="true">
			</div>
		</div>
		<div class="col-sm-2 ">
			<div class="form-group">
				<label for="loteOrigem">Lote de Origem:</label> 
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
			<label for="condicaoArmazenamento">Condição de Armazenamento:</label>	
			<input type="text"  class="form-control"  name="condicaoArmazenamento"value="<?php echo $armazenamento?>" id="condicaoArmazenamento"  disabled="true">
		</div>
		<div class="form-group col-sm-4">
			<label  for="dataImplatacao">Data Implantação:</label>
			<input type="date"  class="form-control"  name="dataImplatacao" id="dataImplatacao" value="<?php echo $dtimplantacao?>"  disabled="true">
		</div>
	</div>	

	<h3>Análises</h3>
	<hr>	
	<div class="row" >
		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="testeteoragua.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-tint fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px">
						<p>Teste Teor de Água</p>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="testenumsementes.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-mortar-pestle fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px">
						<p>Número de Sementes</p>
					</div>
				</div>
			</a>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<a href="testegerminacao.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
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
			<a href="testepureza.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
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
			<a href="testepesomilsementes.php?idamostra=<?php echo $idamostra; ?>" class="btn btn-default">
				<div class="row">
					<div class="col-xs-12 text-center">
						<i class="fa fa-balance-scale fa-5x"></i>
					</div>
					<div class="col-xs-12 text-center" style="font-size:16px; padding-top: 5px" >
						<p>Peso de 1000 Sementes</p>
					</div>
				</div>
			</a>
		</div>
	</div>

	<div class="row" style="padding-top: 40px">
		<div class="form-group col-sm-1">
			<a href="lista-amostra.php"><button type="button" class="btn btn-primary" style=" min-width: 100px"><i class="fa fa-reply"></i> Voltar</button></a>
		</div>
		<div class="form-group col-sm-1"></div>
		<div class="form-group col-sm-1">
			<a href="./pdf/boletim.php?idamostra=<?php echo $idamostra; ?>"><button type="button"  class="btn btn-success" style=" min-width: 200px">Gerar Boletim</button></a>
		</div>
		<div class="form-group col-sm-1"></div>
	</div>
	<?php
	require_once 'footer.php';

	?>


	


