 <?php 

 require 'crud.php';

 require_once 'header.php';
 ?>

 <div style="padding: 30px">
 	<fieldset style="padding: 10px">
 		<legend align="center" style="width:70%;">Cadastro da Colheita</legend>
 		<form  name="formCardastroColheita" id="formCardastroColheita" method="POST" action="crud-colheita.php">

 			<div class="row">
 				<div class="form-group col-sm-2"></div> 				
 				<div class="col-sm-5"> 
 					<div class="form-group">
 						<label for="especie">Especie:</label>
 						<div class="input-group">
 							<!--	<input type="text" class="form-control" id="idradio" name="idradio" maxlength="30" minlength="1" placeholder="Pesquisar..."  readonly="" > -->
 							<input type="text" class="form-control" name="nome-vulgar" id="nome-vulgar" maxlength="5" minlength="1" placeholder="Pesquisar... " readonly="">
 							<div class="input-group-btn">
 								<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-especies">Pesquisar</button>
 							</div>
 						</div>
 					</div>
 				</div>
 				<div class="form-group col-sm-3">
 					<label for="dataColheita">Data da Colheita:</label>
 					<input type="date" class="form-control" name="dataColheita" id="dataColheita" required="">
 				</div>

 				<div class="form-group col-sm-2"></div>
 			</div>


 			<div class="row">
 				<div class="form-group col-sm-2"></div>
 				<div class="form-group col-sm-8">
 					<label for="localColheita">Local da Colheita:</label>
 					<textarea class="form-control" name="localColheita" id="localColheita" minlength="1" maxlength="255" required=""></textarea>
 				</div>
 				<div class="form-group col-sm-2"></div>
 			</div>

 			<div class="row">		
 				<div class="form-group col-sm-2"></div>				
 				<div class="form-group col-sm-8">
 					<label for="colhedores">Colhedores:</label>
 					<textarea class="form-control" name="colhedores" id="colhedores" minlength="1" maxlength="255" required=""></textarea>
 				</div>
 				<div class="form-group col-sm-2"></div>
 			</div>

 			<div class="row">
 				<div class="form-group col-sm-2"></div>
 				<div class="form-group col-sm-8">
 					<label for="obsColheita">Observação:</label>
 					<textarea class="form-control" name="obsColheita" id="obsColheita" ></textarea> 
 				</div>
 				<div class="form-group col-sm-2"></div>
 			</div>
 			<div class="row">						
 				<div class="row" style="padding: 0px">
 					<div class="form-group col-sm-5"></div>
<!-- 					<div class="form-group col-sm-1">
 						<a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
 					</div>

 					<div class="form-group col-sm-1"></div> 
 -->
 					<div class="form-group col-sm-1">
 						<button type="submit" name="acao" value="create" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
 					</div>
 					<div class="form-group col-sm-4"></div>
 				</div>


		<div class="row">
			<div class="form-group col-sm-4"></div>
		</div>
		<div class="row">
			<div class="form-group col-sm-1">
				<a href="principal.php"><button type="button" class="btn btn-basic" style="color: green; min-width: 90px"><i class="fa fa-reply"></i></button></a>
			</div>
		</div>
 			</form>
 		</fieldset>
 	</div>

 	<?php 
 	include('modal-especies.php'); 
 	require_once 'footer.php';

 	?>