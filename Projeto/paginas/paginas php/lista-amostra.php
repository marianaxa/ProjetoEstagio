<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sistema Lasfac</title>
</head>

<body>
	<div id="interface">
		<header>
			<nav>
				<ul>
					<li><a href="principal.html">Inicio</a></li>
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
				<div>
					<button>Cadastrar</button>
				</div>
				<div>
					<table>
						<thead>
							<tr>
								<th>Código</th>
								<th>Espécie</th>
								<th>Condição Armazenamento</th>
								<th>Data Implantação</th>
								<th>Categoria</th>
								<th>Analises</th>
								<th>Opções</th>
							</tr>
						</thead>
						<tbody>
							<!--Só um exemplo de conteudo-->
							<tr>
								<th>001</th>
								<th>pupunha</th>
								<th>Estufa</th>
								<th>13/07/2018</th>
								<th>fornecida</th>
								<th><button>Umidade</button>|<button>Num. Sementes</button>|<button>Pureza</button>|<button>Germinação</button></th>
            					<!--Aqui fica mais simbolos dos testes,ou algo q fosse tipo, ao clicar vai pro cadastro do teste em questao,
            							e depois aki sinalizasse, o que ja foi "concluido" -->
            					<th><button>Editar</button>|<button>Excluir</button></th>
           					 </tr>
          						<!--a janela do editar é igual do formulario com os dados carregados, e a de excluir so abre um moral perguntando se realmente deseja excluir (ainda acho essa opçcao meio perigosa, mas deixa ai kkk)-->
          				<!--Fim do exemplo-->
          				</tbody>
      				</table>
  				</div>
			</fieldset>
		</section>

		<footer>

		</footer>
	</div>
</body>
</html>