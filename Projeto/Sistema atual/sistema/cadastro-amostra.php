<?php 
//NAO FINALIZADA
require_once 'header.php';
require 'crud.php';
?>


<fieldset>
	<legend>Cadastro de Amostras</legend>

	<form  name="formCardastroAmostra" id="formCardastroAmostra" method="POST" action="crud-amostra.php">
					<!--pra ficar td na msm linha tem q criar uma div como form group pra cada conjuntinho
						de laber e imput q vao ficar na msm linha, ai tem q por  a class control-label em cada label
						e o form-control em cada input-->

						<!--Primeira Linha-->
						<div class="row">
							<div class="col-sm-4 ">
								<div class="form-group">
									<label for="loteOrigem">Lote de Origem:</label> 
									<div class="input-group">
										<input type="text" class="form-control" name="idlote" id="idlote" maxlength="5" minlength="1" placeholder="Pesquisar... " required="" readonly="">
										<div class="input-group-btn">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lotes">Pesquisar</button>
										</div>
									</div>
								</div>	
							</div>

							<div class="form-group col-sm-2 ">
								<label for="dataEntradaLoteOrigem">Data de entrada:</label> 
								<input type="date" class="form-control" name="dataEntradaLoteOrigem" id="dataEntradaLoteOrigem" maxlength="5" minlength="1" placeholder="Ex.: " required="" readonly="">
							</div>	

						</div>

						<!-- Aki ele tem q carregar algumas informacoes do lote tipo, se foi colhido ou recebido e a especie-->
						
						<div class="row">
							<!--repetir  o esquema do lote de origem-->
							<div class="form-group col-sm-2">
								<label  for="especie">Especie:</label>
								<input type="text"  class="form-control"  name="nome-vulgar" id="nome-vulgar" maxlength="30" minlength="1" placeholder="Ex.: Pupunha" required="" readonly="">
							</div>
							<div class="form-group col-sm-2">							
								<label for="nomeCientifico">Nome Científico:</label>
								<input type="text"  class="form-control"  name="nome-cientifico"  maxlength="30" minlength="1" id="nome-cientifico" placeholder="Ex.: Bactris gasipaes" required="" readonly="">
							</div>
							<div class="form-group col-sm-2">	
								<label for="familia">Familia:</label>
								<input type="text"  class="form-control"  name="familia"  maxlength="30" minlength="1" id="familia"   placeholder="Ex.: Arecaceae" required="" readonly="">
							</div>
						</div>		

						<div class="row">
							<div class="form-group col-sm-2">
								<label  for="amostrador">Amostrador:</label>
								<input type="text"  class="form-control"  name="amostrador" id="amostrador" required="">
							</div>
							
							<div class="form-group col-sm-2">
								<label for="condicaoArmazenamento">Condição de Armazenamento:</label>	
								<input type="text"  class="form-control"  name="condicaoArmazenamento" maxlength="30" minlength="1" id="condicaoArmazenamento" required="">
							</div>

							<div class="form-group col-sm-2">
								<label  for="dataImplatacao">Data Implantação:</label>
								<input type="date"  class="form-control"  name="dataImplatacao" id="dataImplatacao" required="">
							</div>

						</div>
						<!--Fim terceira linha-->

					</div>
					<div class="row">
						<div class="form-group col-sm-6">
							<button type="submit" class="btn btn-primary">Voltar</button>
							<button type="submit" name="acao" value="create" class="btn btn-primary">Confirmar</button>
						</div>
					</div>
				</form>
			</fieldset>
			<?php
			include('modal-lotes.php'); 
			require_once 'footer.php';

			?>