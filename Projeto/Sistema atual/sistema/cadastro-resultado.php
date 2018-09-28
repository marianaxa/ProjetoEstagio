<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, datasemeadura, analista, temperatura, substrato, numsementes_repeticao, tratamento FROM amostra, lote, especie, germinacao WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$datasemeadura = $amostra['datasemeadura'];
	$analista = $amostra['analista'];
	$temperatura = $amostra['temperatura'];
	$substrato = $amostra['substrato'];
	$nsemrep= $amostra['numsementes_repeticao'];
	$tratamento = $amostra['tratamento'];
}
?>

<div style="padding: 30px">
	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;">Cadastro Resultado</legend>

		<form name="formCardastroResultado" id="formCardastroResultado" method="POST" action="crud-amostra">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-2">
					<label for="codamostra">Código Análise:</label>
					<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly="">
				</div>	

				<div class="form-group col-sm-3">
					<label for="loteOrigem">Lote de Origem:</label>
					<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" value="<?php echo $idlote?>" readonly="">
				</div>	
				<div class="form-group col-sm-3">
					<label for="especie">Espécie:</label>
					<input type="text" class="form-control" name="especie" id="especie" value="<?php echo $nomevulgar?>" readonly="">
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>

				<div class="form-group col-sm-2">
					<label for="dataSemeadura">Data Semeadura:</label>
					<input type="date" class="form-control" name="dataSemeadura" id="dataSemeadura" value="<?php echo $datasemeadura?>" readonly="">
				</div>
				<div class="form-group col-sm-3">	     		   
					<label for="analista">Analista:</label>
					<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>" readonly="">
				</div>
				<div class="form-group col-sm-3">
					<label for="tempetatura">Temperatura (C°):</label>
					<input type="number" class="form-control" name="tempetatura" id="tempetatura"  value="<?php echo $temperatura?>" readonly="">
				</div>

				<div class="col-sm-2"></div>
			</div>

			<div class="row">

				<div class="col-sm-2"></div>

				<div class="form-group col-sm-2">	     		   
					<label for="substrato">Substrato:</label>
					<input type="text" name ="substrato" id="subtrato" class="form-control" for="substrato" value="<?php echo $substrato?>" readonly="">
				</div>	
				<div class="form-group col-sm-3">	     		   
					<label for="sementesRepeticao">N. Sementes/Repetição:</label>
					<input type="text" class="form-control" name="sementesRepeticao" id="sementesRepeticao" value="<?php echo $nsemrep?>" readonly="">
				</div>

				<div class="form-group col-sm-3">	     		   
					<label for="tratamento">Tratamento:</label>
					<input type="text" class="form-control" name="tratamento" id="tratamento" value="<?php echo $tratamento?>" readonly="">
				</div>	
				<div class="col-sm-2"></div>	
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="plantulasnormais">Plântulas Normais:</label> 
						<input type="text" class="form-control" name="plantulasnormais" id="plantulasnormais" >
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="plantulasanormais">Plântulas Anormais:</label> 
						<input type="text" class="form-control" name="plantulasanormais" id="plantulasanormais" >
					</div>
				</div>
				<div class="col-sm-2 "></div>
			</div>
			<div class="row">
				<div class="col-sm-2 "></div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="sementesduras">Sementes Duras:</label> 
						<input type="text" class="form-control" name="sementesduras" id="sementesduras" >
					</div>
				</div>
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="sementesdormentes">Sementes Dormentes:</label> 
						<input type="text" class="form-control" name="sementesdormentes" id="sementesdormentes" >
					</div>
				</div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="sementesmortas">Sementes Mortas:</label> 
						<input type="text" class="form-control" name="sementesmortas" id="sementesmortas" >
					</div>
				</div>
				
				<div class="col-sm-2"></div>
			</div>
			<div class="row" style="padding-top: 10px">
				<div class="form-group col-sm-4"></div>
				<div class="form-group col-sm-1">
					<a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><span class="fa fa-mail-reply"></span> Voltar</button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="addResultado" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>
		</form>


	</fieldset>



</div>

<?php 
require_once 'footer.php';
?>