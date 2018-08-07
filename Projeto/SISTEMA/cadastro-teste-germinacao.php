<?php 
require_once 'header.php';
?>



<div class="container-fluid">
	<h2>Análise da Germinação</h2>
	
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">Dados Gerais</a></li>
		<li><a data-toggle="tab" href="#menu1">Dados Repetições</a></li>
		<li><a data-toggle="tab" href="#menu2">Dados Finais</a></li>
	</ul>

	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<h4>Dados Gerais</h4>
			<form name="formCardastroTesteGerminacao" id="formCardastroTesteGerminacao" method="get" action="#">	
				<div class="row">
					<div class="form-group col-sm-6">
						<label for="analistaTesteGerminacao">Analista:</label>
						<input type="text" class="form-control" name="analistaTesteGerminacao" id="analistaTesteGerminacao" required="">  
					</div>

					<div class="form-group col-sm-2">
						<label for="dataSemeadura">Data Semeadura:</label> 
						<input type="date" class="form-control" name="dataSemeadura" id="dataSemeadura" required="">
					</div>
				</div>

				<div class="row">
					<div class="form-group col-sm-4">
						<label for="temperatura">Temperatura ():</label>
						<input type="number" class="form-control" name="temperatura" id="temperatura" required="">
					</div>

					<div class="form-group col-sm-4">
						<label for="subtrato">Substrato:</label> <!--Talvez esse campo seja adicionado-->
						<input type="text" class="form-control" name="subtrato" id="subtrato" required="">
					</div>
				</div>


				<div class="row">
					<div class="form-group col-sm-4">
						<label for="numRepeticao">N° Sementes/Repetição:</label>
						<input type="number" class="form-control" name="numRepeticao"  id="numRepeticao" required="">
					</div>

					<div class="form-group col-sm-4">
						<label for="tratamento">Tratamento:</label>
						<input type="text" class="form-control" name="tratamento" id="tratamento" required="">
					</div>
				</div>
			</form>
			<button type="submit" class="btn btn-primary">Voltar</button>
			<button type="submit" class="btn btn-primary">Confirmar</button>

		</div>
		<div id="menu1" class="tab-pane fade">
			<h4>Dados Repetições</h4>
			<div class="row">
				<div class="form-group col-sm-8">

					<table  class="table table-hover">
						<thead>
							<tr>
								<th scope="col">N° de Dias da Semeadura</th>
								<th scope="col">Data</th>
								<th scope="col">R1</th>
								<th scope="col">R2</th>
								<th scope="col">R3</th>
								<th scope="col">R4</th>
								<th scope="col">R5</th>
								<th scope="col">R6</th>
								<th scope="col">R7</th>
								<th scope="col">R8</th>
								<th scope="col">Total</th>
								<th scope="col"><button class="btn btn-success btn-md" data-toggle="modal" data-target="#modalCampos"><span class="fa fa-plus-square-o"></span> Adicionar</button></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td>Total de Plântulas</td>
								<td></td>
								<td><input type="text" name="t"></td>
							</tr>
							<tr>
								<td>Plântulas Anormais</td>
							</tr>
							<td>Sementes Firmes</td>
							<tr>
								
							</tr>
						</tfoot>
						<tbody>
							<!--Só um exemplo de conteudo-->
							<tr>
								<td >N° do Cadinho</td>
								<td >Peso do Cadinho</td>
								<td >Peso Úmido</td>
								<td >Peso Seco</td>
								<td >Úmidade (%)</td>
								<td >Úmidade Média (%)</td>
								<td >Úmidade Média (%)</td>
								<td >Úmidade Média (%)</td>
								<td >Úmidade Média (%)</td>
								<td >Úmidade Média (%)</td>
							</tr>									
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="menu2" class="tab-pane fade">
			<h3>Dados Finais</h3>
			<div class="row">
				<div class="form-group col-sm-3">
					<label for="totalPlantulas">#</label>
				</div>
				<div class="form-group col-sm-1">
					<label for="totalPlantulas">R1</label>
				</div>
				<div class="form-group col-sm-1">
					<label for="plantulasAnormais">R2</label>
				</div>	
				<div class="form-group col-sm-1">
					<label for="plantulasAnormais">R3</label>
				</div>	
				<div class="form-group col-sm-1">
					<label for="plantulasAnormais">R4</label>
				</div>	
				<div class="form-group col-sm-1">
					<label for="plantulasAnormais">R5</label>
				</div>	
				<div class="form-group col-sm-1">
					<label for="plantulasAnormais">R6</label>
				</div>	
				<div class="form-group col-sm-1">
					<label for="plantulasAnormais">R7</label>
				</div>	
				<div class="form-group col-sm-1">
					<label for="plantulasAnormais">R8</label>
				</div>	
			</div>
			<div class="row">
				<div class="form-group col-sm-3">
					<div class="row">
						<label >Total de Plântulas</label>
						<br>
					</div>
					<div class="row">
						<label >Plântulas Anormais</label>
					</div>
					<div class="row">
						<label>Sementes Firmes</label>
					</div>
					<div class="row">
						<label >Sementes Mortas</label>
					</div>
					<div class="row">
						<label >Sementes Chocas</label>
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao1"  id="totalRrepeticao1" required="">
						<input type="number" class="form-control" name="plantulasAnormais1"  id="plantulasAnormais1" required="">
						<input type="number" class="form-control" name="sementesFirmes1"  id="sementesFirmes1" required="">
						<input type="number" class="form-control" name="sementesMortas1"  id="sementesMortas1" required="">
						<input type="number" class="form-control" name="sementesChocas1"  id="sementesChocas1" required="">
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao2"  id="totalRrepeticao2" required="">
						<input type="number" class="form-control" name="plantulasAnormais2"  id="plantulasAnormais2" required="">
						<input type="number" class="form-control" name="sementesFirmes2"  id="sementesFirmes1" required="">
						<input type="number" class="form-control" name="sementesMortas2"  id="sementesMortas2" required="">
						<input type="number" class="form-control" name="sementesChocas2"  id="sementesChocas2" required="">
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao3"  id="totalRrepeticao3" required="">
						<input type="number" class="form-control" name="plantulasAnormais3"  id="plantulasAnormais3" required="">
						<input type="number" class="form-control" name="sementesFirmes3"  id="sementesFirmes3" required="">
						<input type="number" class="form-control" name="sementesMortas3"  id="sementesMortas3" required="">
						<input type="number" class="form-control" name="sementesChocas3"  id="sementesChocas3" required="">
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao1"  id="totalRrepeticao1" required="">
						<input type="number" class="form-control" name="plantulasAnormais1"  id="plantulasAnormais1" required="">
						<input type="number" class="form-control" name="sementesFirmes1"  id="sementesFirmes1" required="">
						<input type="number" class="form-control" name="sementesMortas1"  id="sementesMortas1" required="">
						<input type="number" class="form-control" name="sementesChocas1"  id="sementesChocas1" required="">
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao1"  id="totalRrepeticao1" required="">
						<input type="number" class="form-control" name="plantulasAnormais1"  id="plantulasAnormais1" required="">
						<input type="number" class="form-control" name="sementesFirmes1"  id="sementesFirmes1" required="">
						<input type="number" class="form-control" name="sementesMortas1"  id="sementesMortas1" required="">
						<input type="number" class="form-control" name="sementesChocas1"  id="sementesChocas1" required="">
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao1"  id="totalRrepeticao1" required="">
						<input type="number" class="form-control" name="plantulasAnormais1"  id="plantulasAnormais1" required="">
						<input type="number" class="form-control" name="sementesFirmes1"  id="sementesFirmes1" required="">
						<input type="number" class="form-control" name="sementesMortas1"  id="sementesMortas1" required="">
						<input type="number" class="form-control" name="sementesChocas1"  id="sementesChocas1" required="">
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao1"  id="totalRrepeticao1" required="">
						<input type="number" class="form-control" name="plantulasAnormais1"  id="plantulasAnormais1" required="">
						<input type="number" class="form-control" name="sementesFirmes1"  id="sementesFirmes1" required="">
						<input type="number" class="form-control" name="sementesMortas1"  id="sementesMortas1" required="">
						<input type="number" class="form-control" name="sementesChocas1"  id="sementesChocas1" required="">
					</div>
				</div>
				<div class="form-group col-sm-1">
					<div class="input-group input-group-sm">
						<input type="number" class="form-control" name="totalRepeticao1"  id="totalRrepeticao1" required="">
						<input type="number" class="form-control" name="plantulasAnormais1"  id="plantulasAnormais1" required="">
						<input type="number" class="form-control" name="sementesFirmes1"  id="sementesFirmes1" required="">
						<input type="number" class="form-control" name="sementesMortas1"  id="sementesMortas1" required="">
						<input type="number" class="form-control" name="sementesChocas1"  id="sementesChocas1" required="">
					</div>
				</div>		
			</div> 

		</div>
		
	</div>
