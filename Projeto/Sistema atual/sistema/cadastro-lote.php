<?php 
//conexao
require_once 'db_connect.php';
require 'crud.php';

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

	<!-- FONT AWESOME -->
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
					<a class="navbar-brand" href="#">SCAS LASFAC</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="principal.php">Início</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" href="lista-lote.php">Lotes
								<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="cadastro-lote.php">Cadastrar Lote Recebido</a></li>
									<li><a href="cadastro-colheita.php">Cadastrar Lote Colhido</a></li>
									<li><a href="cadastro-especie.php">Cadastrar Espécie</a></li>
									<li><a href="lista-lote.php">Lista de Lotes</a></li>
									<li><a href="lista-especie.php">Lista de Espécies</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="lista-amostra.php">Amostras
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="cadastro-amostra.php">Cadastrar Amostra</a></li>
										<li><a href="lista-amostra.php">Lista de Amostras</a></li>
									</ul>
								</li>
								<!-- 
								<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios
									<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="#">Página 1</a></li>
										<li><a href="#">Página 2</a></li>
									</ul>
								</li>
								-->
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
						<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

		<!-- Conteúdo da página -->
		<section class="container-fluid">
			<fieldset>
				<legend>Cadastro Lote de Semente</legend>

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

						<div class="form-group col-md-3">	     		   
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
		</section>
		<footer>

		</footer>
	</div>
</body>
</html>

<?php 
	include('modal-especies.php');
?>