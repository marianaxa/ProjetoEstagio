<?php 


require_once 'header.php';
require 'crud.php';
?>




<fieldset>
	<legend>Cadastro Lote de Semente Recebido</legend>

	<form name="formCardastroLoteSemente" id="formCardastroLoteSemente" method="POST" action="crud-lote-recebido.php">


		<div class="row">
			<div class="col-sm-5">
				<div class="form-group">
					<label for="especie">Especie:</label>
					<div class="input-group">
						<input type="text" class="form-control" name="idradio" id="idradio" maxlength="30" minlength="1" placeholder="Pesquisar..." required="true" readonly="" >
						<div class="input-group-btn">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-especies">Pesquisar</button>
						</div>
					</div>
				</div>
			</div>	

			<div class="form-group col-sm-2">
				<label for="dataChegada">Data Chegada:</label>
				<input type="date" class="form-control" name="dataChegada" id="dataChegada" required="">
			</div>					
		</div>


		<legend>Dados Fornecedor</legend>

		<div class="row">
			<div class="form-group col-sm-4">
				<label for="fornecedor">Fornecedor:</label>
				<input type="text" class="form-control" name="fornecedor" id="fornecedor"  maxlength="50" minlength="1" placeholder="Ex.: Universidade Federal do Acre" required="">
			</div>

			<div class="form-group col-sm-3">	     		   
				<label for="numRenasem">N° Renasem:</label>
				<input type="text" class="form-control" name="numRenasem" id="numRenasem"  maxlength="10" minlength="1" placeholder="AC-03117/2118" required="">
			</div>
		</div>



		<div  class="row">
			<div class="form-group col-sm-4">	
				<label for="rua">Endereço:</label>
				<input type="text" class="form-control" name="rua" id="rua" placeholder="Ex.: Rua Santo Antonio, n° 312"  maxlength="100" minlength="2" required="">
			</div>

			<div class="form-group col-sm-3">	
				<label for="cep">CEP:</label>
				<input type="text" class="form-control" name="cep" id="cep" maxlength="10" minlength="9" placeholder="Ex.: 69920-900" required="">
			</div>
		</div>

		<div  class="row">
			<div class="form-group col-sm-3">
				<label for="bairro">Bairro:</label>
				<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex.: Distrito Industrial" required="">
			</div>

			<div class="form-group col-sm-3">
				<label for="cidade">Cidade:</label>
				<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Ex.: Rio Branco" required="">
			</div>

			<div class="form-group col-sm-1">
				<label for="estado">UF:</label>
				<select name="estado" id="estado" class="form-control" for="estado">
					<option value="">--</option>
					<option value="AC">AC</option>
					<option value="AL">AL</option>
					<option value="AP">AP</option>
					<option value="AM">AM</option>
					<option value="BA">BA</option>
					<option value="CE">CE</option>
					<option value="DF">DF</option>
					<option value="ES">ES</option>
					<option value="GO">GO</option>
					<option value="MA">MA</option>
					<option value="MT">MT</option>
					<option value="MS">MS</option>
					<option value="MG">MG</option>
					<option value="PA">PA</option>
					<option value="PB">PB</option>
					<option value="PE">PE</option>
					<option value="PI">PI</option>
					<option value="PR">PR</option>
					<option value="RJ">RJ</option>
					<option value="RN">RN</option>
					<option value="RO">RO</option>
					<option value="RS">RS</option>
					<option value="SC">SC</option>
					<option value="SE">SE</option>
					<option value="SP">SP</option>
					<option value="RR">RR</option>
					<option value="TO">TO</option>
				</select>
			</div>
		</div>
		<!--Fim informações-->
		

		<div class="row">
			<div class="form-group col-sm-7">						
				<button type="submit" class="btn btn-primary">Voltar</button>
				<button type="submit" name="acao" value="create" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</form>

	<?php 
	include('modal-especies.php');
	require_once 'footer.php';
	?>