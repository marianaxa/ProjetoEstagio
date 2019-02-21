<?php 


$id = $_GET['id'];

require 'crud.php';
$usuario = new Crud();

$usuario->select("SELECT id, nome, email, categoriaUsuarioFK FROM usuarios 
	where id = $id");

foreach ($usuario->result() as $user ){
	$nome= $user['nome'];
	$email = $user['email'];
	$cargo = $user['categoriaUsuarioFK'];
}
require_once 'header.php';
?>


<div style="padding: 30px">
	<fieldset style="padding: 10px">
		<legend align="center" style="width:70%;"><h3>Edição de Usuario</h3></legend>

		<form name="formEdicaoUsuario" id="formEdicaoUsuario" method="GET" action="crud-usuario.php">

			<div class="row">
				<div class="form-group col-sm-3"></div>
				<div  class="form-group col-sm-1">
					<label for="nome">Código:</label>
					<input type="text" class="form-control" name="idusuario" id="idusuario" value="<?php echo $id?>" readonly></input>
				</div>

				<div class="form-group col-sm-3">
					<label for="nome">Nome:</label>
					<input type="text" class="form-control"  name="nome" id="nome" value="<?php echo $nome?>" maxlength="50" minlength="1" >
				</div>

				<div  class="form-group col-sm-2">
					<label for="cargo">Cargo:</label>
					<select name ="cargo" id="cargo"  class="form-control" for="cargo" required="">
						<option >Selecione...</option>
						<option value="1" <?php echo $cargo=='1'?'selected':'';?> >Responsável Técnico</option>
						<option value="2" <?php echo $cargo=='2'?'selected':'';?> >Secretária</option>
						<option value="3" <?php echo $cargo=='3'?'selected':'';?>  >Analista</option>
						<option value="4" <?php echo $cargo=='4'?'selected':'';?> >Controle de Qualidade</option>						
						<option value="5" <?php echo $cargo=='5'?'selected':'';?> >Adminstrador do Sistema</option>
					</select>

				</div>
			</div>

			<div class="row">
				<div class="form-group col-sm-3"></div>
				<div  class="form-group col-sm-6">
					<label for="email">E-mail:</label>
					<input type="text" class="form-control" name="email" id="email"
					value="<?php echo $email?>" maxlength="30" minlength="1">
				</div>
			</div>

			<div class="row" style="padding: 10px">

				<div class="form-group col-sm-5"></div>
							<!--
							<div class="form-group col-sm-1">
								<a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
							</div>
							<div class="form-group col-sm-1"></div> 
						-->
						<div class="form-group col-sm-1">
							<button type="submit" name="acao" value="edit" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
						</div>
						<div class="form-group col-sm-4"></div>
					</div>

					<div class="row">
						<div class="form-group col-sm-4"></div>
					</div>
					<div class="row">
						<div class="form-group col-sm-1">
							<a href="lista-usuario.php"><button type="button" class="btn btn-basic" style="color: green; min-width: 90px"><i class="fa fa-reply"></i></button></a>
						</div>
					</div>

<!--
					<div class="row">
						
						<div  class="form-group col-sm-4">
						
							<label for="senha">Senha:</label>
							<input type="password" class="form-control" name="senha" id="senha" maxlength="10" minlength="8" value="<?php echo $senha?>" required="">
						</div>

						<div  class="form-group col-sm-4">
							<label for="senhaConfirmacao">Confimar Senha:</label>
							<input type="password" class="form-control" name="senhaConfirmacao" id="senhaConfirmacao" maxlength="10" minlength="8"  placeholder="********"   required="">
						</div>
						
					</div>
				

				<div class="row">
					<div class="form-group col-md-8">
						<button type="submit" class="btn btn-primary">Voltar</button>
						<button type="submit" name="acao" value="edit" class="btn btn-primary" onClick="validarSenha()">Confirmar</button>
					</div>

				</div>

			-->
		</form>
	</fieldset>
</div>

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




