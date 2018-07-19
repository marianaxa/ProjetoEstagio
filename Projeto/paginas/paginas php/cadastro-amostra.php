<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>CADASTRO DE AMOSTRAS</title>
	<meta charset="utf-8">
	<meta name="author" content="Mariana Fulano de Tal">
	<meta name="description" content="Descrição do seu Projeto">
	<meta name="keywords" content="Palavras chave do seu Projeto">
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
				<legend>CADASTRO DE AMOSTRAS</legend>

				<form name="formCardastroAmostra" id="formCardastroAmostra" method="get" action="#">
					<label for="loteOrigem">Lote de Origem:</label> 
					<input type="text" name="loteOrigem" id="loteOrigem" maxlength="5" minlength="1" placeholder="Ex.: 0Q1" required="">
					<button>buscar</button>
					<br>
					<br>
					<label for="especie">Especie:</label>
					<input type="text" name="especie" id="especie" required="">
					<label for="nomeCientifico">Nome Científico:</label>
					<input type="text" name="nomeCientifico" id="nomeCientifico" required="">
					<label for="familia">Familia:</label>
					<input type="text" name="familia" id="familia" required="">
					<button>buscar</button>
					<br>
					<br>
					<label for="condicaoArmazenamento">Condição de Armazenamento:</label>
					<input type="text" name="condicaoArmazenamento" id="condicaoArmazenamento" required="">
					<br>
					<br>
					<label for="dataImplatacao">Data Implantação:</label>
					<input type="date" name="dataImplatacao" id="dataImplatacao" required="">
					<br>
					<br>
					<input type="submit" value="Enviar"> 
				</form>
			</fieldset>
		</section>
		<footer>

		</footer>
	</div>
</body>

</html>





