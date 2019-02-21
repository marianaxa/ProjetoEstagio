<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();
$tbrepeticao =  new Crud();

$tbrepeticao->select("SELECT idrepeticao_mil_sementes, descricao_rep, peso_amostra_rep FROM peso_mil_sementes, repeticao_mil_sementes WHERE amostraFK=$idamostra AND idpeso_mil_sementes=peso_mil_sementesFK");


$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, data_ensaio, analista_mil_sementes, peso_medio, desvio_padrao, variancia, coeficiente_variacao, kg_mil_sementes, kg_num_medio, peso_amostra, obs_peso_mil_sementes FROM amostra, lote, especie, peso_mil_sementes WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$dataensaio = $amostra['data_ensaio'];
	$analista = $amostra['analista_mil_sementes'];
	$pesomedio = $amostra['peso_medio'];
	$desviopadrao = $amostra['desvio_padrao'];
	$variancia = $amostra['variancia'];
	$coeficientevariacao = $amostra['coeficiente_variacao'];
	$kgmilsementes = $amostra['kg_mil_sementes'];
	$kgnummedio = $amostra['kg_num_medio'];
	$pesoamostra = $amostra['peso_amostra'];
	$obsmilsementes = $amostra['obs_peso_mil_sementes'];
}
?>

<script type="text/javascript">
	$(function(){
		$(".btn-modal-ex-ps").click(function(){

			var id   = this.id;
			$.post("carrega-modal-pesomil-exclusao.php",{id:id},
				function(response){
					$("#modalps-php").html(response);
				});
		})
	});
</script>

<br>
<div style="padding: 30px">
	<fieldset style="padding: 10px"> 
		<legend align="center" style="width:70%;">Peso de Mil Sementes + Número Sementes/Kg</legend>
		<br>
		<form name="formEditarPesoMilSementes" id="formEditarPesoMilSementes" method="POST" action="crud-amostra.php">
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
				<div class="form-group col-sm-3">
					<label for="dataEnsaioMilSementes">Data Ensaio:</label>
					<input type="date" class="form-control" name="dataEnsaioMilSementes" id="dataEnsaioMilSementes " value="<?php echo $dataensaio?>" >
				</div>

				<div class="form-group col-sm-3">	     		   
					<label for="analistaMilSementes">Analista:</label>
					<input type="text" class="form-control" name="analistaMilSementes" id="analistaMilSementes" value="<?php echo $analista?>" >
				</div>

				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="pesoamostrams"> Peso da Amostra (g): </label>
						<input type="text" class="form-control" name="pesoamostrams" id="pesoamostrams" value="<?php echo $pesoamostra?>" >
					</div>
				</div>
				<div class="form-group col-sm-2"></div>
			</div>
			<hr>

			<div class="row">		

				<div class="col-sm-2"></div>	
				<div class="col-sm-2">
					<a href="editar-repeticao-mil-sementes.php?idamostra=<?php echo $idamostra; ?>">
						<button  type="button" class="btn btn-success btn-md"><span class="fa fa-plus-square"></span> Adicionar Repetição </button>
					</a>
				</div>
				<div class="col-sm-8"></div>
			</div>
			<br>
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<table class="table table-hover" id="tabela" >
						<thead >
							<tr>
								<th scope="col">Repetição</th>
								<th scope="col">Peso Amostra</th>
								<th scope="col">---</th> 
							</tr>
						</thead>
						<tbody >
							<?php 
							if ($tbrepeticao->numRows() > 0) {
								foreach ($tbrepeticao->result() as $tbrepeticao ){ ?>
									<tr>
										<td><?php echo $tbrepeticao['descricao_rep']; ?></td>
										<td><?php echo $tbrepeticao['peso_amostra_rep']; ?></td>
										<td><buton class="btn-modal-ex-ps" title="Remover" id="<?php echo $tbrepeticao['idrepeticao_mil_sementes']; ?>" data-toggle="modal" data-target="#myModalExclusao"><i class="fa fa-minus-circle" style="color:red"></i></button>
													
										</td>
									</tr>

									<?php
								}
							} 
							?>  
						</tbody>
					</table>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<br>

			<div class="row">
				<div class="form-group col-sm-2"></div>

				<div class="form-group col-sm-3">
					<label for="xpesosmenetes">X Peso médio de 100 sementes:</label>
					<input type="text" class="form-control" name="xpesosmenetes" id="xpesosmenetes" maxlength="5"  value="<?php echo $pesomedio?>" >
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="desviopadrao">Desvio-padrão:</label>
					<input type="text" class="form-control" name="desviopadrao"  maxlength="5" id="desviopadrao"   value="<?php echo $desviopadrao?>" >
				</div>			

				<div class="form-group col-sm-1">
					<label for="variancia">Variância:</label>
					<input type="text" class="form-control" name="variancia" id="variancia" maxlength="5"  value="<?php echo $variancia?>" >
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="coef_variacao">Coeficiente de variação:</label>
					<input type="text" class="form-control" name="coef_variacao"  maxlength="5" id="coef_variacao"   value="<?php echo $coeficientevariacao?>" >
				</div>			
				<div class="form-group col-sm-2"></div>

			</div>

			<div class="row">
				<div class="form-group col-sm-2"></div>

				<div class="form-group col-sm-4">
					<label for="pesoMilSementes">Peso de Mil Sementes:</label>
					<input type="text" class="form-control" name="pesoMilSementes" id="pesoMilSementes" value="<?php echo $kgmilsementes?>" >
				</div>

				<div class="form-group col-sm-4">	     		   
					<label for="numMedioSementes">Número Médio de Sementes:</label>
					<input type="text" class="form-control" name="numMedioSementes" id="numMedioSementes" value="<?php echo $kgnummedio?>" >
				</div>			

				<div class="form-group col-sm-2"></div>
			</div>

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsMilSementes">Observação</label>
					<textarea  class="form-control" rows="3" name="obsMilSementes" id="obsMilSementes" ><?php echo $obsmilsementes?></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row" style="padding: 10px">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-1">
					<a href="editar-amostra.php?idamostra=<?php echo $idamostra; ?>"><button type="button" class="btn btn-basic" style="color: green; min-width: 100px"><i class="fa fa-reply"></i></button></a>
				</div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="editPesoMilSementes" class="btn btn-success" style=" min-width: 150px">Confirmar</button>
				</div>
				<div class="form-group col-sm-1"></div>
			</div>
		</form>
	</fieldset>

</div>
<?php
require_once 'footer.php';
?>

<!-- Modal Exclusao-->
<div id="myModalExclusao" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Excluir Repetiçao</h4>
			</div>
			<div class="modal-body">

				<div id="modalps-php"></div>
				

			</div>
		</div>

	</div>
</div>