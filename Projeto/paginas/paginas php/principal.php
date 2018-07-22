<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title>Sistema Lasfac</title>
	
	<meta name="author" content="Mariana Fulano de Tal">
	<meta name="description" content="Descrição do seu Projeto">
	<meta name="keywords" content="Palavras chave do seu Projeto">
</head>

<body>
	<div id="interface">
		<!-- Cabeçalho -->
		<header>
			<h1>LASFAC</h1>
			<nav>
				<ul>
					<li><a href="principal.php">Inicio</a> |</li>
					<li><a href="#">Amostras</a> |</li>
					<li><a href="#">Analises</a> |</li>
					<li><a href="#">Relatorios</a> |</li>
					<li><a href="#">Documentos</a> |</li>
					<li><a href="#">Sair</a></li>
				</ul>
			</nav>
		</header>

		<!-- Conteúdo da página -->
		<section>
			<table>
				<tr>
					<th>QTD Amostras</th>
					<th>QTD Analises</th>
					<th>QTD Relatorios</th>
				</tr>
			</table>

			<table>
				<tr>
					<!-- cadastro-lote.html ou .php??? -->
					<th><button type="button" onClick=window.open("cadastro-lote.html")>Cadastrar Lote</button></th>
					<!-- lista-lote.html ou .php??? -->
					<th><button type="button" onClick=window.open("lista-lote.html")>Lista de Lotes</button></th>
					<th><button>Gerar Relatorios</button></th>
				</tr>
				<tr>
					<th><button>Iniciar Analise</button></th>
					<th><button>Lista de Analises</button></th>
					<th><button>Documentos</button></th>
				</tr>
			</table>
		</section>

		<!-- Rodapé -->
		<footer>

		</footer>
	</div>
</body>
</html>