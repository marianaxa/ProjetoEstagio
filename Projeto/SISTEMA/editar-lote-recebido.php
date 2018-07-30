<?php 
//conexao
require_once 'db_connect.php';

//sessao
session_start();

if(!isset($_SESSION['logado'])):
	header('Location: login.php');
endif;



$idlote = $_GET['idlote'];
//echo $idlote
require 'crud.php';
$loteRecebido = new Crud();

$loteRecebido->select("SELECT id, especie, data, nomeFornecedor, renasem, rua, bairro, cep, cidade, estado FROM lotefor 
    where id = $idlote");

  foreach ($loteRecebido->result() as $loteRecebido ){
    $idlo= $loteRecebido['id'];
    $especie = $loteRecebido['especie'];
    $data = $loteRecebido['data'];
    $nomeFornecedor = $loteRecebido['nomeFornecedor'];
    $renasem = $loteRecebido['renasem'];
    $rua = $loteRecebido['rua'];
    $bairro = $loteRecebido['bairro'];
    $cidade = $loteRecebido['cidade'];
    $cep = $loteRecebido['cep'];
    $estado = $loteRecebido['estado'];


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
									<li><a href="cadastro-lote.php">Cadastrar Lote Recebido</a></li>
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
				<legend>Cadastro Lote de Semente</legend>

				<form name="formCardastroLoteSemente" id="formCardastroLoteSemente" method="POST" action="crud-lote-recebido.php">


					<div class="row">
						<div  class="form-group col-sm-1">
							<label for="nome">Código:</label>
							<input type="text" class="form-control" name="idlote" id="idlote" value="<?php echo $idlote?>" readonly></input>
						</div>

						<div class="col-sm-4">
							<div class="form-group">
								<label for="especie">Especie:</label>
								<div class="input-group">
									<input type="text" class="form-control" name="idradio" id="idradio" maxlength="30" minlength="1" placeholder="Pesquisar..." value="<?php echo $especie?>" readonly>
									<div class="input-group-btn">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-especies">Pesquisar</button>
									</div>
								</div>
							</div>
						</div>	

						<div class="form-group col-sm-2">
							<label for="dataChegada">Data Chegada:</label>
							<input type="date" class="form-control" name="dataChegada" id="dataChegada" required="" value="<?php echo $data?>">
     		       		</div>					
					</div>


					<legend>Dados Fornecedor</legend>

					<div class="row">
						<div class="form-group col-sm-4">
							<label for="fornecedor">Fornecedor:</label>
							<input type="text" class="form-control" name="fornecedor" id="fornecedor"  maxlength="50" minlength="1" placeholder="Ex.: Universidade Federal do Acre" required="" value="<?php echo $nomeFornecedor?>">
						</div>

						<div class="form-group col-md-3">	     		   
							<label for="numRenasem">N° Renasem:</label>
							<input type="text" class="form-control" name="numRenasem" id="numRenasem"  maxlength="10" minlength="1" placeholder="AC-03117/2118" required="" value="<?php echo $renasem?>">
						</div>
					</div>



	     		<div  class="row">
	     			<div class="form-group col-sm-4">	
	     				<label for="rua">Endereço:</label>
	     				<input type="text" class="form-control" name="rua" id="rua" placeholder="Ex.: Rua Santo Antonio, n° 312"  maxlength="100" minlength="2" required=""  value="<?php echo $rua?>">
	     			</div>

	     			<div class="form-group col-sm-3">	
	     				<label for="cep">CEP:</label>
	     				<input type="text" class="form-control" name="cep" id="cep" maxlength="10" minlength="9" placeholder="Ex.: 69920-900" required=""  value="<?php echo $cep?>">
	     			</div>
	     		</div>

	     		<div  class="row">
	     			<div class="form-group col-sm-3">
	     				<label for="bairro">Bairro:</label>
	     				<input type="text" class="form-control" name="bairro" id="bairro" placeholder="Ex.: Distrito Industrial" required=""  value="<?php echo $bairro?>">
	     			</div>

	     			<div class="form-group col-sm-3">
	     				<label for="cidade">Cidade:</label>
	     				<input type="text" class="form-control" name="cidade" id="cidade" placeholder="EX.: Rio Branco" required=""  value="<?php echo $cidade?>">
	     			</div>

	     			<div class="form-group col-sm-1">
	     				<label for="estado">UF:</label>
	     				<select name="estado" id="estado" class="form-control" for="estado">
	     					<option value="">--</option>
	     					<option value="AC" <?php echo $estado=='AC'?'selected':'';?> >AC</option>
	     					<option value="AL" <?php echo $estado=='AL'?'selected':'';?> >AL</option>
	     					<option value="AP" <?php echo $estado=='AP'?'selected':'';?> >AP</option>
	     					<option value="AM" <?php echo $estado=='AM'?'selected':'';?> >AM</option>
	     					<option value="BA" <?php echo $estado=='BA'?'selected':'';?> >BA</option>
	     					<option value="CE" <?php echo $estado=='CE'?'selected':'';?> >CE</option>
	     					<option value="DF" <?php echo $estado=='DF'?'selected':'';?> >DF</option>
	     					<option value="ES" <?php echo $estado=='ES'?'selected':'';?> >ES</option>
	     					<option value="GO" <?php echo $estado=='GO'?'selected':'';?> >GO</option>
	     					<option value="MA" <?php echo $estado=='MA'?'selected':'';?> >MA</option>
	     					<option value="MT" <?php echo $estado=='MT'?'selected':'';?> >MT</option>
	     					<option value="MS" <?php echo $estado=='MS'?'selected':'';?> >MS</option>
	     					<option value="MG" <?php echo $estado=='MG'?'selected':'';?> >MG</option>
	     					<option value="PA" <?php echo $estado=='PA'?'selected':'';?> >PA</option>
	     					<option value="PB" <?php echo $estado=='PB'?'selected':'';?> >PB</option>
	     					<option value="PR" <?php echo $estado=='PR'?'selected':'';?> >PR</option>
	     					<option value="PE" <?php echo $estado=='PE'?'selected':'';?> >PE</option>
	     					<option value="RJ" <?php echo $estado=='RJ'?'selected':'';?> >RJ</option>
	     					<option value="PI" <?php echo $estado=='PI'?'selected':'';?> >PI</option>
	     					<option value="RN" <?php echo $estado=='RN'?'selected':'';?> >RN</option>
	     					<option value="RS" <?php echo $estado=='RS'?'selected':'';?> >RS</option>
	     					<option value="RO" <?php echo $estado=='RO'?'selected':'';?> >RO</option>
	     					<option value="SC" <?php echo $estado=='SC'?'selected':'';?> >SC</option>
	     					<option value="RR" <?php echo $estado=='RR'?'selected':'';?> >RR</option>
	     					<option value="SP" <?php echo $estado=='SP'?'selected':'';?> >SP</option>
	     					<option value="SE" <?php echo $estado=='SE'?'selected':'';?> >SE</option>
	     					<option value="TO" <?php echo $estado=='TO'?'selected':'';?> >TO</option>
	     				</select>
	     			</div>
	     		</div>
	     		<!--Fim informações-->
	     	

				<div class="row">
					<div class="form-group col-sm-7">						
						<button type="submit" class="btn btn-primary">Voltar</button>
						<button type="submit" name="acao" value="edit" class="btn btn-primary">Confirmar</button>
					</div>
				</div>
				</form>
		</section>
		<footer>

		</footer>
	</div>
</body>

</html>



<?php include('modal-especies.php'); ?>





