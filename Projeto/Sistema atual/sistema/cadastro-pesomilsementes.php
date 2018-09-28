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
}
?>



<div style="padding: 30px">
	<form name="formCardastroGerminacaoCabecalho" id="formCardastroGerminacaoCabecalho" method="POST" action="crud-amostra.php">

		<fieldset  style="padding: 10px">
			<legend align="center" style="width:70%;">Peso de Mil Sementes</legend>
			<div class="row">
				<div class="form-group col-sm-3"></div>
				<div class="col-sm-2">
					<label for="codamostra">Código Análise:</label>
					<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly="">
				</div>	

				<div class="form-group col-sm-2">
					<label for="loteOrigem">Lote de Origem:</label>
					<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" value="<?php echo $idlote?>" readonly="">
				</div>	
				<div class="form-group col-sm-3">
					<label for="especie">Espécie:</label>
					<input type="text" class="form-control" name="especie" id="especie" value="<?php echo $nomevulgar?>" readonly="">
				</div>
				<div class="form-group col-sm-2"></div>				
			</div>

			<div class="row">
				<div class="form-group col-sm-3"></div>
				<div class="form-group col-sm-2">
					<label for="dataEnsaioMilSementes">Data Ensaio:</label>
					<input type="date" class="form-control" name="dataEnsaioMilSementes" id="dataEnsaioMilSementes" required="">
				</div>

				<div class="form-group col-sm-5">	     		   
					<label for="analistaMilSementes">Analista:</label>
					<input type="text" class="form-control" name="analistaMilSementes" id="analistaMilSementes" required="">
				</div>
				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="form-group col-sm-3"></div>

				<div class="form-group col-sm-3">
					<label for="pesoMilSementes">Peso de Mil Sementes:</label>
					<input type="number" class="form-control" name="pesoMilSementes" id="pesoMilSementes"  min="0.01" required="">
				</div>

				<div class="form-group col-sm-4">	     		   
					<label for="numMedioSementes">Número Médio de Sementes:</label>
					<input type="number" class="form-control" name="numMedioSementes" id="numMedioSementes"  min="0.01" required="">
				</div>			

				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-3"></div>
				<div class="form-group col-sm-7">
					<label for="obsMilSementes">Observação</label>
					<textarea  class="form-control" rows="3" name="obsMilSementes" id="obsMilSementes"></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>

		</fieldset>
		<!--Fim informações-->
		

		<div class="row" style="padding: 0px">
			<div class="form-group col-sm-4"></div>
			<div class="form-group col-sm-1">
				<a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><span class="fa fa-mail-reply"></span> Voltar</button></a>
			</div>
			<div class="form-group col-sm-1"></div>
			<div class="form-group col-sm-1">
				<button type="submit" name="acao" value="createPesoMilSementes" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
			</div>
			<div class="form-group col-sm-4"></div>
		</div>
	</form>
</div>

<?php 
include('modal-especies.php');
require_once 'footer.php';
?>