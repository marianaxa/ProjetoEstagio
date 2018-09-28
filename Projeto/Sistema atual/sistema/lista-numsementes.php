<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, data_num_sementes, analista_num_sementes, qtd_num_sementes,  peso_amostra, kg_num_sementes, observacoes_num_sementes FROM amostra, lote, especie, num_sementes WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra;  ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$dtanalise = $amostra['data_num_sementes'];
	$analista = $amostra['analista_num_sementes'];
	$qtdnumsementes = $amostra['qtd_num_sementes'];
	$pamostra = $amostra['peso_amostra'];
	$kgnumsementes= $amostra['kg_num_sementes'];
	$obsnumsementes = $amostra['observacoes_num_sementes'];
}
?>

<div style="padding: 30px">
	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;"><h3><a href="informacao-amostra.php?idamostra=<?php echo $idamostra; ?>"><i class="fa fa-chevron-left"></i></a> Informação Num. Sementes</h3></legend>

		<form name="formCardastroPureza" id="formCardastroPureza" method="POST" action="crud-amostra">
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
					<input type="date" class="form-control" name="datanumsementes" id="datanumsementes" value="<?php echo $dtanalise?>" readonly="">
				</div>
				<div class="form-group col-sm-4 ">
					<label for="analistaTesteNumSementes"> Analista: </label>
					<input type="text" class="form-control" name="analistaTesteNumSementes" id="analistaTesteNumSementes" maxlength="30" minlength="4" value="<?php echo $analista?>" readonly="">
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="numSementes"> N° de Sementes: </label>
						<input type="number" class="form-control" name="numSementes" id="numSementes" min="1" value="<?php echo $qtdnumsementes?>" readonly="">
					</div>
				</div>
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="pesoAmostra"> Peso da Amostra: </label>
						<input type="number" step="0.01" class="form-control" name="pesoAmostra" id="pesoAmostra" min="0.01"value="<?php echo $pamostra?>" readonly="">
					</div>
				</div>
				<div class="form-group col-sm-3 ">
					<label for="numSementesKh"> N° Sementes (Kg): </label>
					<input type="number" step="0.01" class="form-control" name="numSementesKh" id="numSementesKh"  min="0.01" value="<?php echo $kgnumsementes?>" readonly="">
				</div>
				<div class="col-sm-2"></div>
			</div>	
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsTesteNumSementes">Observação</label>
					<textarea readonly class="form-control" rows="3" name="obsTesteNumSementes" id="obsTesteNumSementes" value="<?php echo $obsnumsementes?>" readonly="" ></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</form>


	</fieldset>



</div>

<?php 
require_once 'footer.php';
?>