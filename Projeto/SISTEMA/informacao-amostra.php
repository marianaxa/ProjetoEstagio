<?php 
require_once 'header.php';

?>

<fieldset>
	<legend>Dados da Amostra <label>021</label></legend>
	<!--	<button>Cadastrar</button>	-->


	<div class="row">
		<div class="col-sm-3 ">
			<div class="form-group">
				<label for="loteOrigem">Lote de Origem:</label> 
				<input type="text" class="form-control" name="loteOrigem" id="loteOrigem" maxlength="5" minlength="1" disabled="true">
			</div>
		</div>
		<div class="form-group col-sm-2 ">
			<label for="dataEntradaLoteOrigem">Data de entrada:</label> 
			<input type="text" class="form-control" name="dataEntradaLoteOrigem" id="dataEntradaLoteOrigem" maxlength="5" minlength="1" disabled="tr">
		</div>
		<div class="form-group col-sm-3 ">
			<label for="categoria">Categoria:</label> <!-- fornecido ou colhido -->
			<input type="text" class="form-control" name="categoria" id="categoria" maxlength="5" minlength="1" disabled="">
		</div>	
	</div>

	<div class="row">
		<div class="form-group col-sm-3">
			<label  for="especie">Especie:</label>
			<input type="text"  class="form-control"  name="especie" id="especie" maxlength="30" minlength="1" disabled="true">
		</div>
		<div class="form-group col-sm-3">							
			<label for="nomeCientifico">Nome Científico:</label>
			<input type="text"  class="form-control"  name="nomeCientifico"  maxlength="30" minlength="1" id="nomeCientifico"  disabled="true">
		</div>
		<div class="form-group col-sm-2">	
			<label for="familia">Familia:</label>
			<input type="text"  class="form-control"  name="familia"  maxlength="30" minlength="1" id="familia"    disabled="true">
		</div>
	</div>		

	<div class="row">
		<div class="form-group col-sm-4">
			<label for="condicaoArmazenamento">Condição de Armazenamento:</label>	
			<input type="text"  class="form-control"  name="condicaoArmazenamento" maxlength="30" minlength="1" id="condicaoArmazenamento"  disabled="true">
		</div>

		<div class="form-group col-sm-4">
			<label  for="dataImplatacao">Data Implantação:</label>
			<input type="date"  class="form-control"  name="dataImplatacao" id="dataImplatacao"  disabled="true">
		</div>
	</div>

	<fieldset>
		<legend>Análises</legend>

		<div class="row">
			<div class="form-group col-sm-7">
				<label><h4>Teor de Água</h4></label> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm-8">

				<table  class="table table-hover">
					<thead>
						<tr>
							<th scope="col">N° do Cadinho</th>
							<th scope="col">Peso do Cadinho</th>
							<th scope="col">Peso Úmido</th>
							<th scope="col">Peso Seco</th>
							<th scope="col">Úmidade (%)</th>
							<th scope="col">Úmidade Média (%)</th>
							<th scope="col"><a href="cadastro-teste-umidade.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar</button></a></th>
						</tr>
					</thead>
					<tbody>
						<!--Só um exemplo de conteudo-->
						<tr>
							<td >N° do Cadinho</td>
							<td >Peso do Cadinho</td>
							<td >Peso Úmido</td>
							<td >Peso Seco</td>
							<td >Úmidade (%)</td>
							<td >Úmidade Média (%)</td>
						</tr>
						<tr>
							<td >N° do Cadinho</td>
							<td >Peso do Cadinho</td>
							<td >Peso Úmido</td>
							<td >Peso Seco</td>
							<td >Úmidade (%)</td>
							<td >Úmidade Média (%)</td>
						</tr>										
					</tbody>
				</table>
			</div>
		</div>
		<hr>

		<div class="row">
			<div class="form-group col-sm-7">
				<label><h4>Num. Sementes</h4></label> 
			</div>
		</div>
		<div class="row">
			<div class="form-group col-sm-8">
				<table  class="table table-hover">
					<thead>
						<tr>
							<th scope="col">N° de Sementes</th>
							<th scope="col">Peso da Amostra</th>
							<th scope="col">N° Sementes (KH)</th>
							<th scope="col"><a href="cadastro-teste-num-sementes.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar</button></a>
								<th>
								</thead>
								<tbody>
									<!--Só um exemplo de conteudo-->
									<tr>
										<td>N° de Sementes</td>
										<td>Peso da Amostra</td>
										<td >N° Sementes (KH)</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="form-group col-sm-7">
							<label><h4>Teste Germinação</h4></label> 
						</div>
					</div>	
					<div class="row">
						<div class="form-group col-sm-8">
							<table  class="table table-hover">
								<thead>
									<tr>
										<th scope="col">N° dia da semeadura</th>
										<th scope="col">Data</th>
										<th scope="col">R1</th>
										<th scope="col">R2</th>
										<th scope="col">R3</th>
										<th scope="col">R4</th>
										<th scope="col">Total</th>
										<th scope="col"><a href="cadastro-teste-germinacao.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar</button></a></th>
									</tr>
								</thead>
								<tbody>
									<!--Só um exemplo de conteudo-->
									<tr>
										<th>teste</th>
										<td>teste</td>
										<td>teste</th>
											<td>teste</td>
											<td>teste</th>
												<td>teste</td>
												<td>teste</td>
											</tbody>
										</table>
									</div>
								</div>	

								<hr>

								<div class="row">
									<div class="form-group col-sm-7">
										<label><h4>Teste de Pureza</h4></label> 
									</div>
								</div>
								<div class="row">
									<div class="form-group col-sm-8">
										<table  class="table table-hover">
											<thead>
												<tr>
													<th scope="col">Código</th>
													<th scope="col">Nome</th>
													<th scope="col">E-mail</th>
													<th scope="col">Função</th>
													<th scope="col"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar</button></th>
												</tr>
											</thead>
											<tbody>
												<!--Só um exemplo de conteudo-->
												<tr>
													<th>001</th>
													<td>Mariana</td>
													<td>mxa234@gmail.com</th>
														<td>Administrador</td>	
													</tr>
												</tbody>
											</table>
										</div>
									</div>							
								</fieldset>					
	</fieldset>

<?php
require_once 'footer.php';

?>