</div>
<!--
			<fieldset>
			
					<legend>Repetições</legend>

					



					<div class="row">
						<div class="form-group col-sm-4">
							<label for="totalPlantulas">Total de Plântulas</label>
							<input type="text" class="form-control" name="totalPlantulas" id="totalPlantulas" required="">
						</div>
						<div class="form-group col-sm-4">
							<label for="plantulasAnormais">Plântulas Anormais</label>
							<input type="text" class="form-control" name="plantulasAnormais" id="plantulasAnormais" required="">
						</div>	
					</div>

					<div class="row">
						<div class="form-group col-sm-4">
							<label for="sementesFirmes">Sementes Firmes</label>
							<input type="text" class="form-control" name="sementesFirmes" id="sementesFirmes" required="">
						</div>	
					</div>					

					<div class="row">
						<div class="form-group col-sm-4">
							<label for="sementesMortas">Sementes Mortas</label>
							<input type="text" class="form-control" name="sementesMortas" id="sementesMortas" required="">
						</div>	
					</div>	

					<div class="row">
						<div class="form-group col-sm-4">
							<label for="sementesChocas">Sementes Chocas</label>
							<input type="text" class="form-control" name="sementesChocas" id="sementesChocas" required="">
						</div>	
					</div>

				</form>


				<button type="submit" class="btn btn-primary">Voltar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>

			</fieldset>
		-->
		<?php
		require_once 'footer.php';

		?>

		<!-- Modal -->
		<div id="modalCampos" class="modal fade" role="dialog">
			<div class="modal-dialog modal-md">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Adicionar Campos</h4>
					</div>
					<div class="modal-body">
						
						<!-- Conteúdo -->
						<div class="container-fluid">
							<!-- Campos -->
							<div class="row">
								<div class="form-group col-sm-6">
									<label for="diaSemeadura">N° dias da semeadura</label>
									<input type="number" class="form-control" name="diaSemeadura" id="diaSemeadura" required="">
								</div>

								<div class="form-group col-sm-6">
									<label for="dataRepeticao">Data</label>
									<input type="date"  class="form-control" name="dataRepeticao" id="dataRepeticao" required="">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-6">
									<label for="repeticao1">R1</label>
									<input type="text" class="form-control" name="repeticao1" id="repeticao1" required="">
								</div>
								<div class="form-group col-sm-6">
									<label for="repeticao5">R5</label>
									<input type="text" class="form-control" name="repeticao5" id="repeticao5" required="">
								</div>
								
							</div>

							<div class="row">
								<div class="form-group col-sm-6">
									<label for="repeticao2">R2</label>
									<input type="text" class="form-control" name="repeticao2" id="repeticao2" required="">
								</div>
								<div class="form-group col-sm-6">
									<label for="repeticao6">R6</label>
									<input type="text" class="form-control" name="repeticao6" id="repeticao6" required="">
								</div>

							</div>

							<div class="row">
								<div class="form-group col-sm-6">
									<label for="repeticao3">R3</label>
									<input type="text" class="form-control" name="repeticao3" id="repeticao3" required="">
								</div>
								<div class="form-group col-sm-6">
									<label for="repeticao7">R7</label>
									<input type="text" class="form-control" name="repeticao7" id="repeticao7" required="">
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-6">
									<label for="repeticao4">R4</label>
									<input type="text" class="form-control" name="repeticao4" id="repeticao4" required="">
								</div>
								<div class="form-group col-sm-6">
									<label for="repeticao8">R8</label>
									<input type="text" class="form-control" name="repeticao8" id="repeticao8" required="">
								</div>
							</div>


							
						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Confirmar</button>
					</div>
				</div>

			</div>
		</div>


