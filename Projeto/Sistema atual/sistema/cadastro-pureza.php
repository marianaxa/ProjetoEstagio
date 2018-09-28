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
		<legend align="center" style="width:70%;">Cadastro Pureza</legend>

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

				<div class="form-group col-sm-4">
					<label for="dataensaio">Data do Ensaio:</label>
					<input type="date" class="form-control" name="dataensaio" id="dataensaio" required="">
				</div>
				<div class="form-group col-sm-4">	     		   
					<label for="analistapureza">Analista:</label>
					<input type="text" class="form-control" name="analistapureza" id="analistapureza" required="" >
				</div>
				

				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="pamostrarecebida">Peso da Amostra Média Recebida (g):</label> 
						<input type="text" class="form-control" name="pamostrarecebida" id="pamostrarecebida" >
					</div>
				</div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="pamostratrabalho">Peso da Amostra de Trabalho (g):</label> 
						<input type="text" class="form-control" name="pamostratrabalho" id="pamostratrabalho" >
					</div>
				</div>
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="sementespuras">Sementes Puras (SP):</label> 
						<input type="text" class="form-control" name="sementespuras" id="sementespuras" >
					</div>
				</div>
				<div class="col-sm-2 "></div>
			</div>
			<div class="row">
				<div class="col-sm-2 "></div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="outrassementes">Outras Sementes (OS):</label> 
						<input type="text" class="form-control" name="outrassementes" id="outrassementes" >
					</div>
				</div>
				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="materialinerte">Material Inerte (MI):</label> 
						<input type="text" class="form-control" name="materialinerte" id="materialinerte" >
					</div>
				</div>
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="outrascultivares">Outras Cultivares (N):</label> 
						<input type="text" class="form-control" name="outrascultivares" id="outrascultivares" >
					</div>
				</div>
				
				<div class="col-sm-2"></div>
			</div>
			<div class="row" style="padding-top: 10px">
				<div class="form-group col-sm-4"></div>
				<div class="form-group col-sm-1">
					<a href="informacao-amostra.php?idamostra=<?php echo $idamostra; ?>"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="createPureza" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>
		</form>


	</fieldset>



</div>

<?php 
require_once 'footer.php';
?>