<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, data_ensaio, analista_mil_sementes, kg_mil_sementes, kg_num_medio, obs_peso_mil_sementes FROM amostra, lote, especie, peso_mil_sementes WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$dataensaio = $amostra['data_ensaio'];
	$analista = $amostra['analista_mil_sementes'];
	$kgmilsementes = $amostra['kg_mil_sementes'];
	$kgnummedio = $amostra['kg_num_medio'];
	$obsmilsementes = $amostra['obs_peso_mil_sementes'];
}
?>

<script type="text/javascript">
	$(function () {
		function removeCampo() {
			$(".removerCampo").unbind("click");
			$(".removerCampo").bind("click", function () {
				if($("tr.linhas").length > 1){
					$(this).parent().parent().remove();
				}
			});
		}

		$(".adicionarCampo").click(function () {
			novoCampo = $("tr.linhas:first").clone();
			novoCampo.find("input").val("");
			novoCampo.insertAfter("tr.linhas:last");
			removeCampo();
		});
	});
</script>


<div style="padding: 30px">
	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;">Cadastro Repetição</legend>

		<form name="formCardastroRepeticao" id="formCardastroRepeticao" method="POST" action="crud-amostra">
			<div class="row">

			<div class="form-group col-sm-2"></div>
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
			
			<div class="form-group col-sm-2"></div>
		</div>

		<div class="row">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-2">
					<label for="dataEnsaioMilSementes">Data Ensaio:</label>
					<input type="date" class="form-control" name="dataEnsaioMilSementes" id="dataEnsaioMilSementes " value="<?php echo $dataensaio?>" readonly="">
				</div>

				<div class="form-group col-sm-6">	     		   
					<label for="analistaMilSementes">Analista:</label>
					<input type="text" class="form-control" name="analistaMilSementes" id="analistaMilSementes" value="<?php echo $analista?>" readonly="" >
				</div>
				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="form-group col-sm-2"></div>

				<div class="form-group col-sm-4">
					<label for="pesoMilSementes">Peso de Mil Sementes:</label>
					<input type="number" class="form-control" name="pesoMilSementes" id="pesoMilSementes" value="<?php echo $kgmilsementes?>" readonly="" >
				</div>

				<div class="form-group col-sm-4">	     		   
					<label for="numMedioSementes">Número Médio de Sementes:</label>
					<input type="number" class="form-control" name="numMedioSementes" id="numMedioSementes" value="<?php echo $kgnummedio?>" readonly="" >
				</div>			

				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsMilSementes">Observação</label>
					<textarea  class="form-control" rows="3" name="obsMilSementes" id="obsMilSementes" readonly="" ><?php echo $obsmilsementes?></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8 ">
						<table class="table table-hover" >
							<thead>
								<th scope="col">Repetição</th>
								<th scope="col">N. Sementes</th>
								<th scope="col">Peso Amostra</th>
								<th scope="col" colspan="4">
									<a href="#" class="adicionarCampo" title="Adicionar item"><i class="fa fa-plus-circle" style="font-size:15px"></i></a>
								</th>
							</thead>
							<tr class="linhas">

								<td><input type="text" class="form-control" name="repeticao[]" id="repeticao"></td>
								<td><input type="text" class="form-control" name="nsementes[]" id="nsementes"></td>
								<td><input type="text" class="form-control" name="pesoamostra[]" id="pesoamostra"></td>

								<td><a href="#" class="removerCampo" title="Remover linha"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
							</tr>							
						</table>
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
					<button type="submit" name="acao" value="createRepeticaoMilSementes" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>
		</form>


	</fieldset>



</div>

<?php 
require_once 'footer.php';
?>