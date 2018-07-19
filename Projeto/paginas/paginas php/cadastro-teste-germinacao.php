<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Sistema Lasfac</title>
</head>

<body>
	<div id="interface">
		<header>
			<nav>
				<ul>
					<li><a href="principal.html">Inicio</a> |</li>
					<li><a href="#">Amostras</a> |</li>
					<li><a href="#">Analises</a> |</li>
					<li><a href="#">Relatorios</a> |</li>
					<li><a href="#">Documentos</a> |</li>
					<li><a href="#">Sair</a></li>
				</ul>
			</nav>
		</header>
		<section>


			<fieldset>
				<legend>Teste de Germinação</legend>

				<form name="formCardastroTesteGerminacao" id="formCardastroTesteGerminacao" method="get" action="#">

					<label for="data">Data Semeadura:</label> 
					<input type="date" name="data" id="data" required="">
					<br><br>
					<label for="analistaTesteGerminacao">Analista:</label>
					<input type="text" name="analistaTesteGerminacao" id="analistaTesteGerminacao" required="">  
					<br><br>
					<label for="temperatura">Temperatura ():</label>
					<input type="number" name="temperatura" id="temperatura" required="">
					<br><br>
					<label for="subtrato">Substrato:</label> <!--Talvez esse campo seja adicionado-->
					<input type="text" name="subtrato" id="subtrato" required="">
					<br><br>
					<label for="numRepeticao">N° Sementes/Repetição:</label>
					<input type="number" name="numRepeticao"  id="numRepeticao" required="">
					<br><br>


				</form>

				<fieldset>
					<div>
						<button>Salvar</button> <!--Não sei se tem necessidade de ficar esse botao, mas deixei-->
					</div>
					<div>
						<table>
							<thead>
								<tr>
									<th>N° Dias da Semeadura</th>
									<th>Data</th>
									<th>R1</th>
									<th>R2</th>
									<th>R3</th>
									<th>R4</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<!--sem exemplo, nao tivemos acesso a uma ficha dessa preenchida-->
							</tbody>
						</table>
					</div>


				</fieldset>
				<br>
				<button type="submit" value="Submit" >Confirmar</button>

			</fieldset>
			</section>
		<footer>

		</footer>
	</div>
</body>

</html>





