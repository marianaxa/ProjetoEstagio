<?php 
//conexao
require_once 'db_connect.php';

//sessao
session_start();

if(!isset($_SESSION['logado'])):
	header('Location: login.php');
endif;

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
		<section  class="container-fluid">
			<fieldset>
				<legend>Cadastro de Amostras</legend>

				<form  name="formCardastroAmostra" id="formCardastroAmostra" method="get" action="#">
					<!--pra ficar td na msm linha tem q criar uma div como form group pra cada conjuntinho
						de laber e imput q vao ficar na msm linha, ai tem q por  a class control-label em cada label
						e o form-control em cada input-->

						<!--Primeira Linha-->
						<div class="row">
							<div class="col-sm-4 ">
								<div class="form-group">
									<label for="loteOrigem">Lote de Origem:</label> 
									<div class="input-group">
										<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" maxlength="5" minlength="1" placeholder="Pesquisar... " required="">
										<div class="input-group-btn">
											<button type="button" class="btn btn-primary">Pesquisar</button>
										</div>
									</div>
								</div>	
							</div>
							<!--
							<div class="form-group col-sm-2 ">
								<label for="dataEntradaLoteOrigem">Data de entrada:</label> 
								<input type="date" class="form-control" name="dataEntradaLoteOrigem" id="dataEntradaLoteOrigem" maxlength="5" minlength="1" placeholder="Ex.: " required="">
							</div>	
						-->
						</div>
							
							<!-- Aki ele tem q carregar algumas informacoes do lote tipo, se foi colhido ou recebido e a especie-->
						
							<div class="row">
								<!--repetir  o esquema do lote de origem-->
								<div class="form-group col-sm-2">
									<label  for="especie">Especie:</label>
									<input type="text"  class="form-control"  name="especie" id="especie" maxlength="30" minlength="1" placeholder="Ex.: Pupunha" required="">
								</div>
								<div class="form-group col-sm-2">							
									<label for="nomeCientifico">Nome Científico:</label>
									<input type="text"  class="form-control"  name="nomeCientifico"  maxlength="30" minlength="1" id="nomeCientifico" placeholder="Ex.: Bactris gasipaes" required="">
								</div>
								<div class="form-group col-sm-2">	
									<label for="familia">Familia:</label>
									<input type="text"  class="form-control"  name="familia"  maxlength="30" minlength="1" id="familia"   placeholder="Ex.: Arecaceae" required="">
								</div>
							</div>		

							<div class="row">
								<div class="form-group col-sm-3">
									<label for="condicaoArmazenamento">Condição de Armazenamento:</label>	
									<input type="text"  class="form-control"  name="condicaoArmazenamento" maxlength="30" minlength="1" id="condicaoArmazenamento" required="">
								</div>

								<div class="form-group col-sm-3">
									<label  for="dataImplatacao">Data Implantação:</label>
									<input type="date"  class="form-control"  name="dataImplatacao" id="dataImplatacao" required="">
								</div>
							</div>
					<!--Fim terceira linha-->

					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<button type="submit" class="btn btn-primary">Voltar</button>
							<button type="submit" class="btn btn-primary">Confirmar</button>
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





