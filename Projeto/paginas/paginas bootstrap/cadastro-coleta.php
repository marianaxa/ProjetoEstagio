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
				<legend>Cadastro Coleta</legend>

				<form  name="formCardastroColeta" id="formCardastroColeta" method="get" action="#">
						
					<div class="row">
						<div class="col-sm-8"> 
							<div class="form-group">
								<label for="especie">Especie:</label>
								<div class="input-group">
									<input type="text" class="form-control" name="especie" id="especie" minlength="1" maxlength="30" required=""> 
									<!-- quando clicar no buscar mostra uma lista, ou é melhor o auto complete ?-->
									<div class="input-group-btn">
										<button type="button" class="btn btn-primary">Pesquisa</button>
									</div>
								</div>
							</div>
						</div>

						<div class="form-group col-sm-1">
							<label for="quantidade">Quantidade:</label>
							<input type="text" class="form-control" name="quantidade" id="quantidade" min="1" required="">
						</div>

						<div class="form-group col-sm-2">
							<label for="dataColeta">Data Coleta:</label>
							<input type="date" class="form-control" name="dataColeta" id="dataColeta" required="">
						</div>
					</div>
				</div>

					<div class="row">
						<div class="form-group col-sm-12">
							<label for="localColeta">Local da Coleta:</label>
							<textarea class="form-control" name="localColeta" id="localColeta" minlength="1" maxlength="255" required=""></textarea>
						</div>
					</div>

					<div class="row">						
						<div class="form-group col-sm-12">
							<label for="colhedores">Colhedores:</label>
							<textarea class="form-control" name="colhedores" id="colhedores" minlength="1" maxlength="255" required=""></textarea>
						</div>
					</div>


					<fieldset>		
						<legend>Dados da Árvore Matriz</legend>
						<div class="row">
							<div class="form-group col-sm-3">							
								<label for="alturaTotal">Altura Total:</label>
								<input type="number" class="form-control" name="alturaTotal" id="alturaTotal" min="1" required="">
							</div>
							<div class="form-group col-sm-3">
								<label for="alturaComercial">Altura Comercial:</label>
								<input type="number" class="form-control" name="alturaComercial" id="alturaTotal" min="1" required="">
							</div>
						</div>

						<div class="row">
							<div class="form-group col-sm-3">
								<label>DAP:</label>
								<input type="text" class="form-control"  name="dap" minlength="1" maxlength="30" id="dap">
							</div>

							<div class="form-group col-sm-3">
								<label>CAP:</label> 
								<input type="text" class="form-control"  name="cap" minlength="1" maxlength="30" id="cap">
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<hr>
								<h4>Localização - GPS:</h4>

							</div>
							<div class="form-group col-sm-3">
								<label>X:</label>
								<input type="text" class="form-control"  name="gpsX" min="1" id="gpsX">
							</div>
							<div class="form-group col-sm-3">
								<label>Y:</label>
								<input type="text" class="form-control"  name="gpsY" min="1" id="gpsY">
							</div> 
						</div>
					      <!--sobre esse outro sera q tem como pegar q tipo se apessao digitar o q ta ali ir bem o q foi
					      	digitado ? no caso ai é um radio button ai clicou ali, aber espaco pra pessoa digitar...-->

					      	<div class="row">
					      		<div class="form-group col-sm-4">
					      			<label>Tipo de colheita:</label>
					      			<div class="radio">
					      				<label><input type="radio" name="radioTipoColheita" value="noChao">No Chão</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radioTipoColheita" value="naArvore">Na Árvore</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radioTipoColheita" value="outrosTipoColheita">Outros</label>
					      			</div>
					      		</div>

					      		<div class="form-group col-sm-4">
					      			<label>Tipo de solo:</label>
					      			<div class="radio">
					      				<label><input type="radio" name="radioTipoSolo" value="arenoso" >Arenoso</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radioTipoSolo" value="argiloso" >Argiloso</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radioTipoSolo" value="areno-argiloso" >Areno-argiloso</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radioTipoSolo" value="outrosTipoSolo" >Outros</label>
					      			</div>
					      			<div class="row">
					      				<div class="col-sm-2">
					      					<input type="text" name="teste">
					      				</div>
					      			</div>
					      		</div>

					      		<div class="form-group col-sm-4">
					      			<label>Tipo de terreno:</label>
					      			<div class="radio">
					      				<label><input type="radio" name="radiotipoTerreno" value="ondulado" >Ondulado</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radiotipoTerreno" value="suave-ondulado">Suave-ondulado</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radiotipoTerreno" value="plano">Plano</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radiotipoTerreno" value="outrosTipoTerreno">Outros</label>
					      			</div>
					      		</div>
					      	</div>

					      	<div class="row">
					      		<div class="form-group col-sm-4">
					      			<label>Localização:</label> 
					      			<div class="radio">
					      				<label><input type="radio" name="radiolocalizacao" value="terraFirme">Terra Firme</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radiolocalizacao" value="varzea" >Várzea</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="radiolocalizacao" value="outros" >Outros</label>
					      			</div>
					      		</div>

					      		<div class="form-group col-sm-4">
					      			<label>Tipo de vegetação:</label> 
					      			<div class="radio">
					      				<label><input type="radio" name="tipoVegetacao" value="florestaPrimaria">Floresta primária</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="tipoVegetacao" value="capoeira">Capoeira</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="tipoVegetacao" value="plantacao">Plantação</label>
					      			</div>
					      			<div class="radio">
					      				<label><input type="radio" name="tipoVegetacao" value="outrosTipoVegetacao" >Outros</label>
					      			</div>
					      		</div>

					      		<div class="form-group col-sm-4">
					      			<label for="arvoresVizinhas" >Árvores vizinhas:</label>
					      			<textarea class="form-control" name="arvoresVizinhas" rows="5" id="arvoresVizinhas" minlength="1" 
					      			maxlength="255" required=""></textarea> 
					      		</div>	
					      	</div>
<!--
					      	<div class="row">
					      		<div class="form-group col-sm-12">
					      			<button type="submit" class="btn btn-primary">Adicionar</button>
					      		</div>
					      	</div>

					      </fieldset>
					
					
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Altura Total</th>
								<th>Altura Comercial</th>
								<th>DAP</th>
								<th>CAP</th>
								<th>GPS: X</th>
								<th>GPS: Y</th>
								<th>Colheita</th>
								<th>Solo</th>
								<th>Terreno</th>
								<th>Localização</th>
								<th>Vegetação</th>
								<th>Árvores Vizinhas</th>
							</tr>
						</thead>
						<tbody>
							-->
							<!--Exemplo-->
							<!--
							<tr>
								<td>1</td>
								<td>10</td>
								<td>25</td>
								<td>5</td>
								<td>5</td>
								<td>563838478353,9853</td>
								<td>563838478353,9853</td>
								<td>No chão</td>
								<td>Arenoso</td>
								<td>Plano</td>
								<td>Terra Firme</td>
								<td>Plantação</td>
								<td>Arvore 123 e arvore 345</td>
							</tr>
						</tbody>
					</table>
				-->

					<div class="row">
					      	<div class="form-group col-sm-12">
					      		<label for="obsColheita">Observação:</label>
					      		<textarea class="form-control" name="obsColheita" id="obsColheita" required=""></textarea> 
					      	</div>
					</div>
				<div class="row">
					<div class="form-group col-sm-12">
						<button type="submit" class="btn btn-primary">Voltar</button>
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>
				</div>
				</form>
			</section>
		<footer>

		</footer>
	</div>
</body>

</html>





