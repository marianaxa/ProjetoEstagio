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
	<form name="formCardastroGerminacaoCabecalho" id="formCardastroGerminacaoCabecalho" method="POST" action="crud-amostra.php">

		<fieldset  style="padding: 10px">
			<legend align="center" style="width:70%;">Peso de Mil Sementes + Número Sementes/Kg</legend>
			<div class="row">
				<div class="form-group col-sm-2"></div>
				<div class="col-sm-2">
					<label for="codamostra">Nº Análise:</label>
					<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly="">
				</div>	

				<div class="form-group col-sm-2">
					<label for="loteOrigem">Nº Lote:</label>
					<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" value="<?php echo $idlote?>" readonly="">
				</div>	
				<div class="form-group col-sm-4">
					<label for="especie">Espécie:</label>
					<input type="text" class="form-control" name="especie" id="especie" value="<?php echo $nomevulgar?>" readonly="">
				</div>
				<div class="form-group col-sm-2"></div>				
			</div>

			<div class="row">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-3">
					<label for="dataEnsaioMilSementes">Data Ensaio:</label>
					<input type="date" class="form-control" name="dataEnsaioMilSementes" id="dataEnsaioMilSementes" required="">
				</div>

				<div class="form-group col-sm-3">	     		   
					<label for="analistaMilSementes">Analista:</label>
					<input type="text" class="form-control" name="analistaMilSementes" id="analistaMilSementes" required="">
				</div>

				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="pesoamostrams"> Peso da Amostra (g): </label>
						<input type="text" class="form-control" name="pesoamostrams" id="pesoamostrams" max="5" required="">
					</div>
				</div>

				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">	
				<div class="col-sm-2"></div>
				<div class="col-sm-8 ">
					<table class="table table-hover" >
						<thead>
							<th scope="col"> Repetição</th>
							<th scope="col">Peso da amostra</th>
							<th scope="col" colspan="4">
								<a href="#" class="adicionarCampo" title="Adicionar item"><i class="fa fa-plus-circle" style="font-size:15px"></i></a>
							</th>
						</thead>
						<tr class="linhas">

							<td><input type="text" class="form-control" name="descrep[]" id="descrep"></td>
							<td><input type="text" class="form-control" name="pesoamos[]" id="pesoamos"></td>

							<td><a href="#" class="removerCampo" title="Remover linha"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
						</tr>							
					</table>
				</div>

				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="form-group col-sm-2"></div>

				<div class="form-group col-sm-3">
					<label for="xpesosmenetes">X Peso médio de 100 sementes:</label>
					<input type="text" class="form-control" name="xpesosmenetes" id="xpesosmenetes" maxlength="5"  required="">
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="desviopadrao">Desvio-padrão:</label>
					<input type="text" class="form-control" name="desviopadrao"  maxlength="5" id="desviopadrao"   required="">
				</div>			

				<div class="form-group col-sm-1">
					<label for="variancia">Variância:</label>
					<input type="text" class="form-control" name="variancia" id="variancia" maxlength="5"  required="">
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="coef_variacao">Coeficiente de variação:</label>
					<input type="text" class="form-control" name="coef_variacao"  maxlength="5" id="coef_variacao"   required="">
				</div>			
				<div class="form-group col-sm-2"></div>
				
			</div>

			<div class="row">
				<div class="form-group col-sm-2"></div>

				<div class="form-group col-sm-4">
					<label for="pesoMilSementes">Peso de Mil Sementes (PMS):</label>
					<input type="text" class="form-control" name="pesoMilSementes" id="pesoMilSementes" maxlength="5"  required="">
				</div>

				<div class="form-group col-sm-4">	     		   
					<label for="numMedioSementes">Número Médio de Sementes (Kg):</label>
					<input type="text" step="0.00" class="form-control" name="numMedioSementes"  maxlength="5" id="numMedioSementes"   required="">
				</div>			

				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsMilSementes">Observação</label>
					<textarea  class="form-control" rows="3" name="obsMilSementes" id="obsMilSementes"></textarea>
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
 					<button type="submit" name="acao" value="createPesoMilSementes" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
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