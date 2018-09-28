<?php 
require_once 'header.php';
?>

<fieldset>
	<legend>Cadastro de Usuario</legend>

	<form name="formCardastroUsuario" id="formCardastroUsuario" method="GET" action="crud-usuario.php">

		<div class="row">
			<div class="form-group col-sm-6">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control"  name="nome" id="nome" maxlength="50" minlength="1" placeholder="Ex.: João Marcos Silva Costa" required="">
			</div>
			
			<div  class="form-group col-sm-2">
				<label for="cargo">Cargo:</label>
				<select name ="cargo" id="cargo" class="form-control" for="cargo" required="">
					<option >Selecione...</option>
					<option value="1">Responsável Técnico</option>
					<option value="2">Secretária</option>
					<option value="3">Analista</option>
					<option value="4">Controle de Qualidade</option>						
					<option value="5">Adminstrador do Sistema</option>
				</select>

			</div>
		</div>

		<div class="row">
			<div  class="form-group col-sm-8">
				<label for="email">E-mail:</label>
				<input type="text" class="form-control" name="email" id="email" maxlength="30" minlength="1" placeholder="Ex.: joao@gmail.com" required="">
			</div>
		</div>


		<div class="row">
			<div  class="form-group col-sm-4">
				<label for="senha">Senha:</label>
				<input type="password" class="form-control" name="senha" id="senha" maxlength="10" minlength="8" placeholder="********" required="">
			</div>

			<div  class="form-group col-sm-4">
				<label for="senhaConfirmacao">Confimar Senha:</label>
				<input type="password" class="form-control" name="senhaConfirmacao" id="senhaConfirmacao" maxlength="10" minlength="8"  placeholder="********"   required="">
			</div>
		</div>

		<div class="row">
			<div class="form-group col-md-8">
				<button type="submit" class="btn btn-primary">Voltar</button>
				<button type="submit" name="acao" value="create" class="btn btn-primary" onClick="validarSenha()">Confirmar</button>
			</div>
		</div>
	</form>
</fieldset>

<?php
require_once 'footer.php';

?>			

<script type="text/javascript">
	var password = document.getElementById("senha")
	, confirm_password = document.getElementById("senhaConfirmacao");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Senhas diferentes!");
		} else {
			confirm_password.setCustomValidity('');
		}
	}

	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;

</script>




