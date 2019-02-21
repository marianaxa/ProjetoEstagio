<?php 

$idlote = $_GET['idcol'];

//echo $idlote;

require 'crud.php';
$colheita = new Crud();
$arvores = new Crud();

$colheita->select("SELECT idlote_sementes, idcolheita, nome_vulgar, data, local, colhedores, 
	observacoes_colheita FROM lote, especie, colheita WHERE idlote_sementes='$idlote'
	and lote.especieFK=id_especie AND origemFK=idcolheita ");

foreach ($colheita->result() as $colheita ){
	$idlote = $colheita['idlote_sementes'];
	$idcol = $colheita['idcolheita'];
	$especie = $colheita['nome_vulgar'];
	$dataColheita= $colheita['data'];
	$localColheita = $colheita['local'];
	$colhedores = $colheita['colhedores'];
	$obs = $colheita['observacoes_colheita'];
}

$arvores->select("SELECT * FROM arvore WHERE colheitaFK = '$idcol' ");


require_once 'header.php';

?>

<div class="container">
	<h2>Colheita</h2>
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Dados Colheita</a></li>
		<li><a data-toggle="tab" href="#menu1">Adicionar Árvore</a></li>
	</ul>

	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<h3>Dados Colheita</h3>

			<div class="row">
				<div  class="form-group col-sm-1">
					<label for="nome">Código:</label>
					<input type="text" class="form-control" name="idcolh" id="idcolh" value="<?php echo $idlote?>" readonly></input>
				</div>
				<div class="col-sm-5"> 
						<label for="especie">Especie:</label>
							<input type="text" class="form-control" id="idradio" name="idradio" maxlength="30" minlength="1" placeholder="Pesquisar..." value="<?php echo $especie?>" readonly="">
				</div>
				<div class="form-group col-sm-6">
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
									<button type="button" id="<?php echo $arvores['idarvores'];?>" class="btn btn-danger btn-modal-arv-ex" data-toggle="modal" data-target="#myModalExclusao">Excluir</button>
								</td>
							</tr>
							<?php }
						}
						?> 
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="form-group col-sm-7">						
					<a href="lista-lote.php"><button type="submit" class="btn btn-primary"><span class="fa fa-reply"></span> Voltar</button></a>
				</div>
			</div>
		</div>

		<!-- OUTRA TAB-->
		<div id="menu1" class="tab-pane fade">
			<h3>Adicionar Árvore</h3>
			<hr>
			<form  name="formCardastroArvore" id="formCardastroArvore" method="POST" action="crud-colheita.php">
				<div class="row">
					<div  class="form-group col-sm-1">
						<label for="nome">Código:</label>
						<input type="text" class="form-control" name="idcolh" id="idcolh" value="<?php echo $idcol?>" readonly></input>
					</div>
					<div class="col-sm-5"> 
						<div class="form-group">
							<label for="especie">Especie:</label>
							<div class="input-group">
								<input type="text" class="form-control" id="idradio" name="idradio" maxlength="30" minlength="1" placeholder="Pesquisar..." value="<?php echo $especie?>" readonly="">
								<div class="input-group-btn">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-especies">Pesquisar</button>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group col-sm-6">
						<label for="dataColheita">Data:</label>
						<input type="date" class="form-control" name="dataColheita" id="dataColheita"  value="<?php echo $dataColheita?>" readonly="">
					</div>
		<!--
		<div class="form-group col-sm-1">
			<label for="localColheita">Num. Árvores:</label>
			<input type="number" class="form-control" name="numArvores" id="numArvores" min="1"  required="" readonly="">
		</div>
	-->
</div>

<div class="row">
	<div class="form-group col-sm-4">							
		<label for="alturaTotal">Altura Total:</label>
		<input type="number" step="0.01" class="form-control" name="alturaTotal" id="alturaTotal" min="0.01" >
	</div>
	<div class="form-group col-sm-4">
		<label for="alturaComercial">Altura Comercial:</label>
		<input type="number" step="0.01" class="form-control" name="alturaComercial" id="alturaComercial" min="0.01" >
	</div>
	<div class="form-group col-sm-4">
		<label>DAP:</label>
		<input type="text" class="form-control"  name="dap"  id="dap"  maxlength="30">
	</div>

