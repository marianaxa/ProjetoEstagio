 <?php 

 require 'crud.php';

 require_once 'header.php';
 ?>

 <div class="container">
 	<fieldset>
 		<legend>Cadastro da Colheita</legend>
 	</fieldset>


 	<form  name="formCardastroColheita" id="formCardastroColheita" method="POST" action="crud-colheita.php">

 		<div class="row">
 			<div class="col-sm-5"> 
 				<div class="form-group">
 					<label for="especie">Especie:</label>
 					<div class="input-group">
 						<input type="text" class="form-control" id="idradio" name="idradio" maxlength="30" minlength="1" placeholder="Pesquisar..." >
 						<div class="input-group-btn">
 							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-especies">Pesquisar</button>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="form-group col-sm-2">
 				<label for="dataColheita">Data da Colheita:</label>
 				<input type="date" class="form-control" name="dataColheita" id="dataColheita" required="">
 			</div>
 		</div>


 		<div class="row">
 			<div class="form-group col-sm-7">
 				<label for="localColheita">Local da Colheita:</label>
 				<textarea class="form-control" name="localColheita" id="localColheita" minlength="1" maxlength="255" required=""></textarea>
 			</div>
 		</div>

 		<div class="row">						
 			<div class="form-group col-sm-7">
 				<label for="colhedores">Colhedores:</label>
 				<textarea class="form-control" name="colhedores" id="colhedores" minlength="1" maxlength="255" required=""></textarea>
 			</div>
 		</div>

 		<div class="row">
 			<div class="form-group col-sm-7">
 				<label for="obsColheita">Observação:</label>
 				<textarea class="form-control" name="obsColheita" id="obsColheita" ></textarea> 
 			</div>
 		</div>
 		<div class="row">
 			<div class="form-group col-sm-12">
 				<button type="submit" class="btn btn-primary">Voltar</button>
 				<button type="submit" name="acao" value="create" class="btn btn-primary">Confirmar</button>
 			</div>
 		</div>
 	</form>
 </div>

 <?php 
 include('modal-especies.php'); 
 require_once 'footer.php';

 ?>