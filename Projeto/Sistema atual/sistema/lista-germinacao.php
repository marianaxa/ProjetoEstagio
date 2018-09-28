<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$amostra = new Crud();
$tbrepeticao =  new Crud();

$tbrepeticao->select("SELECT datediff(data,datasemeadura) as 'dias', data, 
	sum(if (descricaorep = 'R1', qtdgerminada, 0) ) as R1,
	sum(if (descricaorep = 'R2', qtdgerminada, 0) ) as R2,
	sum(if (descricaorep = 'R3', qtdgerminada, 0) ) as R3,
	sum(if (descricaorep = 'R4', qtdgerminada, 0) ) as R4,
	sum(if (descricaorep = 'R5', qtdgerminada, 0) ) as R5,
	sum(if (descricaorep = 'R6', qtdgerminada, 0) ) as R6,
	sum(if (descricaorep = 'R7', qtdgerminada, 0) ) as R7,
	sum(if (descricaorep = 'R8', qtdgerminada, 0) ) as R8,
	sum(qtdgerminada) as 'Total'
	FROM checagem, repeticao, germinacao WHERE amostraFK=$idamostra AND idchecagem=checagemFK AND idgerminacao=germinacaoFK
	GROUP BY data");


$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, datasemeadura, analista, temperatura, substrato, numsementes_repeticao, tratamento, 
	totalplantulas, plantulasanormais, sementesfirmes, sementesmortas, sementeschocas FROM amostra, lote, especie, germinacao WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

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
	$tratamento = $amostra['tratamento'];
	$plannormais = $amostra['totalplantulas'];
	$plananormais = $amostra['plantulasanormais'];
	$semfirmes = $amostra['sementesfirmes'];
	$semmortas = $amostra['sementesmortas'];
	$semchocas = $amostra['sementeschocas'];
}
?>