</div>

<div class="row">
	

	<div class="form-group col-sm-4">
		<label>CAP:</label> 
		<input type="text" class="form-control"  name="cap" id="cap"  maxlength="30" >
	</div>
	<div class="form-group col-sm-4">
		<label> GPS - X:</label>
		<input type="text" class="form-control"  name="gpsX" id="gpsX" maxlength="30">
	</div>
	<div class="form-group col-sm-4">
		<label> GPS - Y:</label>
		<input type="text" class="form-control"  name="gpsY" id="gpsY" maxlength="30">
	</div> 
</div>
<hr>

<div class="row">
	<div class="form-group col-sm-4">
		<label>Tipo de colheita:</label>
		<div class="radio">
			<label><input type="radio" name="radioTipoColheita" value="No chao">No Chão</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="radioTipoColheita" value="Na arvore">Na Árvore</label>
		</div>
	<!--	<div class="radio">
			<label><input type="radio" name="radioTipoColheita" value="outrosTipoColheita">Outros</label>
		</div>
	-->
	</div>

	<div class="form-group col-sm-4">
		<label>Tipo de solo:</label>
		<div class="radio">
			<label><input type="radio" name="radioTipoSolo" value="Arenoso" >Arenoso</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="radioTipoSolo" value="argiloso" >Argiloso</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="radioTipoSolo" value="Areno-argiloso" >Areno-argiloso</label>
		</div>
	<!--	<div class="radio">
			<label><input type="radio" name="radioTipoSolo" value="outrosTipoSolo" >Outros</label>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<input type="text" name="teste">
			</div>
		</div>-->
	</div>
	<div class="form-group col-sm-4">
		<label>Tipo de terreno:</label>
		<div class="radio">
			<label><input type="radio" name="radiotipoTerreno" value="Ondulado" >Ondulado</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="radiotipoTerreno" value="Suave-ondulado">Suave-ondulado</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="radiotipoTerreno" value="Plano">Plano</label>
		</div>
	<!--	<div class="radio">
			<label><input type="radio" name="radiotipoTerreno" value="outrosTipoTerreno">Outros</label>
		</div>
	-->
	</div>

</div>

<div class="row">

	<div class="form-group col-sm-4">
		<label>Localização:</label> 
		<div class="radio">
			<label><input type="radio" name="radiolocalizacao" value="Terra firme">Terra Firme</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="radiolocalizacao" value="Varzea" >Várzea</label>
		</div>
	<!--	<div class="radio">
			<label><input type="radio" name="radiolocalizacao" value="outros" >Outros</label>
		</div>
	-->
	</div>

	<div class="form-group col-sm-4">
		<label>Tipo de vegetação:</label> 
		<div class="radio">
			<label><input type="radio" name="tipoVegetacao" value="Floresta primaria">Floresta primária</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="tipoVegetacao" value="Capoeira">Capoeira</label>
		</div>
		<div class="radio">
			<label><input type="radio" name="tipoVegetacao" value="Plantacao">Plantação</label>
		</div>
	<!--	<div class="radio">
			<label><input type="radio" name="tipoVegetacao" value="outrosTipoVegetacao" >Outros</label>
		</div>
	-->
	</div>

	<div class="form-group col-sm-4">
		<label for="arvoresVizinhas" >Árvores vizinhas:</label>
		<textarea class="form-control" name="arvoresVizinhas" rows="5" id="arvoresVizinhas" minlength="1" 
		maxlength="255" ></textarea> 
	</div>	
</div>


<div class="row">
	<div class="col-sm-12">
		<button class="btn btn-success btn-md" name="acao" value="createArvore"><span class="fa fa-plus-square-o"></span>  Salvar Arvore</button>
	</div>
</div>

</form>


<hr>
</div>
</div>
</div>
<hr>






<?php
//include('modal-colheita.php'); 
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