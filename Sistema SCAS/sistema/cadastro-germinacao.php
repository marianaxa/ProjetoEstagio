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
	

	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;">Teste de Germinção</legend>

		<form name="formCardastroGerminacaoCabecalho" id="formCardastroGerminacaoCabecalho" method="POST" action="crud-amostra.php">
			<div class="row">
				<div class="form-group col-sm-2"></div>
				<div class="col-sm-2">
					<label for="codamostra">Nº Amostra:</label>
					<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly="">
				</div>	

				<div class="form-group col-sm-3">
					<label for="loteOrigem">Nº do Lote:</label>
					<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" value="<?php echo $idlote?>" readonly="">
				</div>	
				<div class="form-group col-sm-3">
					<label for="especie">Espécie:</label>
					<input type="text" class="form-control" name="especie" id="especie" value="<?php echo $nomevulgar?>" readonly="">
				</div>
				<div class="form-group col-sm-2"></div>				
			</div>

			<div class="row">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-4">
					<label for="dataSemeadura">Data Semeadura:</label>
					<input type="date" class="form-control" name="dataSemeadura" id="dataSemeadura" required="">
				</div>

				<div class="form-group col-sm-4">	     		   
					<label for="analista">Analista:</label>
					<input type="text" class="form-control" name="analista" id="analista" required="">
				</div>
				
				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="form-group col-sm-2"></div>

				<div class="form-group col-sm-3 ">
					<label for="pesoamostra"> Peso Amostra (g): </label>
					<input type="text" class="form-control" name="pesoamostra" id="pesoamostra" maxlength="30" minlength="1"  required="">
				</div>
				<div class="form-group col-sm-2">
					<label for="temperatura">Temperatura (C°):</label>
					<input type="number" class="form-control" name="temperatura" id="temperatura"  min="0.00" required="">
				</div>

				<div class="form-group col-sm-3">	     		   
					<label for="substrato">Substrato:</label>
					<select name ="substrato" id="subtrato" class="form-control" for="substrato" required="">
						<option >Selecione...</option>
						<option value="EP">EP - Substrarto entre papel</option>
						<option value="RP">RP - Substrarto rolo de papel</option>
						<option value="SAL">SAL - Substrarto sobre algodão</option>
						<option value="SE">SE - Substrarto serragem</option>						
						<option value="SS">SS - Substrarto mais seco que o normal</option>						
						<option value="EA">EA - Substrarto entre areia</option>
						<option value="EV">EV - Substrarto sobre vermiculita</option>						
						<option value="SC">SC - Substrarto sobre carvão</option>
						<option value="SV">SV - Substrarto sobre vermiculita</option>
					</select>
				</div>	
				

				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">	

				<div class="form-group col-sm-2"></div>
				
				<div class="form-group col-sm-3">	     		   
					<label for="sementesRepeticao">N. Sementes/Repetição:</label>
					<input type="text" class="form-control" name="sementesRepeticao" id="sementesRepeticao" required="">
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="repeticoes">N. Repetições:</label>
					<input type="text" class="form-control" name="repeticoes" id="repeticoes" required="">
				</div>

				<div class="form-group col-sm-3">	     		   
					<label for="tratamento">Tratamento:</label>
					<input type="text" class="form-control" name="tratamento" id="tratamento" required="">
				</div>

				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsgerminacao">Observação</label>
					<textarea  class="form-control" rows="3" name="obsgerminacao" id="obsgerminacao"></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>
			
		</fieldset>
		<!--Fim informações-->
		
			<div class="row">						
 				<div class="row" style="padding: 0px">
 					<div class="form-group col-sm-5"></div>
<!-- 					<div class="form-group col-sm-1">
 						<a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
 					</div>

 					<div class="form-group col-sm-1"></div> 
 -->
 					<div class="form-group col-sm-1">
 						<button type="submit" name="acao" value="createGerminacao" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
 					</div>
 					<div class="form-group col-sm-4"></div>
 				</div>
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
</div>

<?php 
include('modal-especies.php');
require_once 'footer.php';
?>