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
		<legend align="center" style="width:70%;">Outras Sementes Por Número</legend>

		<form name="formCardastroOutrasSementes" id="formCardastroOutrasSementes" method="POST" action="crud-amostra">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-2">
					<label for="codamostra">Nº Amostra:</label>
					<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly="">
				</div>	

				<div class="form-group col-sm-3">
					<label for="loteOrigem">Nº Lote:</label>
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
					<label for="dataensaioos">Data do Ensaio:</label>
					<input type="date" class="form-control" name="dataensaioos" id="dataensaioos" required="">
				</div>
				<div class="form-group col-sm-3">	     		   
					<label for="analistaoutrassem">Analista:</label>
					<input type="text" class="form-control" name="analistaoutrassem" id="analistaoutrassem" required="" >
				</div>

				<div class="col-sm-3 ">
					<div class="form-group">
						<label for="peamostra">Peso da Amostra (g):</label> 
						<input type="text" class="form-control" name="peamostra" id="peamostra" >
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>

				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="outrasespecies">Outras Espécies Cultivadas (%):</label> 
						<input type="text" class="form-control" name="outrasespecies" id="outrasespecies" >
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="sementessilvestres">Sementes Silvestres (g):</label> 
						<input type="text" class="form-control" name="sementessilvestres" id="sementessilvestres" >
					</div>
				</div>				
				<div class="col-sm-2 "></div>
			</div>
			<div class="row">
				<div class="col-sm-2 "></div>

				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="sementestoleradas">Sementes Toleradas (g):</label> 
						<input type="text" class="form-control" name="sementestoleradas" id="sementestoleradas" >
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="sementesproibidas">Sementes Proibidas (g):</label> 
						<input type="text" class="form-control" name="sementesproibidas" id="sementesproibidas" >
					</div>
				</div>				
				<div class="col-sm-2"></div>
			</div>


			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsoutrassementes">Observação</label>
					<textarea  class="form-control" rows="3" name="obsoutrassementes" id="obsoutrassementes"></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>
<!--
			<div class="row" style="padding-top: 10px">
				<div class="form-group col-sm-4"></div>
				<div class="form-group col-sm-1">
					<a href="informacao-amostra.php?idamostra=<?php echo $idamostra ?>"><button type="button" class="btn btn-primary" style=" min-width: 200px"><span class="fa fa-reply"></span> Voltar</button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="createOutrasSem" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>
-->
		<div class="row">						
			<div class="row" style="padding: 0px">
				<div class="form-group col-sm-5"></div>
<!-- 					<div class="form-group col-sm-1">
 						<a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
 					</div>

 					<div class="form-group col-sm-1"></div> 
 				-->
 				<div class="form-group col-sm-1">
 					<button type="submit" name="acao" value="createOutrasSem" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
 				</div>
 				<div class="form-group col-sm-4"></div>
 			</div>


 			<div class="row">
 				<div class="form-group col-sm-4"></div>
 			</div>
 			<div class="row">
 				<div class="form-group col-sm-1">
 					<a href="informacao-amostra.php?idamostra=<?php echo $idamostra ?>"><button type="button" class="btn btn-basic" style="color: green; min-width: 90px"><i class="fa fa-reply"></i></button></a>
 				</div>
 			</div>


		</form>


	</fieldset>



</div>

<?php 
require_once 'footer.php';
?>