<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();
$tbrepeticao =  new Crud();

$tbrepeticao->select("SELECT amostraFK, num_cadinho, peso_cadinho, peso_umido, peso_seco, umidade, umidade_media FROM  teor_agua, pesagem_teor_agua WHERE  amostraFK=$idamostra and idteor_agua=teor_aguaFK");


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
	$obs = $amostra['obs_teor_agua'];
}
?>


<div class="container">
	<fieldset> 
		<legend align="center" style="width:70%;"><h3><a href="informacao-amostra.php?idamostra=<?php echo $idamostra; ?>"><i class="fa fa-chevron-left"></i></a> Teste Teor de Água</h3></legend>
		<br>

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
		<div  class="row">

			<div class="col-sm-2"></div>
			<div class="form-group col-sm-4">
				<label for="dataAnalise">Data Análise:</label>
				<input type="date" class="form-control" name="dataAnalise" id="dataAnalise" value="<?php echo $dtanalise?>" readonly="">
			</div>

			<div class="form-group col-sm-4">	     		   
				<label for="analista">Analista:</label>
				<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>" readonly="">
			</div>

			<div class="col-sm-2"></div>
		</div>

		<div class="row">
			<div class="col-sm-2"></div>
			<div class="form-group col-sm-8">
				<label for="obsteoragua">Observação</label>
				<textarea  class="form-control" rows="3" name="obsteoragua" id="obsteoragua" value="<?php echo $obs?>" readonly=""></textarea>
			</div>
			<div class="col-sm-2"></div>
		</div>


		<hr>

		<div class="row">		

			<div class="col-sm-2"></div>	
			<div class="col-sm-2">
				<a href="cadastro-analise-teoragua.php?idamostra=<?php echo $idamostra; ?>">
					<button class="btn btn-success btn-md"><span class="fa fa-plus-square"></span> Adicionar Análise </button>
				</a>
			</div>
			<div class="col-sm-2"></div>
			
			<div class="col-sm-4">
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" id="myInput" onkeyup="BuscaLista()" placeholder="Buscar">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-2"></div>
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
							<th scope="col">Umidade Média (%)</th>
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
									<td><?php echo $tbrepeticao['umidade_media']; ?></td>
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
</fieldset>

</div>
<?php
require_once 'footer.php';

?>

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