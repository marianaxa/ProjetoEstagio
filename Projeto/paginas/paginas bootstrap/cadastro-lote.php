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
				<legend>Cadastro Lote de Semente</legend>

				<form name="formCardastroLoteSemente" id="formCardastroLoteSemente" method="get" action="#">


					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="especie">Especie:</label>
								<div class="input-group">
									<input type="text" class="form-control" name="especie" id="especie"  maxlength="30" minlength="1" required="">
									<div class="input-group-btn">
										<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEspecies">Pesquisar</button>
									</div>
									<!-- quando clicar no buscar mostra uma lista, ou é melhor o auto complete ?-->
								</div>
							</div>
						</div>						
					</div>

					<div  class="row">
						<div class="form-group col-sm-2">
							<label for="qtdLote">Quantidade de Lotes:</label>
							<input type="number" class="form-control" name="qtdLote" id="qtdLote"  min="1" required="">
						</div>

						<div class="form-group col-sm-2">
							<label for="dataChegada">Data Chegada:</label>
							<input type="date" class="form-control" name="dataChegada" id="dataChegada" required="">
      				<!-- o lote tbm pode ser colhod pelo laboratorio, mas por enquanto vamos deixar so como se ele recebesse,
     		       	para caso de sementes colhidas é outra forma de cadastro, pq tem q colocar quantidade de arvora, e tem um cadastro,
     		       	para cada arvore -->
     		       		</div>

     		       			
					</div>


					<legend>Dados Fornecedor</legend>

					<div class="row">
						<div class="form-group col-sm-8">
							<label for="fornecedor">Fornecedor:</label>
							<input type="text" class="form-control" name="fornecedor" id="fornecedor"  maxlength="50" minlength="1" required="">

						</div>
					</div>
<!--Talvez essas informações sejam irrelevantes para o sistema, renasem 
	     		   <div class="form-group col-md-8">	     		   
		     		   	<label for="numRenasem">N° Renasem:</label>
		     		   	<input type="text" class="form-control" name="numRenasem" id="numRenasem"  maxlength="10" minlength="1" required="">					
	     		   </div>
	     		-->
	     		<!--Fim reansem-->
	     		<!--Talvez essas informações sejam irrelevantes para o sistema-->

	     		<div  class="row">
	     			<div class="form-group col-sm-8">	
	     				<label for="rua">Rua:</label>
	     				<input type="text" class="form-control" name="rua" id="rua" placeholder="Ex.: Rua Santo Antonio, n° 312"  maxlength="100" minlength="2" required="">
	     			</div>

	     			<div class="form-group col-sm-2">	
	     				<label for="cep">CEP:</label>
	     				<input type="text" class="form-control" name="cep" id="cep" maxlength="100" minlength="2" required="">
	     			</div>
	     		</div>

	     		<div  class="row">
	     			<div class="form-group col-sm-5">
	     				<label for="bairro">Bairro:</label>
	     				<input type="text" class="form-control" name="bairro" id="bairro" required="">
	     			</div>

	     			<div class="form-group col-sm-5">
	     				<label for="cidade">Cidade:</label>
	     				<input type="text" class="form-control" name="cidade" id="cidade" required="">
	     			</div>

	     			<div class="form-group col-sm-2">
	     				<label for="estado">Estado:</label>
	     				<select class="form-control" for="estado">
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
	     					<option value="PR">PR</option>
	     					<option value="PE">PE</option>
	     					<option value="RJ">RJ</option>
	     					<option value="PI">PI</option>
	     					<option value="RN">RN</option>
	     					<option value="RS">RS</option>
	     					<option value="RO">RO</option>
	     					<option value="SC">SC</option>
	     					<option value="RR">RR</option>
	     					<option value="SP">SP</option>
	     					<option value="SE">SE</option>
	     					<option value="TO">TO</option>
	     				</select>
	     			</div>
	     		</div>
	     		<!--Fim informações-->
	     	

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

<!-- Modal -->
<div id="modalEspecies" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Consultar Espécies</h4>
      </div>
      <div class="modal-body">
        
      	<!-- Conteúdo -->
      	<div class="container-fluid">
      		<!-- Barra de Navegação -->
      		<div class="row">
      			<div class="col-sm-12">
      				<div class="form-group">
      					<div class="input-group">
      						<input type="text" class="form-control" placeholder="Pesquisar por espécie...">
      						<div class="input-group-btn">
      							<button class="btn btn-default" type="submit">
      								<i class="glyphicon glyphicon-search"></i>
      							</button>
      						</div>
      					</div>
      				</div>
      			</div>

       
      		<!-- Tabela com a Lista -->
        <table class="table table-hover table-responsive">
        	<thead>
        		<tr>
        			<th>Código</th>
        			<th>Especie</th>
        			<th>Nome Científico</th>
        			<th>Familia</th>
        		</tr>
        	</thead>
        	<tbody>
        		<tr>
        			<th>001</th>
        			<td>pupunha</td>
        			<td>pupunha cientifico</td>
        			<td>Arecaceae</td>
        		</tr>
        	</tbody>
    	</table>


      		<!-- Páginação -->
      		<div class="row">
      			<div class="col-sm-6"></div>
      			
      			<div class="col-sm-6">
      				<nav aria-label="Page navigation">
      					<ul class="pagination">
      						<li>
      							<a href="#" aria-label="Previous">
      								<span aria-hidden="true">&laquo;</span>
      							</a>
      						</li>
      						<li><a href="#">1</a></li>
      						<li><a href="#">2</a></li>
      						<li><a href="#">3</a></li>
      						<li><a href="#">4</a></li>
      						<li><a href="#">5</a></li>
      						<li>
      							<a href="#" aria-label="Next">
      								<span aria-hidden="true">&raquo;</span>
      							</a>
      						</li>
      					</ul>
      				</div>
      			</div>

      	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>





