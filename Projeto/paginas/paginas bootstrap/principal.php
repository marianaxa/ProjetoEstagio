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
										<li><a href="#">Página 1</a></li>
										<li><a href="#">Página 2</a></li>
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

	<!-- SEÇÃO PRINCIPAL -->
	<section class="container">

	<div id="interface">
		<!--Parte de cima-->
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-4">
					<!--<img class="img-responsive" src="imagens/semente.png"> -->
					<p><i class="fa fa-lemon-o" style="font-size:40px"></i></p>
					<span>Amostras</span>
					<span>0</span>
				</div>
				<div class="col-sm-4">
					<!-- <span class="glyphicon glyphicon-asterisk"></span> -->
					<p><i class="fa fa-flask"  style="font-size:40px"></i></p>
					<span>Em Análise</span>
					<span>0</span>
				</div>
				<div class="col-sm-4">
					<p><i class="fa fa-file-text" style="font-size:38px"></i></p>
					<span>Finalizados</span>
					<span>0</span>
				</div>
			</div>
		</div>

		<hr>

		<!--Parte de baixo-->
		<div class="row">
			<div class="col-sm-4">
				<a href="cadastro-lote.php"><button class="btn btn-primary btn-sm" style="font-size:24px"><i class="fa fa-file-text"></i> <p>Cadastrar Lote</p> </button></a>
			</div>
			<div class="col-sm-4">
				<a href="lista-amostra.php"><button class="btn btn-primary btn-sm" style="font-size:24px"><i class="fa fa-file-text"></i> <p>Lista de Lotes</p> </button></a>
			</div>
			<div class="col-sm-4">
				<a href="#"><button class="btn btn-primary btn-sm" style="font-size:24px"><i class="fa fa-file-text"></i> <p>Gerar Relatórios</p> </button></a>
			</div>					
		</div>

		<div class="row">
			<div class="col-sm-4">
				<a href="cadastro-amostra.php"><button class="btn btn-primary btn-sm" style="font-size:24px"><i class="fa fa-file-text"></i> <p>Iniciar Análise</p> </button></a>
			</div>
			<div class="col-sm-4">
				<a href="lista-amostra.php"><button class="btn btn-primary btn-sm" style="font-size:24px"><i class="fa fa-file-text"></i> <p>Lista de Análises</p> </button></a>
			</div>
			<div class="col-sm-4">
				<a href="#"><button class="btn btn-primary btn-sm" style="font-size:24px"><i class="fa fa-file-text"></i> <p>Documentos</p> </button></a>
			</div>					
		</div>
	</div>

	</section>

<!-- nao sei se deixarei um rodape, eu acho legal, mas nao se se é realmente necessario.
	<footer class="container-fluid text-center">
		<p>Footer Text</p>
	</footer>
-->
	</div>
</body>
</html>