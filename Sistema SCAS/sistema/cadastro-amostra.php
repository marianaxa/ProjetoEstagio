<?php 
//NAO FINALIZADA
require_once 'header.php';
require 'crud.php';
?>


<div style="padding: 30px">
	<fieldset style="padding: 10px">
		<legend align="center" style="width:70%;"><h3>Cadastro da Amostra</h3></legend>

		<form  name="formCardastroAmostra" id="formCardastroAmostra" method="POST" action="crud-amostra.php">
					<!--pra ficar td na msm linha tem q criar uma div como form group pra cada conjuntinho
						de laber e imput q vao ficar na msm linha, ai tem q por  a class control-label em cada label
						e o form-control em cada input-->

						<!--Primeira Linha-->
						<div class="row">
							<div class="form-group col-sm-2"></div>
							<div class="col-sm-4 ">
								<div class="form-group">
									<label for="loteOrigem">Lote de Origem:</label> 
									<div class="input-group">
										<input type="text" class="form-control" name="idlote" id="idlote" maxlength="5" minlength="1" placeholder="Pesquisar... " required="" readonly="">
										<div class="input-group-btn">
											<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-lotes">Pesquisar</button>
										</div>
									</div>
								</div>	
							</div>

							<div class="form-group col-sm-4 ">
								<label for="dataEntradaLoteOrigem">Data de entrada:</label> 
								<input type="date" class="form-control" name="dataEntradaLoteOrigem" id="dataEntradaLoteOrigem" maxlength="5" minlength="1" placeholder="Ex.: " required="" readonly="">
							</div>	

							<div class="form-group col-sm-2"></div>
						</div>

						<!-- Aki ele tem q carregar algumas informacoes do lote tipo, se foi colhido ou recebido e a especie-->
						
						<div class="row">
							<!--repetir  o esquema do lote de origem-->

							<div class="form-group col-sm-2"></div>
							<div class="form-group col-sm-2">
								<label  for="especie">Especie:</label>
								<input type="text"  class="form-control"  name="nome-vulgar" id="nome-vulgar" maxlength="30" minlength="1"  required="" readonly="">
							</div>
							<div class="form-group col-sm-3">							
								<label for="nomeCientifico">Nome Científico:</label>
								<input type="text"  class="form-control"  name="nome-cientifico"  maxlength="30" minlength="1" id="nome-cientifico"  Bactris gasipaes" required="" readonly="">
							</div>
							<div class="form-group col-sm-3">	
								<label for="familia">Familia:</label>
								<input type="text"  class="form-control"  name="familia"  maxlength="30" minlength="1" id="familia" required="" readonly="">
							</div>

							<div class="form-group col-sm-2"></div>
						</div>		

						<div class="row">

							<div class="form-group col-sm-2"></div>
							<div class="form-group col-sm-3">
								<label  for="amostrador">Amostrador:</label>
								<input type="text"  class="form-control"  name="amostrador" id="amostrador" required=""  placeholder="Ex.: Marilene ...">
							</div>
							
							<div class="form-group col-sm-3">
								<label for="renasemamostrador">Nº Renasem:</label>	
								<input type="text"  class="form-control"  name="renasemamostrador" maxlength="30" minlength="1" id="renasemamostrador" required=""  placeholder="Ex.: AC-00237/2017">
							</div>

							<div class="form-group col-sm-2">
								<label  for="dataImplatacao">Data Amostragem:</label>
								<input type="date"  class="form-control"  name="dataImplatacao" id="dataImplatacao" required="">
							</div>

							<div class="form-group col-sm-2"></div>
						</div>

						<div class="row">
							<div class="form-group col-sm-2"></div>

							<div class="form-group col-sm-3">
								<label for="condicaoArmazenamento">Condição de Armazenamento:</label>	
								<input type="text"  class="form-control"  name="condicaoArmazenamento" maxlength="30" minlength="1" id="condicaoArmazenamento" required="" placeholder="Ex.: Câmara Seca">
							</div>

							<div class="form-group col-sm-3">
								<label for="peneira">Peneira:</label>	
								<input type="text"  class="form-control"  name="peneira" maxlength="30" minlength="1" id="peneira" required="" placeholder="Ex.: -0-">
							</div>

							<div class="form-group col-sm-2">
								<label for="representatividade">Representatividade (Kg):</label>	
								<input type="text"  class="form-control"  name="representatividade" maxlength="30" minlength="1" id="representatividade" required="" placeholder="Ex.: 1,5">
							</div>

							<div class="form-group col-sm-2"></div>
						</div>
						<!--Fim terceira linha-->


						<div class="row" style="padding: 10px">
							
							<div class="form-group col-sm-5"></div>
							<!--
							<div class="form-group col-sm-1">
								<a href="principal.php"><button type="button" class="btn btn-primary" style=" min-width: 200px"><i class="fa fa-reply"></i> Voltar</button></a>
							</div>
							<div class="form-group col-sm-1"></div> 
						-->
						<div class="form-group col-sm-1">
							<button type="submit" name="acao" value="create" class="btn btn-success" style=" min-width: 200px">Confirmar</button>
						</div>
						<div class="form-group col-sm-4"></div>
					</div>

					<div class="row">
						<div class="form-group col-sm-4"></div>
					</div>
					<div class="row">
						<div class="form-group col-sm-1">
							<a href="principal.php"><button type="button" class="btn btn-basic" style="color: green; min-width: 90px"><i class="fa fa-reply"></i></button></a>
						</div>
					</div>
				</form>
			</fieldset>
		</div>
		<?php
		include('modal-lotes.php'); 
		require_once 'footer.php';

		?>