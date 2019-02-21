<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, datasemeadura, analista, temperatura, substrato, numsementes_repeticao, numrepeticoes, peso_amostra_germinacao, tratamento FROM amostra, lote, especie, germinacao WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$datasemeadura = $amostra['datasemeadura'];
	$analista = $amostra['analista'];
	$temperatura = $amostra['temperatura'];
	$substrato = $amostra['substrato'];
	$nsemrep= $amostra['numsementes_repeticao'];
	$nrepeticoes = $amostra['numrepeticoes'];
	$pesoamostra = $amostra['peso_amostra_germinacao'];
	$tratamento = $amostra['tratamento'];
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
					<label for="dataSemeadura">Data da Semeadura:</label>
					<input type="date" class="form-control" name="dataSemeadura" id="dataSemeadura" value="<?php echo $datasemeadura?>" readonly="">
				</div>
				<div class="form-group col-sm-2">	     		   
					<label for="analista">Analista:</label>
					<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>" readonly="">
				</div>
				<div class="form-group col-sm-2">
					<label for="tempetatura">Temperatura (C°):</label>
					<input type="number" class="form-control" name="tempetatura" id="tempetatura"  value="<?php echo $temperatura?>" readonly="">
				</div>

				<div class="form-group col-sm-2 ">
					<label for="pesoamostra"> Peso Amostra (Kg): </label>
					<input type="text" class="form-control" name="pesoamostra" id="pesoamostra" value="<?php echo $pesoamostra?>" readonly=""">
				</div>

				<div class="col-sm-2"></div>
			</div>

			<div class="row">

				<div class="col-sm-2"></div>

				<div class="form-group col-sm-2">	     		   
					<label for="substrato">Substrato:</label>
					<input type="text" name ="substrato" id="subtrato" class="form-control" for="substrato" value="<?php echo $substrato?>" readonly="">
				</div>	
				<div class="form-group col-sm-2">	     		   
					<label for="sementesRepeticao">N. Sementes/Repetição:</label>
					<input type="text" class="form-control" name="sementesRepeticao" id="sementesRepeticao" value="<?php echo $nsemrep?>" readonly="">
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="repeticoes">N. Repetições:</label>
					<input type="text" class="form-control" name="repeticoes" id="repeticoes" required="" value="<?php echo $nrepeticoes?>" readonly="">
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="tratamento">Tratamento:</label>
					<input type="text" class="form-control" name="tratamento" id="tratamento" value="<?php echo $tratamento?>" readonly="">
				</div>	
				<div class="col-sm-2"></div>	
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="diassemeadura">Nº Dias da Semeadura:</label> 
						<input type="text" class="form-control" name="diassemeadura" id="diassemeadura" required="" >
					</div>
				</div>
				<div class="col-sm-4 ">
					<div class="form-group">
						<label for="dataRepeticao">Data:</label> 
						<input type="date" class="form-control" name="dataRepeticao" id="dataRepeticao" required="" >
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>
			<div class="row">	
				<div class="col-sm-2"></div>
				<div class="col-sm-8 ">
					<table class="table table-hover" >
						<thead>
							<th scope="col"> Repetição</th>
							<th scope="col">Quantidade Germ.</th>
							<th scope="col" colspan="4">
								<a href="#" class="adicionarCampo" title="Adicionar item"><i class="fa fa-plus-circle" style="font-size:15px"></i></a>
							</th>
						</thead>
						<tr class="linhas">

							<td><input type="text" class="form-control" name="desrepeticao[]" id="desrepeticao"></td>
							<td><input type="text" class="form-control" name="quantidade[]" id="quantidade"></td>

							<td><a href="#" class="removerCampo" title="Remover linha"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
						</tr>							
					</table>
				</div>

				<div class="col-sm-2"></div>
			</div>

			<!--
			<div class="row" style="padding-top: 10px">
				<div class="form-group col-sm-4"></div>
				<div class="form-group col-sm-1">
					<a href="lista-germinacao.php?idamostra=<?php echo $idamostra ?>"><button type="button" class="btn btn-primary" style=" min-width: 200px"><span class="fa fa-reply"></span> Voltar</button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="createRepeticao" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
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
 					<button type="submit" name="acao" value="createRepeticao" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
 				</div>
 				<div class="form-group col-sm-4"></div>
 			</div>


 			<div class="row">
 				<div class="form-group col-sm-4"></div>
 			</div>
 			<div class="row">
 				<div class="form-group col-sm-1">
 					<a href="lista-germinacao.php?idamostra=<?php echo $idamostra ?>"><button type="button" class="btn btn-basic" style="color: green; min-width: 90px"><i class="fa fa-reply"></i></button></a>
 				</div>
 			</div>


 		</form>


 	</fieldset>



 </div>

 <?php 
 require_once 'footer.php';
 ?>