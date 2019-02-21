<?php 
//conexao
require_once 'db_connect.php';

//sessao
session_start();
/*
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
		echo $senha;
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
*/
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

	<link rel="icon" href="imagens/logo3.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="imagens/logo3.ico" type="image/x-icon" />
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
	.login-form-f {
		width: 640px;
		margin: 50px auto;
	}
	.login-form form {
		margin-bottom: 15px;
		background: #f7f7f7;
		box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.3);
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

	.bs-callout {
		padding: 20px;
		margin: 20px 0;
		border: 1px solid #eee;
		border-top-color: #1b809e;
		border-top-width: 5px;
		border-radius: 3px;

	}
	.bs-callout-danger {
		border-top-color: #ff3333;
	}

	.bs-callout-warning {
		border-top-color: #aa6708;
	}

</style>
</head>

<body>
	<br>
	<br>
	<section class="container">
		<div class="panel-group">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-sm-8">
							<h3>Sistema de Controle de Análise de Sementes - SCAS</h3>
							<h4 style=" color: 003300">LASFAC</h4> 
						</div>
						<div class="col-sm-4">
							<div align="center">
								<br>
								<img src="imagens/brasil-logo.jpg" class="img-thumbnail"  width="76" height="56"> 
								<img src="imagens/acre-logo.png" class="img-thumbnail"  width="76" height="56">
							</div>

						</div>
						
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-6">
							<div class="bs-callout bs-callout-danger" id="callout-navbar-form-labels"> 
								<h4>Informações sobre o sistema:</h4>
								<p>
									- Entre com o e-mail e a senha cadastrados pelo administrador
								</p> 
								<p>
									- Qualquer problema com o sistema entre em contato com os desenvolvedores ou pelo email mxa234@gmail.com
								</p>
								<br>
								<div align="center">
									<img src="imagens/ufac_logo2.png" class="img-responsive"  width="254" height="186"> 
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="login-form">
								<!--<form name="formLogin" id="formLogin" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
									<form name="formLogin" id="formLogin" method="POST" action="validacao.php ?>"> 
										<h2 class="text-center">Login</h2>     
										<?php 
										if(isset($_SESSION['msg'])){
											echo $_SESSION['msg'];
											unset($_SESSION['msg']);
										} ?>   
										<div class="form-group">
											<label for="email">E-mail:</label>
											<input type="email" class="form-control" placeholder="E-mail" name="email" id="email" required="required">
										</div>
										<div class="form-group">
											<label for="senha">Senha:</label>
											<input type="password" class="form-control" placeholder="Password" name="senha" id="senha" required="required">
										</div>
										<div class="form-group">
											<button type="submit" name="btn-entrar" class="btn btn-success btn-block">Entrar</button>
										</div>  
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	</body>
	</html>
