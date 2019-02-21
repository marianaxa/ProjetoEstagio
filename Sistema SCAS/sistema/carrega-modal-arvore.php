<?php 

$id = $_POST['id'];

require 'crud.php';
$arvore = new Crud();

$arvore->select("SELECT * FROM arvore WHERE idarvores=$id");

foreach ($arvore->result() as $arvore ){
	$alturaTotal = $arvore['altura_total'];
	$alturaComercial = $arvore['altura_comercial'];
	$dap = $arvore['dap'];
	$cap = $arvore['cap'];
	$gpsX = $arvore['gpsX'];
	$gpsY = $arvore['gpsY'];
	$tipoColheita = $arvore['tipo_colheita'];
	$tipoSolo = $arvore['tipo_solo'];
	$tipoTerreno = $arvore['tipo_terreno'];
	$localizacao = $arvore['localizacao'];
	$tipoVegetacao = $arvore['tipo_vegetacao'];
	$arvoresVizinhas = $arvore['arvores_vizinhas'];


}
?>

<!-- Conteúdo -->
<div class="container-fluid">
	<!-- mensagem -->


	<div class="row">
		<div class="form-group col-sm-2">							
			<label for="alturaTotal">Altura Total:</label>
			<input type="number" class="form-control" name="alturaTotal" id="alturaTotal" value="<?php echo $alturaTotal?>" min="1" readonly="" >
		</div>
		<div class="form-group col-sm-2">
			<label for="alturaComercial">Alt. Comercial:</label>
			<input type="number" class="form-control" name="alturaComercial" id="alturaComercial" value="<?php echo $alturaComercial?>" min="1" readonly="" >
		</div>
		<div class="form-group col-sm-2">
			<label>DAP:</label>
			<input type="text" class="form-control"  name="dap"  id="dap"  maxlength="30" value="<?php echo $dap?>" readonly="">
		</div>

		<div class="form-group col-sm-2">
			<label>CAP:</label> 
			<input type="text" class="form-control"  name="cap" id="cap" value="<?php echo $cap?>" maxlength="30" readonly="" >
		</div>
		<div class="form-group col-sm-2">
			<label> GPS - X:</label>
			<input type="text" class="form-control"  name="gpsX" id="gpsX" value="<?php echo $gpsX?>" maxlength="30"  readonly="">
		</div>
		<div class="form-group col-sm-2">
			<label> GPS - Y:</label>
			<input type="text" class="form-control"  name="gpsY" id="gpsY" value="<?php echo $gpsY?>" maxlength="30" readonly="">
		</div> 

	</div>

	<hr>

	<div class="row">
		<div class="form-group col-sm-2">
			<label>Tipo de colheita:</label>

			<input type="text" class="form-control"  name="tipoColheita"  id="tipoColheita" value="<?php echo $tipoColheita?>" maxlength="30" readonly="">

		</div>

		<div class="form-group col-sm-2">
			<label>Tipo de solo:</label>
			<input type="text" class="form-control"  name="tipoSolo"  id="tipoColheita" value="<?php echo $tipoSolo?>" maxlength="30" readonly="">
		</div>

		<div class="form-group col-sm-3">
			<label>Tipo de terreno:</label>
			<input type="text" class="form-control"  name="tipoTerreno"  id="tipoTerreno" value="<?php echo $tipoTerreno?>" maxlength="30" readonly="">
		</div>

		<div class="form-group col-sm-2">
			<label>Localização:</label> 
			<input type="text" class="form-control"  name="localizacao"  id="localizacao" value="<?php echo $localizacao?>" maxlength="30" readonly="">
		</div>

		<div class="form-group col-sm-3">
			<label>Tipo de vegetação:</label> 
			<input type="text" class="form-control"  name="vegetacao"  id="vegetacao" value="<?php echo $tipoVegetacao?>" maxlength="30" readonly="">
		</div>


	</div>

	<div class="row">
		<div class="form-group col-sm-12">
			<label for="arvoresVizinhas" >Árvores vizinhas:</label>
			<textarea class="form-control" name="arvoresVizinhas" rows="5" id="arvoresVizinhas"  minlength="1" 
			maxlength="255" readonly="" ><?php echo $arvoresVizinhas?></textarea> 
		</div>						
	</div>
	

</div>