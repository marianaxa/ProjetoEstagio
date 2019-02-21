<?php 

$idlote = $_GET['idlote'];


require 'crud.php';
$colheita = new Crud();

$colheita->select("SELECT idlote_sementes, idcolheita, nome_vulgar, nome_cientifico, familia, data, local, colhedores, 
	observacoes_colheita FROM lote, especie, colheita WHERE idlote_sementes='$idlote'
	and lote.especieFK=id_especie AND origemFK=idcolheita ");


foreach ($colheita->result() as $colheita ){
	$idlote = $colheita['idlote_sementes'];
	$idcolh = $colheita['idcolheita'];
	$especie = $colheita['nome_vulgar'];
	$nomecientifico = $colheita['nome_cientifico'];
	$familia = $colheita['familia'];
	$dataColheita= $colheita['data'];
	$localColheita = $colheita['local'];
	$colhedores = $colheita['colhedores'];
	$obs = $colheita['observacoes_colheita'];
}

require_once 'header.php';

?>
<div class="container">
	<fieldset style="padding: 20px">
		<legend style="width:70%;"><h3>Adicionar Árvore</h3></legend>
		<form  name="formCardastroArvore" id="formCardastroArvore" method="POST" action="crud-colheita.php">
			<div class="row">
				<div class="col-sm-2 ">
					<div class="form-group">
						<label for="loteOrigem">Cód. Colheita:</label> 
						<input type="text" class="form-control" name="idcolh" id="idcolh" value="<?php echo $idcolh?>" readonly></input>
					</div>
				</div>
				<div class="form-group col-sm-3"> 
					<label for="especie">Especie:</label>
					<input type="text" class="form-control" id="especie" name="ecpecie" maxlength="30" minlength="1" placeholder="Pesquisar..." value="<?php echo $especie?>" readonly="">
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
			<hr>
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

	<div class="col-sm-1">
		<a href="ver-lote-colhido.php?idcol=<?php echo $idlote; ?>"><button type="button" class="btn btn-primary" style=" min-width: 100px"><i class="fa fa-reply"></i> Voltar</button></a>
	</div>
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<button class="btn btn-success btn-md" name="acao" value="createArvore"><span class="fa fa-plus-square-o"></span>  Salvar Arvore</button>
	</div>
</div>

</form>
</fieldset>
</div>


<?php

require_once 'footer.php';

?>