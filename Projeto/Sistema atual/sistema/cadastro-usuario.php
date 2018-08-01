<?php 
//conexao
require_once 'db_connect.php';

//sessao
session_start();

if(!isset($_SESSION['logado'])){
	header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Sistema Lasfac</title>

	<!-- BOOTSTRAP -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- FONTE AWESOME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

	<!-- CABEÇALHO -->
<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span> 
					</button>
					<a class="navbar-brand" href="#">WebSiteName</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="principal.php">Inicio</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="lista-lote.php">Lotes
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="cadastro-lote.php">Cadastrar Lote</a></li>
									<li><a href="lista-lote.php">Lista de Lotes</a></li>
									<li><a href="cadastro-especie.php">Cadastrar Especie</a></li>
									<li><a href="lista-especie.php">Lista de Especies</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="lista-amotra.php">Amostras
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="cadastro-amostra.php">Cadastrar Amostra</a></li>
										<li><a href="lista-amostra.php">Lista de Amostras</a></li>
									</ul>
								</li>
								<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Página 1</a></li>
										<li><a href="#">Página 2</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">Documentos
										<span class="caret"></span></a>
										<ul class="dropdown-menu">
											<li><a href="cadastro-documento.php">Adicionar Documentos</a></li>
											<li><a href="lista-documento.php">Lista de Documentos</a></li>
										</ul>
									</li>
							</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="lista-usuario.php"><span class="glyphicon glyphicon-user"></span> Usuários</a></li><!--deixa aki entao pra ir pra uma tela q puxa a lista dos usuarios, mas esse campo so aparece se for no caso um usuario do tipo administrador-->
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
		<section class="container-fluid">
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

		</section>
		<footer>

		</footer>
	</div>
</body>
</html>

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




