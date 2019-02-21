<?php 

$idlote = $_GET['idcol'];

//echo $idlote;

require 'crud.php';
$colheita = new Crud();
$arvores = new Crud();

$colheita->select("SELECT idlote_sementes, idcolheita, nome_vulgar, nome_cientifico, familia, data, local, colhedores, 
	observacoes_colheita FROM lote, especie, colheita WHERE idlote_sementes='$idlote'
	and lote.especieFK=id_especie AND origemFK=idcolheita ");

foreach ($colheita->result() as $colheita ){
	$idlote = $colheita['idlote_sementes'];
	$idcol = $colheita['idcolheita'];
	$especie = $colheita['nome_vulgar'];
	$nomecientifico = $colheita['nome_cientifico'];
	$familia = $colheita['familia'];
	$dataColheita= $colheita['data'];
	$localColheita = $colheita['local'];
	$colhedores = $colheita['colhedores'];
	$obs = $colheita['observacoes_colheita'];
}

$arvores->select("SELECT * FROM arvore WHERE colheitaFK = '$idcol' ");


require_once 'header.php';

?>

<div class="container">
	<?php 
	if(isset($_SESSION['msg'])){
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
	} ?> 
	<br>

	<h3> Dados da Colheita</h3>
	<br>
	<div class="row">
		<div class="col-sm-2 ">
			<div class="form-group">
				<label for="loteOrigem">Cód. Colheita:</label> 
				<input type="text" class="form-control" name="idcolh" id="idcolh" value="<?php echo $idlote?>" readonly></input>
			</div>
		</div>
		<div class="form-group col-sm-3"> 
			<label for="especie">Especie:</label>
			<input type="text" class="form-control" id="idradio" name="idradio" maxlength="30" minlength="1" placeholder="Pesquisar..." value="<?php echo $especie?>" readonly="">
		</div>
		<div class="form-group col-sm-3">
			<label  for="nomecientifico">Nome Científico</label>
			<input type="text"  class="form-control"  name="nomecientifico" id="nomecientifico"  value="<?php echo $nomecientifico?>" disabled="true">
		</div>

		<div class="form-group col-sm-2">
			<label  for="familia">Família:</label>
			<input type="text"  class="form-control"  name="familia" id="familia"  value="<?php echo $familia?>" disabled="true">
		</div>
		<div class="form-group col-sm-2">
			<label for="dataColheita">Data:</label>
			<input type="date" class="form-control" name="dataColheita" id="dataColheita"  value="<?php echo $dataColheita?>" readonly="">
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-12">
			<label for="localColheita">Local da Colheita:</label>
			<textarea class="form-control" name="localColheita" id="localColheita" readonly=""  ><?php echo $localColheita?></textarea>
		</div>
	</div>

	<div class="row">						
		<div class="form-group col-sm-12">
			<label for="colhedores">Colhedores:</label>
			<textarea class="form-control" name="colhedores" id="colhedores"  readonly=""> <?php echo $colhedores?></textarea>
		</div>
	</div>

	<div class="row">
		<div class="form-group col-sm-12">
			<label for="obsColheita">Observação:</label>
			<textarea class="form-control" name="obsColheita" id="obsColheita"   readonly="" ><?php echo $obs?></textarea> 
		</div>
	</div>


	<h3>Árvores da Colheita</h3>
	<hr>	
	<div class="container-fluid">
		<table class="table table-hover table-responsive">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Altura Total</th>
					<th scope="col">Altura Comercial</th>
					<th scope="col">DAP</th>
					<th scope="col">CAP</th>
					<th scope="col">GPS: X</th>
					<th scope="col">Y</th>
					<th scope="col">Opções</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if ($arvores->numRows() > 0) {
					foreach ($arvores->result() as $arvores ){ ?>
						<tr>
							<td><?php echo $arvores['idarvores']; ?></td>
							<td><?php echo $arvores['altura_total']; ?></td>
							<td><?php echo $arvores['altura_comercial']; ?></td>
							<td><?php echo $arvores['dap']; ?></td>
							<td><?php echo $arvores['cap']; ?></td>
							<td><?php echo $arvores['gpsX']; ?></td>
							<td><?php echo $arvores['gpsY']; ?></td>
							<td>
								<button type="button" id="<?php echo $arvores['idarvores'];?>" class="btn btn-info btn-modal-arv" data-toggle="modal" data-target="#myModal" >Ver</button> 
							</td>
						</tr>
					<?php }
				}
				?> 
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="form-group col-sm-1">						
			<a href="lista-lote.php"><button type="submit" class="btn btn-primary"><span class="fa fa-reply"></span> Voltar</button></a>
		</div>
		<div class="form-group col-sm-1"></div>
		<div class="form-group col-sm-1">
			<a href="adiciona-arvore.php?idlote=<?php echo $idlote; ?>"><button type="button"  class="btn btn-success" style=" min-width: 200px">Adicionar Árvore</button></a>
		</div>
		<div class="form-group col-sm-1"></div>
	</div>
</div>




</div>

<?php

require_once 'footer.php';

?>

<!-- Modal View-->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Dados da Árvore</h4>
			</div>
			<div class="modal-body">

				<div id="modal-php"></div>		

			</div>
		</div>

	</div>
</div>

<!-- Modal Exclusao-->
<div id="myModalExclusao" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Excluir Árvore</h4>
			</div>
			<div class="modal-body">

				<div id="modala-php"></div>
				

			</div>
		</div>

	</div>
</div>