<div class="container">
	<fieldset> 
		<legend align="center" style="width:70%;"><h3> Teste da Germinação</h3></legend>
		<br>

		<div class="row">
			<div class="col-sm-2">
				<label for="codamostra">Código Análise:</label>
				<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly="">
			</div>	

			<div class="form-group col-sm-2">
				<label for="loteOrigem">Lote de Origem:</label>
				<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" value="<?php echo $idlote?>" readonly="">
			</div>	
			<div class="form-group col-sm-2">
				<label for="especie">Espécie:</label>
				<input type="text" class="form-control" name="especie" id="especie" value="<?php echo $nomevulgar?>" readonly="">
			</div>
			
			<div class="form-group col-sm-2">
				<label for="dataSemeadura">Data Semeadura:</label>
				<input type="date" class="form-control" name="dataSemeadura" id="dataSemeadura" value="<?php echo $datasemeadura?>" readonly="">
			</div>

			<div class="form-group col-sm-4">	     		   
				<label for="analista">Analista:</label>
				<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>" readonly="">
			</div>
		</div>

		<div class="row">
			<div class="form-group col-sm-2">
				<label for="tempetatura">Temperatura (C°):</label>
				<input type="number" class="form-control" name="tempetatura" id="tempetatura"  value="<?php echo $temperatura?>" readonly="">
			</div>
			<div class="form-group col-sm-3">	     		   
				<label for="substrato">Substrato:</label>
				<input type="text" name ="substrato" id="subtrato" class="form-control" for="substrato" value="<?php echo $substrato?>" readonly="">
			</div>				
			<div class="form-group col-sm-3">	     		   
				<label for="sementesRepeticao">N. Sementes/Repetição:</label>
				<input type="text" class="form-control" name="sementesRepeticao" id="sementesRepeticao" value="<?php echo $nsemrep?>" readonly="">
			</div>

			<div class="form-group col-sm-4">	     		   
				<label for="tratamento">Tratamento:</label>
				<input type="text" class="form-control" name="tratamento" id="tratamento" value="<?php echo $tratamento?>" readonly="">
			</div>

		</div>

		<div class="row">
			<div class="col-sm-3 ">
				<div class="form-group">
					<label for="plantulasnormais">Plântulas Normais:</label> 
					<input type="text" class="form-control" name="plantulasnormais" id="plantulasnormais" value="<?php echo $plannormais?>" readonly="" >
				</div>
			</div>
			<div class="col-sm-2 ">
				<div class="form-group">
					<label for="plantulasanormais">Plântulas Anormais:</label> 
					<input type="text" class="form-control" name="plantulasanormais" id="plantulasanormais" value="<?php echo $plananormais?>" readonly="" >
				</div>
			</div>
			<div class="col-sm-2 ">
				<div class="form-group">
					<label for="sementesduras">Sementes Duras:</label> 
					<input type="text" class="form-control" name="sementesduras" id="sementesduras" value="<?php echo $semfirmes?>" readonly="" >
				</div>
			</div>
			<div class="col-sm-2 ">
				<div class="form-group">
					<label for="sementesdormentes">Sementes Dormentes:</label> 
					<input type="text" class="form-control" name="sementesdormentes" id="sementesdormentes" value="<?php echo $semchocas?>" readonly="" >
				</div>
			</div>
			<div class="col-sm-3 ">
				<div class="form-group">
					<label for="sementesmortas">Sementes Mortas:</label> 
					<input type="text" class="form-control" name="sementesmortas" id="sementesmortas" value="<?php echo $semmortas?>" readonly="" >
				</div>
			</div>

		</div>

		<hr>

		<div class="row">			
			<div class="col-sm-2">
				<a href="cadastro-repeticao.php?idamostra=<?php echo $idamostra; ?>">
					<button class="btn btn-success btn-md"><span class="fa fa-plus-square"></span> Adicionar Repeticao </button>
				</a>
			</div>
			<div class="col-sm-2">
				<a href="cadastro-resultado.php?idamostra=<?php echo $idamostra; ?>">
					<button class="btn btn-warning btn-md"><span class="fa fa-plus-square"></span> Adicionar Resultado </button>
				</a>
			</div>
			<div class="col-sm-4"></div>
			
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
			<div class="col-sm-12">
				<table class="table table-hover" id="tabela">
					<thead>
						<tr>
							<th scope="col">N. Dias</th>
							<th scope="col">Data</th>
							<th scope="col">R1</th>
							<th scope="col">R2</th>
							<th scope="col">R3</th>
							<th scope="col">R4</th>
							<th scope="col">R5</th>
							<th scope="col">R6</th>
							<th scope="col">R7</th>
							<th scope="col">R8</th>
							<th scope="col">TOTAL</th>
						</tr>
					</thead>
					<tbody>
						
						<?php 
						if ($tbrepeticao->numRows() > 0) {
							foreach ($tbrepeticao->result() as $tbrepeticao ){ ?>
								<tr>
									<td><?php echo $tbrepeticao['dias']; ?></td>
									<th><?php echo date('d-m-Y',strtotime($tbrepeticao['data'])); ?></th>
									<td><?php echo $tbrepeticao['R1']; ?></td>
									<td><?php echo $tbrepeticao['R2']; ?></td>
									<td><?php echo $tbrepeticao['R3']; ?></td>
									<td><?php echo $tbrepeticao['R4']; ?></td>
									<td><?php echo $tbrepeticao['R5']; ?></td>
									<td><?php echo $tbrepeticao['R6']; ?></td>
									<td><?php echo $tbrepeticao['R7']; ?></td>
									<td><?php echo $tbrepeticao['R8']; ?></td>
									<td><?php echo $tbrepeticao['Total']; ?></td>
								</tr>

								<?php
							}
						} 
						?>  
					</tbody>
				</table>
			</div>
		</div>

		<div class="row" style="padding: 10px">
			<div class="form-group col-sm-1">
				<a href="informacao-amostra.php?idamostra=<?php echo $idamostra; ?>"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
			</div>
			<div class="form-group col-sm-11"></div>
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