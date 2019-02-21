<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();
$tbrepeticao =  new Crud();

$tbrepeticao->select("SELECT amostraFK, idpesagem_teor_agua, num_cadinho, peso_cadinho, peso_umido, peso_seco, umidade, umidade_media FROM  teor_agua, pesagem_teor_agua WHERE  amostraFK=$idamostra and idteor_agua=teor_aguaFK");


$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, data_teor_agua, analista_teor_agua, peso_amostra_umi, umidade_media, obs_teor_agua FROM amostra, lote, especie, teor_agua WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

foreach ($amostra->result() as $amostra ){
	$idlote = $amostra['idlote_sementes'];
	$dtchegada = $amostra['data_chegada'];
	$categoria = $amostra['categoria'];
	$nomevulgar= $amostra['nome_vulgar'];
	$nomecientifico = $amostra['nome_cientifico'];
	$familia = $amostra['familia'];
	$dtanalise = $amostra['data_teor_agua'];
	$analista = $amostra['analista_teor_agua'];
	$pesoamostra = $amostra['peso_amostra_umi'];
	$umidademedia = $amostra['umidade_media'];
	$obs = $amostra['obs_teor_agua'];
}
?>

<script type="text/javascript">
	$(function(){
		$(".btn-modal-ex").click(function(){

			var id   = this.id;
			$.post("carrega-modal-pesagem-exclusao.php",{id:id},
				function(response){
					$("#modalpe-php").html(response);
				});
		})
	});
</script>

<div style="padding: 30px">
	<fieldset  style="padding: 10px">
		<legend align="center" style="width:70%;"><h3>Editar Grau de Umidade</h3></legend>
		<form  name="formEditarTeorAgua" id="formEditarTeorAgua" method="POST" action="crud-amostra.php">

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
			<div  class="row">

				<div class="col-sm-2"></div>
				<div class="form-group col-sm-3">
					<label for="dataAnalise">Data do Ensaio:</label>
					<input type="date" class="form-control" name="dataAnalise" id="dataAnalise" value="<?php echo $dtanalise?>">
				</div>

				<div class="form-group col-sm-3">	     		   
					<label for="analista">Analista:</label>
					<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>">
				</div>

				<div class="form-group col-sm-2 ">
					<label for="pesoamostraumidade"> Peso Amostra (g): </label>
					<input type="text" class="form-control" name="pesoamostraumidade" id="pesoamostraumidade"  value="<?php echo $pesoamostra?>"  maxlength="5" >
				</div>

				<div class="col-sm-2"></div>
			</div>

			<hr>

			<div class="row" style="padding: 10px">		

				<div class="col-sm-2"></div>	
				<div class="col-sm-2" >
					<a href="editar-analise-teoragua.php?idamostra=<?php echo $idamostra; ?>">
						<button  type="button" class="btn btn-success btn-md"><span class="fa fa-plus-square"></span> Adicionar Análise </button>
					</a>
				</div>
				<div class="col-sm-8"></div>
			</div>


			<br>
			<div class="row">

				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<table class="table table-hover" id="tabela">
						<thead>
							<tr>
								<th scope="col">N. Cadinho</th>
								<th scope="col">Peso do Cadinho</th>
								<th scope="col">Peso Úmido</th>
								<th scope="col">Peso Seco</th>
								<th scope="col">Umidade (%)</th>
								<th scope="col">---</th> 
							</tr>
						</thead>
						<tbody>
							<?php 
							if ($tbrepeticao->numRows() > 0) {
								foreach ($tbrepeticao->result() as $tbrepeticao ){ ?>
									<tr>
										<td><?php echo $tbrepeticao['num_cadinho']; ?></td>
										<td><?php echo $tbrepeticao['peso_cadinho']; ?></td>
										<td><?php echo $tbrepeticao['peso_umido']; ?></td>
										<td><?php echo $tbrepeticao['peso_seco']; ?></td>
										<td><?php echo $tbrepeticao['umidade']; ?></td>
										<!--	<td><?php echo $tbrepeticao['umidade_media']; ?></td> -->
										<td><buton class="btn-modal-ex" title="Remover" id="<?php echo $tbrepeticao['idpesagem_teor_agua']; ?>" data-toggle="modal" data-target="#myModalExclusao"><i class="fa fa-minus-circle" style="color:red"></i></button>
													
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

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="umidademedia">Umidade Média</label>
					<input type="text" class="form-control" name="umidademedia" id="umidademedia" value="<?php echo $umidademedia?>">
				</div>
				<div class="col-sm-2"></div>
			</div>		

			<div class="row">
				<div class="col-sm-2"></div>
				<div class="form-group col-sm-8">
					<label for="obsteoragua">Observação</label>
					<textarea  class="form-control" rows="3" name="obsteoragua" id="obsteoragua"><?php echo $obs?></textarea>
				</div>
				<div class="col-sm-2"></div>
			</div>

			<div class="row" style="padding: 10px">
				<div class="form-group col-sm-2"></div>
				<div class="form-group col-sm-1">
					<a href="editar-amostra.php?idamostra=<?php echo $idamostra; ?>"><button type="button" class="btn btn-basic" style="color: green; min-width: 100px"><span class="fa fa-reply"></span></button></a>
				</div>				
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="editTeorAgua" class="btn btn-success" style=" min-width: 150px">Confirmar</button>
				</div>
				<div class="form-group col-sm-4"></div>
			</div>

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
				<h4 class="modal-title">Excluir Linha</h4>
			</div>
			<div class="modal-body">

				<div id="modalpe-php"></div>
				

			</div>
		</div>

	</div>
</div>

	<script>
		$('#tabela').find('button[name=view]').click(function(){

			var categoria = this.value;
			var id= this.id;
			if(categoria == "fornecido"){
				window.location="ver-lote-recebido.php?idlote="+id;
			}else{
				window.location="cadastro-lote-colhido.php?idcol="+id;
			}
		});

		$('#tabela').find('button[name=edit]').click(function(){

			var categoria = this.value;
			var id= this.id;
			if(categoria == "fornecido"){
				window.location="editar-lote-recebido.php?idlote="+id;
			}else{
				window.location="#"+id;
			}
		});



		function BuscaLista() {
			var input, filter, table, tr, td, i;
			input = document.getElementById("myInput");
			filter = input.value.toUpperCase();
			table = document.getElementById("tabela");
			tr = table.getElementsByTagName("tr");
			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[0];
				if (td) {
					if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
						tr[i].style.display = "";
					} else {
						tr[i].style.display = "none";
					}
				}       
			}
		}




	</script>