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
				<legend>Cadastro Lote de Semente</legend>

				<form name="formCardastroLoteSemente" id="formCardastroLoteSemente" method="get" action="#">
					<fieldset>
					<label for="especie">Especie:</label> 
					<input type="text" name="especie" id="especie" required=""> <button>buscar</button>
      				<!-- quando clicar no buscar mostra uma lista, ou é melhor o auto complete ?-->
					<br>
					<br>
					<label for="quantidadeLote">Quantidade de Lotes:</label>
					<input type="text" name="quantidadeLote" id="quantidadeLote" required="">
					<br><br>
					<label for="dataChegada">Data Chegada:</label>
					<input type="data" name="dataChegada" id="dataChegada" required="">
      				<!-- o lote tbm pode ser colhod pelo laboratorio, mas por enquanto vamos deixar so como se ele recebesse,
     		       	para caso de sementes colhidas é outra forma de cadastro, pq tem q colocar quantidade de arvora, e tem um cadastro,
          			para cada arvore -->
          			</fieldset>					
					<br>
					<fieldset>
					<label for="fornecedor">Fornecedor:</label>
					<input type="text" name="fornecedor" id="fornecedor" required="">
					<br><br>
					<label for="numRenasem">N° Renasem:</label>
					<input type="text" name="numRenasem" id="numRenasem" required="">					
					<br><br>
					<label for="rua">Rua:</label>
					<input type="text" name="rua" id="rua" placeholder="Ex.: Rua Santo Antonio, n° 312" required="">
					<br><br>
					<label for="bairro">Bairro:</label>
					<input type="text" name="bairro" id="bairro" required="">
					<br><br>
					<label for="cidade">Cidade:</label>
					<input type="text" name="cidade" id="cidade" required="">
					
					<label for="estado">Estado:</label>
				      <select for="estado">
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
					</fieldset>
					<br>
					   <button type="submit" value="Submit" >Confirmar</button>
				</form>
			</fieldset>
		</section>
		<footer>

		</footer>
	</div>
</body>

</html>





