<?php 

require_once 'header.php';
require 'crud.php';

$idamostra = $_GET['idamostra'];
$idgerminacao = 0; 
$amostra = new Crud();
$tbrepeticao =  new Crud();
$tbresultado = new Crud();
$tbresultadopg = new Crud();
$tbresultadovg = new Crud();
$tbresultadopn = new Crud();
$tbresultadopa = new Crud();
$tbresultadosd = new Crud();
$tbresultadosdo = new Crud();
$tbresultadosm = new Crud();


$tbrepeticao->select("SELECT idchecagem, ndias_semeadura as 'dias', data, 
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

$tbresultado->select("SELECT distinct germinacaoFK FROM germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");
if ($tbresultado->numRows() > 0) {
	foreach ($tbresultado->result() as $tbresultado ){ 
		$idgerminacao = $tbresultado['germinacaoFK'];
	}
}

$tbresultadopg->select("SELECT 
	sum(if (descrepeticao = 'R1', porcent_germinacao, 0) ) as R1,
	sum(if (descrepeticao = 'R2', porcent_germinacao, 0) ) as R2,
	sum(if (descrepeticao = 'R3', porcent_germinacao, 0) ) as R3,
	sum(if (descrepeticao = 'R4', porcent_germinacao, 0) ) as R4,
	sum(if (descrepeticao = 'R5', porcent_germinacao, 0) ) as R5,
	sum(if (descrepeticao = 'R6', porcent_germinacao, 0) ) as R6,
	sum(if (descrepeticao = 'R7', porcent_germinacao, 0) ) as R7,
	sum(if (descrepeticao = 'R8', porcent_germinacao, 0) ) as R8,
	sum(porcent_germinacao) as 'Total'
	FROM  germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");

$tbresultadovg->select("SELECT  
	sum(if (descrepeticao = 'R1', velocidade_germinacao, 0) ) as R1,
	sum(if (descrepeticao = 'R2', velocidade_germinacao, 0) ) as R2,
	sum(if (descrepeticao = 'R3', velocidade_germinacao, 0) ) as R3,
	sum(if (descrepeticao = 'R4', velocidade_germinacao, 0) ) as R4,
	sum(if (descrepeticao = 'R5', velocidade_germinacao, 0) ) as R5,
	sum(if (descrepeticao = 'R6', velocidade_germinacao, 0) ) as R6,
	sum(if (descrepeticao = 'R7', velocidade_germinacao, 0) ) as R7,
	sum(if (descrepeticao = 'R8', velocidade_germinacao, 0) ) as R8,
	sum(velocidade_germinacao) as 'Total'
	FROM  germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");

$tbresultadopn->select("SELECT  
	sum(if (descrepeticao = 'R1', plantulas_normais, 0) ) as R1,
	sum(if (descrepeticao = 'R2', plantulas_normais, 0) ) as R2,
	sum(if (descrepeticao = 'R3', plantulas_normais, 0) ) as R3,
	sum(if (descrepeticao = 'R4', plantulas_normais, 0) ) as R4,
	sum(if (descrepeticao = 'R5', plantulas_normais, 0) ) as R5,
	sum(if (descrepeticao = 'R6', plantulas_normais, 0) ) as R6,
	sum(if (descrepeticao = 'R7', plantulas_normais, 0) ) as R7,
	sum(if (descrepeticao = 'R8', plantulas_normais, 0) ) as R8,
	sum(plantulas_normais) as 'Total'
	FROM  germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");

$tbresultadopa->select("SELECT  
	sum(if (descrepeticao = 'R1', plantulas_anormais, 0) ) as R1,
	sum(if (descrepeticao = 'R2', plantulas_anormais, 0) ) as R2,
	sum(if (descrepeticao = 'R3', plantulas_anormais, 0) ) as R3,
	sum(if (descrepeticao = 'R4', plantulas_anormais, 0) ) as R4,
	sum(if (descrepeticao = 'R5', plantulas_anormais, 0) ) as R5,
	sum(if (descrepeticao = 'R6', plantulas_anormais, 0) ) as R6,
	sum(if (descrepeticao = 'R7', plantulas_anormais, 0) ) as R7,
	sum(if (descrepeticao = 'R8', plantulas_anormais, 0) ) as R8,
	sum(plantulas_anormais) as 'Total'
	FROM  germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");


$tbresultadosd->select("SELECT  
	sum(if (descrepeticao = 'R1', sementes_duras, 0) ) as R1,
	sum(if (descrepeticao = 'R2', sementes_duras, 0) ) as R2,
	sum(if (descrepeticao = 'R3', sementes_duras, 0) ) as R3,
	sum(if (descrepeticao = 'R4', sementes_duras, 0) ) as R4,
	sum(if (descrepeticao = 'R5', sementes_duras, 0) ) as R5,
	sum(if (descrepeticao = 'R6', sementes_duras, 0) ) as R6,
	sum(if (descrepeticao = 'R7', sementes_duras, 0) ) as R7,
	sum(if (descrepeticao = 'R8', sementes_duras, 0) ) as R8,
	sum(sementes_duras) as 'Total'
	FROM  germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");

$tbresultadosdo->select("SELECT  
	sum(if (descrepeticao = 'R1', semenstes_dormentes, 0) ) as R1,
	sum(if (descrepeticao = 'R2', semenstes_dormentes, 0) ) as R2,
	sum(if (descrepeticao = 'R3', semenstes_dormentes, 0) ) as R3,
	sum(if (descrepeticao = 'R4', semenstes_dormentes, 0) ) as R4,
	sum(if (descrepeticao = 'R5', semenstes_dormentes, 0) ) as R5,
	sum(if (descrepeticao = 'R6', semenstes_dormentes, 0) ) as R6,
	sum(if (descrepeticao = 'R7', semenstes_dormentes, 0) ) as R7,
	sum(if (descrepeticao = 'R8', semenstes_dormentes, 0) ) as R8,
	sum(semenstes_dormentes) as 'Total'
	FROM  germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");

$tbresultadosm->select("SELECT  
	sum(if (descrepeticao = 'R1', sementes_mortas, 0) ) as R1,
	sum(if (descrepeticao = 'R2', sementes_mortas, 0) ) as R2,
	sum(if (descrepeticao = 'R3', sementes_mortas, 0) ) as R3,
	sum(if (descrepeticao = 'R4', sementes_mortas, 0) ) as R4,
	sum(if (descrepeticao = 'R5', sementes_mortas, 0) ) as R5,
	sum(if (descrepeticao = 'R6', sementes_mortas, 0) ) as R6,
	sum(if (descrepeticao = 'R7', sementes_mortas, 0) ) as R7,
	sum(if (descrepeticao = 'R8', sementes_mortas, 0) ) as R8,
	sum(sementes_mortas) as 'Total'
	FROM  germ_resultado, germinacao WHERE amostraFK=$idamostra AND idgerminacao=germinacaoFK;");

$amostra->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar, nome_cientifico, familia,  data_implantacao, datasemeadura, analista, temperatura, substrato, numsementes_repeticao, numrepeticoes, peso_amostra_germinacao, tratamento, obs_germinacao FROM amostra, lote, especie, germinacao WHERE idamostra=$idamostra and loteFK=idlote_sementes and especieFK=id_especie and amostraFK=idamostra ");

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
	$obsgerminacao = $amostra['obs_germinacao'];
}
?>

<script type="text/javascript">
	$(function(){
		$(".btn-modal-ex-repeticao").click(function(){

			var id   = this.id;
			$.post("carrega-modal-repeticao-exclusao.php",{id:id},
				function(response){
					$("#modalrep-php").html(response);
				});
		})
	});

	$(function(){
		$(".btn-modal-ex-resultado").click(function(){

			var id   = this.id;
			console.log(id);
			$.post("carrega-modal-resultado-exclusao.php",{id:id},
				function(response){
					$("#modalresult-php").html(response);
				});
		})
	});
</script>

<br>
<div class="container">
	<fieldset style="padding: 10px"> 
		<legend align="center" style="width:70%;"><h3> Editar Teste da Germinação</h3></legend>
		<br>
		<form name="formEditarGerminacao" id="formEditarGerminacao" method="POST" action="crud-amostra.php">
			
			<div class="row">
				<div class="col-sm-2">
					<label for="codamostra">Nº Amostra:</label>
					<input type="text" class="form-control" name="codamostra" id="codamostra" value="<?php echo $idamostra?>" readonly="">
				</div>	

				<div class="form-group col-sm-2">
					<label for="loteOrigem">Nº Lote:</label>
					<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" value="<?php echo $idlote?>" readonly="">
				</div>	
				<div class="form-group col-sm-2">
					<label for="especie">Espécie:</label>
					<input type="text" class="form-control" name="especie" id="especie" value="<?php echo $nomevulgar?>" readonly="">
				</div>

				<div class="form-group col-sm-3">
					<label for="dataSemeadura">Data da Semeadura:</label>
					<input type="date" class="form-control" name="dataSemeadura" id="dataSemeadura" value="<?php echo $datasemeadura?>" >
				</div>

				<div class="form-group col-sm-3">	     		   
					<label for="analista">Analista:</label>
					<input type="text" class="form-control" name="analista" id="analista" value="<?php echo $analista?>" >
				</div>
			</div>

			<div class="row">
				<div class="form-group col-sm-2">
					<label for="temperatura">Temperatura (C°):</label>
					<input type="number" class="form-control" name="temperatura" id="temperatura"  value="<?php echo $temperatura?>" >
				</div>
				<div class="form-group col-sm-2">	     		   
					<label for="substrato">Substrato:</label>
					<input type="text" name ="substrato" id="subtrato" class="form-control" for="substrato" value="<?php echo $substrato?>" >
				</div>				
				<div class="form-group col-sm-2">	     		   
					<label for="sementesRepeticao">N. Sementes/Repetição:</label>
					<input type="text" class="form-control" name="sementesRepeticao" id="sementesRepeticao" value="<?php echo $nsemrep?>">
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="repeticoes">N. Repetições:</label>
					<input type="text" class="form-control" name="repeticoes" id="repeticoes" required="" value="<?php echo $nrepeticoes?>">
				</div>

				<div class="form-group col-sm-2">	     		   
					<label for="tratamento">Tratamento:</label>
					<input type="text" class="form-control" name="tratamento" id="tratamento" value="<?php echo $tratamento?>">
				</div>

				<div class="form-group col-sm-2 ">
					<label for="pesoamostra"> Peso Amostra (Kg): </label>
					<input type="text" class="form-control" name="pesoamostra" id="pesoamostra" value="<?php echo $pesoamostra?>">
				</div> 

			</div>

			<hr>

			<div class="row">			
				<div class="col-sm-2">
					<a href="editar-cadastro-repeticao.php?idamostra=<?php echo $idamostra; ?>">
						<button type="button" class="btn btn-success btn-md"><span class="fa fa-plus-square"></span> Adicionar Repeticao </button>
					</a>
				</div>
				<div class="col-sm-2">
					<a href="editar-cadastro-resultado.php?idamostra=<?php echo $idamostra; ?>">
						<button type="button" class="btn btn-warning btn-md"><span class="fa fa-plus-square"></span> Adicionar Resultado </button>
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
								<th scope="col">---</th>
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
										<td><buton class="btn-modal-ex-repeticao" title="Remover" id="<?php echo $tbrepeticao['idchecagem']; ?>" data-toggle="modal" data-target="#myModalExclusaoRep"><i class="fa fa-minus-circle" style="color:red"></i></button></td>
									</tr>

									<?php
								}
							} 
							?>  
						</tbody>
					</table>
				</div>
			</div>

			<br>

			<div class="row">
				<div class="col-sm-12">
					<table class="table table-hover" id="tabela">
						<thead>
							<tr>
								<th scope="col">RESULTADO</th>
								<th scope="col">R1</th>
								<th scope="col">R2</th>
								<th scope="col">R3</th>
								<th scope="col">R4</th>
								<th scope="col">R5</th>
								<th scope="col">R6</th>
								<th scope="col">R7</th>
								<th scope="col">R8</th>
								<th scope="col">TOTAL</th>
								<th scope="col"><buton class="btn-modal-ex-resultado" title="Limpar Tabela" id="<?php echo $idgerminacao ?>" data-toggle="modal" data-target="#myModalExclusaoResultado"><i class="fa fa-times-circle" style="color:red"></i></button></th>
							</tr>
						</thead>
						<tbody>

							<?php 
							if ($tbresultadopg->numRows() > 0) {
								foreach ($tbresultadopg->result() as $tbresultadopg ){ ?>
									<tr>
										<td>% Germinação</td>
										<td><?php echo $tbresultadopg['R1']; ?></td>
										<td><?php echo $tbresultadopg['R2']; ?></td>
										<td><?php echo $tbresultadopg['R3']; ?></td>
										<td><?php echo $tbresultadopg['R4']; ?></td>
										<td><?php echo $tbresultadopg['R5']; ?></td>
										<td><?php echo $tbresultadopg['R6']; ?></td>
										<td><?php echo $tbresultadopg['R7']; ?></td>
										<td><?php echo $tbresultadopg['R8']; ?></td>
										<td><?php echo $tbresultadopg['Total']; ?></td>
									</tr>

									<?php
								}
							} 
							?>  

							<?php 
							if ($tbresultadovg->numRows() > 0) {
								foreach ($tbresultadovg->result() as $tbresultadovg ){ ?>
									<tr>
										<td>Velocidade de germinação</td>
										<td><?php echo $tbresultadovg['R1']; ?></td>
										<td><?php echo $tbresultadovg['R2']; ?></td>
										<td><?php echo $tbresultadovg['R3']; ?></td>
										<td><?php echo $tbresultadovg['R4']; ?></td>
										<td><?php echo $tbresultadovg['R5']; ?></td>
										<td><?php echo $tbresultadovg['R6']; ?></td>
										<td><?php echo $tbresultadovg['R7']; ?></td>
										<td><?php echo $tbresultadovg['R8']; ?></td>
										<td><?php echo $tbresultadovg['Total']; ?></td>
									</tr>

									<?php
								}
							} 
							?>  

							<?php 
							if ($tbresultadopn->numRows() > 0) {
								foreach ($tbresultadopn->result() as $tbresultadopn ){ ?>
									<tr>
										<td>% Plântulas Normais</td>
										<td><?php echo $tbresultadopn['R1']; ?></td>
										<td><?php echo $tbresultadopn['R2']; ?></td>
										<td><?php echo $tbresultadopn['R3']; ?></td>
										<td><?php echo $tbresultadopn['R4']; ?></td>
										<td><?php echo $tbresultadopn['R5']; ?></td>
										<td><?php echo $tbresultadopn['R6']; ?></td>
										<td><?php echo $tbresultadopn['R7']; ?></td>
										<td><?php echo $tbresultadopn['R8']; ?></td>
										<td><?php echo $tbresultadopn['Total']; ?></td>
									</tr>

									<?php
								}
							} 
							?>

							<?php 
							if ($tbresultadopa->numRows() > 0) {
								foreach ($tbresultadopa->result() as $tbresultadopa ){ ?>
									<tr>
										<td>% Plântulas Anormais</td>
										<td><?php echo $tbresultadopa['R1']; ?></td>
										<td><?php echo $tbresultadopa['R2']; ?></td>
										<td><?php echo $tbresultadopa['R3']; ?></td>
										<td><?php echo $tbresultadopa['R4']; ?></td>
										<td><?php echo $tbresultadopa['R5']; ?></td>
										<td><?php echo $tbresultadopa['R6']; ?></td>
										<td><?php echo $tbresultadopa['R7']; ?></td>
										<td><?php echo $tbresultadopa['R8']; ?></td>
										<td><?php echo $tbresultadopa['Total']; ?></td>
									</tr>

									<?php
								}
							} 
							?>		

							<?php 
							if ($tbresultadosd->numRows() > 0) {
								foreach ($tbresultadosd->result() as $tbresultadosd ){ ?>
									<tr>
										<td>% Sementes Duras</td>
										<td><?php echo $tbresultadosd['R1']; ?></td>
										<td><?php echo $tbresultadosd['R2']; ?></td>
										<td><?php echo $tbresultadosd['R3']; ?></td>
										<td><?php echo $tbresultadosd['R4']; ?></td>
										<td><?php echo $tbresultadosd['R5']; ?></td>
										<td><?php echo $tbresultadosd['R6']; ?></td>
										<td><?php echo $tbresultadosd['R7']; ?></td>
										<td><?php echo $tbresultadosd['R8']; ?></td>
										<td><?php echo $tbresultadosd['Total']; ?></td>
									</tr>

									<?php
								}
							} 
							?>		

							<?php 
							if ($tbresultadosdo->numRows() > 0) {
								foreach ($tbresultadosdo->result() as $tbresultadosdo ){ ?>
									<tr>
										<td>% Sementes Dormentes</td>
										<td><?php echo $tbresultadosdo['R1']; ?></td>
										<td><?php echo $tbresultadosdo['R2']; ?></td>
										<td><?php echo $tbresultadosdo['R3']; ?></td>
										<td><?php echo $tbresultadosdo['R4']; ?></td>
										<td><?php echo $tbresultadosdo['R5']; ?></td>
										<td><?php echo $tbresultadosdo['R6']; ?></td>
										<td><?php echo $tbresultadosdo['R7']; ?></td>
										<td><?php echo $tbresultadosdo['R8']; ?></td>
										<td><?php echo $tbresultadosdo['Total']; ?></td>
									</tr>

									<?php
								}
							} 
							?>	

							<?php 
							if ($tbresultadosm->numRows() > 0) {
								foreach ($tbresultadosm->result() as $tbresultadosm ){ ?>
									<tr>
										<td>% Sementes Mortas</td>
										<td><?php echo $tbresultadosm['R1']; ?></td>
										<td><?php echo $tbresultadosm['R2']; ?></td>
										<td><?php echo $tbresultadosm['R3']; ?></td>
										<td><?php echo $tbresultadosm['R4']; ?></td>
										<td><?php echo $tbresultadosm['R5']; ?></td>
										<td><?php echo $tbresultadosm['R6']; ?></td>
										<td><?php echo $tbresultadosm['R7']; ?></td>
										<td><?php echo $tbresultadosm['R8']; ?></td>
										<td><?php echo $tbresultadosm['Total']; ?></td>
									</tr>

									<?php
								}
							} 
							?>					
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="form-group col-sm-12">
					<label for="obsgerminacao">Observação</label>
					<textarea  class="form-control" rows="3" name="obsgerminacao" id="obsgerminacao"><?php echo $obsgerminacao?></textarea>
				</div>
			</div>

			<div class="row" style="padding: 10px">
				<div class="form-group col-sm-1">
					<a href="editar-amostra.php?idamostra=<?php echo $idamostra; ?>"><button type="button" class="btn btn-basic" style="color: green; min-width: 100px"><i class="fa fa-reply"></i></button></a>
				</div>
				<div class="form-group col-sm-1"></div>
				<div class="form-group col-sm-1">
					<button type="submit" name="acao" value="editGerminacao" class="btn btn-success" style=" min-width: 150px">Confirmar</button>
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
<div id="myModalExclusaoRep" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Excluir Repetiçao</h4>
			</div>
			<div class="modal-body">

				<div id="modalrep-php"></div>
				

			</div>
		</div>

	</div>
</div>

<!-- Modal Exclusao-->
<div id="myModalExclusaoResultado" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Excluir Resultados</h4>
			</div>
			<div class="modal-body">

				<div id="modalresult-php"></div>
				

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