<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, dt_outras_sementes, analista_outras_sementes, peso_amostra_os, outras_especies, sementes_silvestres, sementes_toleradas, sementes_proibidas, obs_outras_sementes FROM amostra, lote, especie, outras_sementes WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra;  ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$dtensaio = $amostra['dt_outras_sementes'];
	$analista = $amostra['analista_outras_sementes'];
	$peamostra = $amostra['peso_amostra_os'];
	$outrasespecies = $amostra['outras_especies'];
	$semsilvestres= $amostra['sementes_silvestres'];
	$semtoleradas = $amostra['sementes_toleradas'];
	$semproibidas = $amostra['sementes_proibidas'];
	$obsoutrassem = $amostra['obs_outras_sementes'];
}
?>

<div style="padding: 30px">
	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;"><h3> Informação Outras Sementes</h3></legend>

		<form name="formCardastroOutrasSementes" id="formCardastroOutrasSementes" method="POST" action="crud-amostra">
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
					<label for="dataensaio">Data do Ensaio:</label>
					<input type="date" class="form-control" name="dataensaio" id="dataensaio" value="<?php echo $dtensaio?>" readonly="">
				</div>
				<div class="form-group col-sm-3">	     		   
					<label for="analista">Analista:</label>
					<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>" readonly="" >
				</div>

				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="peamostra">Peso da Amostra (g):</label> 
						<input type="text" class="form-control" name="peamostra" id="peamostra"  value="<?php echo $peamostra?>" readonly="">
					</div>
				</div>

				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>

				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="outrasespecies">Outras Espécies Cultivadas (%):</label> 
						<input type="text" class="form-control" name="outrasespecies" id="outrasespecies"  value="<?php echo $outrasespecies?>" readonly="">
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="sementessilvestres">Sementes Silvestres (g):</label> 
						<input type="text" class="form-control" name="sementessilvestres" id="sementessilvestres" value="<?php echo $semsilvestres?>" readonly="">
					</div>
				</div>	
				<div class="col-sm-2 "></div>
			</div>
			<div class="row">
				<div class="col-sm-2 "></div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="sementestoleradas">Sementes Toleradas (g):</label> 
						<input type="text" class="form-control" name="sementestoleradas" id="sementestoleradas" value="<?php echo $semtoleradas?>" readonly="">
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="sementesproibidas">Sementes Proibidas (g):</label> 
						<input type="text" class="form-control" name="sementesproibidas" id="sementesproibidas" value="<?php echo $semproibidas?>" readonly="">
					</div>
				</div>	
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsoutrassem">Observação</label>
					<textarea  class="form-control" rows="3" name="obsoutrassem" id="obsoutrassem" readonly=""><?php echo $obsoutrassem?></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row" style="padding: 10px">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-1">
					<a href="informacao-amostra.php?idamostra=<?php echo $idamostra; ?>"><button type="button" class="btn btn-success" style=" min-width: 150px"><i class="fa fa-reply"></i> Voltar</button></a>
				</div>
				<div class="form-group col-sm-6"></div>
			</div>
			
		</div>
	</form>


</fieldset>



</div>

<?php 
require_once 'footer.php';
?>