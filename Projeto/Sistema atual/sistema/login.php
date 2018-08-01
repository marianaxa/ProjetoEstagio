<?php 
//conexao
require_once 'db_connect.php';

//sessao
session_start();

if(isset($_POST['btn-entrar'])):
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['email']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);

	if(empty($login) or empty($senha)):
		$erros[] = "<li> O campo login/senha deve ser preenchido </li>";
	else:
		$sql = "SELECT email FROM usuario WHERE email = '$login'";
		$resultado = mysqli_query($connect, $sql);

		if(mysqli_num_rows($resultado) > 0):
			$senha = md5($senha);
			$sql = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$senha'";
			$resultado = mysqli_query($connect, $sql);
				if(mysqli_num_rows($resultado) == 1):
					$dados = mysqli_fetch_array($resultado);
					mysqli_close($connect);
					$_SESSION['logado'] = true;
					$_SESSION['id_usuario'] = $dados['idusuario'];
					header('Location: principal.php');
				else:
					$erros[] = "<li> Usuario e senha nao confere</li>";
				endif;
		else:
			$erros[] = "<li> Usuario inexistente </li>";
		endif;

	endif;

endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<?php 
if(!empty($erros)):
	foreach ($erros as $erro):
		echo $erro;
	endforeach;
endif;
?>

	<meta charset="utf-8">

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

	<style type="text/css">
	.login-form {
		width: 340px;
		margin: 50px auto;
	}
	.login-form form {
		margin-bottom: 15px;
		background: #f7f7f7;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
		padding: 30px;
	}
	.login-form h2 {
		margin: 0 0 15px;
	}
	.form-control, .btn {
		min-height: 38px;
		border-radius: 2px;
	}
	.btn {        
		font-size: 15px;
		font-weight: bold;
	}
</style>
</head>

<body>
	<div>
		<section>
			<body>
				<div class="login-form">
					<form name="formLogin" id="formLogin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<h2 class="text-center">Log in</h2>       
						<div class="form-group">
							<label for="email">E-mail:</label>
							<input type="email" class="form-control" placeholder="E-mail" name="email" id="email" required="required">
						</div>
						<div class="form-group">
							<label for="senha">Senha:</label>
							<input type="password" class="form-control" placeholder="Password" name="senha" id="senha" required="required">
						</div>
						<div class="form-group">
							<button type="submit" name="btn-entrar" class="btn btn-primary btn-block">Entrar</button>
						</div>
						<!--
						<div class="clearfix">
							<label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
							<a href="#" class="pull-right">Forgot Password?</a>
						</div>
						-->        
					</form>
				</div>

<!--
			<fieldset class="container">
				<div class="jumbotron">
					<legend class="text-center">Login</legend>
					<form name="formLogin" id="formLogin" method="get" action="#">
						
						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<div class="form-grup">
									<label for="email">E-mail:</label>
									<input type="email" class="form-control" name="email" id="email">
								</div>
							</div>
							<div class="col-sm-3"></div>
						</div>

						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<div class="form-grup">
									<label for="senha">Senha:</label>
									<input type="password" class="form-control" name="senha" id="senha">
								</div>
							</div>
							<div class="col-sm-3"></div>
						</div>

						<div class="row">
							<div class="col-sm-6">
								<button type="submit" class="btn btn-primary">Entrar</button>
							</div>
						</div>
					</form>
				</div>
			</fieldset>
-->
		</section>
	</div>
</body>
</html>
