<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, data_ensaio, analista, peso_amostra_media,  peso_amostra_trab, sementes_puras, outras_sementes, material_inerte, outras_cultivares, obs_pureza FROM amostra, lote, especie, pureza WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra;  ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$dtensaio = $amostra['data_ensaio'];
	$analista = $amostra['analista'];
	$pamostramed = $amostra['peso_amostra_media'];
	$pamostratrab = $amostra['peso_amostra_trab'];
	$sempuras= $amostra['sementes_puras'];
	$osementes = $amostra['outras_sementes'];
	$matinerte = $amostra['material_inerte'];
	$ocultivares = $amostra['outras_cultivares'];
	$obspureza = $amostra['obs_pureza'];
}
?>

<div style="padding: 30px">
	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;"><h3> Editar Pureza</h3></legend>

		<form name="formEditarPureza" id="formEditarPureza" method="POST" action="crud-amostra">
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

				<div class="form-group col-sm-4">
					<label for="dataensaio">Data do Ensaio:</label>
					<input type="date" class="form-control" name="dataensaio" id="dataensaio" value="<?php echo $dtensaio?>" >
				</div>
				<div class="form-group col-sm-4">	     		   
					<label for="analistapureza">Analista:</label>
					<input type="text" class="form-control" name="analistapureza" id="analistapureza" value="<?php echo $analista?>" >
				</div>

				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="pamostrarecebida">Peso da Amostra Média Recebida (g):</label> 
						<input type="text" class="form-control" name="pamostrarecebida" id="pamostrarecebida"  value="<?php echo $pamostramed?>">
					</div>
				</div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="pamostratrabalho">Peso da Amostra de Trabalho (g):</label> 
						<input type="text" class="form-control" name="pamostratrabalho" id="pamostratrabalho" value="<?php echo $pamostratrab?>" >
					</div>
				</div>
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="sementespuras">Sementes Puras (SP):</label> 
						<input type="text" class="form-control" name="sementespuras" id="sementespuras" value="<?php echo $sempuras?>" >
					</div>
				</div>
				<div class="col-sm-2 "></div>
			</div>
			<div class="row">
				<div class="col-sm-2 "></div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="outrassementes">Outras Sementes (OS):</label> 
						<input type="text" class="form-control" name="outrassementes" id="outrassementes" value="<?php echo $osementes?>">
					</div>
				</div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="materialinerte">Material Inerte (MI):</label> 
						<input type="text" class="form-control" name="materialinerte" id="materialinerte" value="<?php echo $matinerte?>">
					</div>
				</div>
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="outrascultivares">Outras Cultivares (N):</label> 
						<input type="text" class="form-control" name="outrascultivares" id="outrascultivares" value="<?php echo $ocultivares?>">
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obspureza">Observação</label>
					<textarea  class="form-control" rows="3" name="obspureza" id="obspureza"><?php echo $obspureza?></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row" style="padding: 10px">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-1">
					<a href="editar-amostra.php?idamostra=<?php echo $idamostra; ?>"><button type="button" class="btn btn-basic" style="color: green; min-width: 100px"><i class="fa fa-reply"></i></button></a>
				</div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="editPureza" class="btn btn-success" style=" min-width: 150px">Confirmar</button>
				</div>
				<div class="form-group col-sm-1"></div>
			</div>
			
		</div>
	</form>


</fieldset>



</div>

<?php 
require_once 'footer.php';
?>