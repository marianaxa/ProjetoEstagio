<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao FROM amostra, lote, especie WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie ");

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
	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;">Número de Sementes</legend>


		<form  name="formCardastroNumSementes" id="formCardastroNumSementes" method="POST" action="crud-amostra.php">
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
				<div class="form-group col-sm-4 ">
					<label for="datanumsementes">Data Análise:</label> 
					<input type="date" class="form-control" name="datanumsementes" id="datanumsementes" required="">
				</div>
				<div class="form-group col-sm-4 ">
					<label for="analistaTesteNumSementes"> Analista: </label>
					<input type="text" class="form-control" name="analistaTesteNumSementes" id="analistaTesteNumSementes" maxlength="30" minlength="4" placeholder="Ex.: João da Silva" required="">
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="numSementes"> N° de Sementes: </label>
						<input type="number" class="form-control" name="numSementes" id="numSementes" min="1"  placeholder="Ex.: 500" required="">
					</div>
				</div>
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="pesoAmostra"> Peso da Amostra (g): </label>
						<input type="number" step="0.01" class="form-control" name="pesoAmostra" id="pesoAmostra" min="0.01"  placeholder="Ex.: 10" required="">
					</div>
				</div>
				<div class="form-group col-sm-3 ">
					<label for="numSementesKh"> N° Sementes (Kg): </label>
					<input type="number" step="0.01" class="form-control" name="numSementesKh" id="numSementesKh"  min="0.01"  placeholder="Ex.: 10" required="">
				</div>
				<div class="col-sm-2"></div>
			</div>	
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsTesteNumSementes">Observação</label>
					<textarea  class="form-control" rows="3" name="obsTesteNumSementes" id="obsTesteNumSementes"></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>	

			<div class="row" style="padding-top: 10px">
				<div class="form-group col-sm-4"></div>
				<div class="form-group col-sm-1">
					<a href="informacao-amostra.php?idamostra=<?php echo $idamostra ?>"><button type="button" class="btn btn-primary" style=" min-width: 200px"><span class="fa fa-reply"></span> Voltar</button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="createNumSementes" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>
		</form>
	</fieldset>
</div>

<?php 
require_once 'footer.php';
?>