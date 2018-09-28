<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();
$tbrepeticao =  new Crud();

$tbrepeticao->select("SELECT descricao_rep, num_sementes, peso_amostra	FROM peso_mil_sementes, repeticao_mil_sementes WHERE amostraFK=$idamostra AND idpeso_mil_sementes=peso_mil_sementesFK");


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


<div class="container">
	<fieldset> 
		<legend align="center" style="width:70%;"><h3><a href="informacao-amostra.php?idamostra=<?php echo $idamostra; ?>"><i class="fa fa-chevron-left"></i></a> Peso de Mil Sementes</h3></legend>
		<br>

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

		<hr>

		<div class="row">
			<div class="col-sm-2"></div>			
			<div class="col-sm-2">
				<a href="cadastro-repeticao-mil-sementes.php?idamostra=<?php echo $idamostra; ?>">
					<button class="btn btn-success btn-md"><span class="fa fa-plus-square"></span> Adicionar Repeticao </button>
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
		</div>
		<br>
		<div class="row">

			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table class="table table-hover" id="tabela" >
					<thead >
						<tr>
							<th scope="col">Repetição</th>
							<th scope="col">N. Sementes</th>
							<th scope="col">Peso Amostra</th>
						</tr>
					</thead>
					<tbody >
						<?php 
						if ($tbrepeticao->numRows() > 0) {
							foreach ($tbrepeticao->result() as $tbrepeticao ){ ?>
								<tr>
									<td><?php echo $tbrepeticao['descricao_rep']; ?></td>
									<td><?php echo $tbrepeticao['num_sementes']; ?></td>
									<td><?php echo $tbrepeticao['peso_amostra']; ?></td>
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