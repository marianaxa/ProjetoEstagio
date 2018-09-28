<?php 


require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, data_teor_agua, analista_teor_agua, obs_teor_agua FROM amostra, lote, especie, teor_agua WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$dtanalise = $amostra['data_teor_agua'];
	$analista = $amostra['analista_teor_agua'];
	$obsteoragua = $amostra['obs_teor_agua'];
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
		<legend align="center" style="width:70%;">Cadastro Análise</legend>

		<form name="formCardastroAnaliseTeorAgua" id="formCardastroAnaliseTeorAgua" method="POST" action="crud-amostra">
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
					<label for="dataAnalise">Data Análise:</label>
					<input type="date" class="form-control" name="dataAnalise" id="dataAnalise" value="<?php echo $dtanalise?>" readonly="">
				</div>
				<div class="form-group col-sm-4">	     		   
					<label for="analista">Analista:</label>
					<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>"  readonly="">
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsteoragua">Observação</label>
					<textarea  class="form-control" rows="3" name="obsteoragua" id="obsteoragua" readonly=""><?php echo $obsteoragua?></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>

				<div class="col-sm-8 ">
					<table class="table table-hover" >
						<thead>
							<th scope="col">N. do Cadinho</th>
							<th scope="col">Peso do Cadinho</th>
							<th scope="col">Peso Úmido</th>
							<th scope="col">Peso Seco</th>
							<th scope="col">Umidade (%)</th>
							<th scope="col">Umidade Média (%)</th>
							<th scope="col" colspan="4">
								<a href="#" class="adicionarCampo" title="Adicionar item"><i class="fa fa-plus-circle" style="font-size:15px"></i></a>
							</th>
						</thead>
						<tr class="linhas">

							<td><input type="text" class="form-control" name="ncadinho[]" id="ncadinho"></td>
							<td><input type="text" class="form-control" name="pesocadinho[]" id="pesocadinho"></td>
							<td><input type="text" class="form-control" name="pesoumido[]" id="pesoumido"></td>
							<td><input type="text" class="form-control" name="pesoseco[]" id="pesoseco"></td>
							<td><input type="text" class="form-control" name="umidade[]" id="umidade"></td>
							<td><input type="text" class="form-control" name="umidademedia[]" id="umidademedia"></td>

							<td><a href="#" class="removerCampo" title="Remover linha"><i class="fa fa-minus-circle" style="color:red"></i></a></td>
						</tr>							
					</table>
				</div>
				<div class="col-sm-2"></div>
			</div>
			<div class="row" style="padding-top: 10px">
				<div class="form-group col-sm-4"></div>
				<div class="form-group col-sm-1">
					<a href="lista-teoragua.php?idamostra=<?php echo $idamostra ?>"><button type="button" class="btn btn-primary" style=" min-width: 200px"><span class="fa fa-mail-reply"></span> Voltar</button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="createAnaliseTeorAgua" class="btn btn-primary" style=" min-width: 200px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>
		</form>


	</fieldset>



</div>

<?php 
require_once 'footer.php';
?>