<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>CADASTRO DE USUARIO</title>
	<meta charset="utf-8">
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
				<legend>Cadastro de Usuario</legend>

				<form name="formCardastroUsuario" id="formCardastroUsuario" method="get" action="#">
					<label for="nome">Nome:</label>
					<input type="text" name="nome" id="nome" maxlength="5" minlength="1" required="">
					<br>
					<br>
					<label for="funcao">Função:</label>
					<select>
						<option value="tecnico">Responsavel Técnico</option>
						<option value="secretaria">Secretaria</option>
						<option value="analista">Analista</option>
						<option value="controleQualidade">Controle de Qualidade</option>
						<!--nao sei sobre o admistrador se coloca aqui tbm-->
					</select>
					<br>
					<br>
					<label for="email">E-mail:</label>
					<input type="text" name="email" id="email" maxlength="5" minlength="1" required="">
					<br>
					<br>
					<label for="senha">Senha:</label>
					<input type="password" name="senha" id="senha" maxlength="5" minlength="1" required="">
					<br>
					<br>
					<label for="senhaConfirmacao">Confimar Senha:</label>
					<input type="password" name="senhaConfirmacao" id="senhaConfirmacao" maxlength="5" minlength="1" required="">
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





