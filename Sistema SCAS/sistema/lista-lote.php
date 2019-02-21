<?php 

require 'crud.php';
$lote = new Crud();
//$lote->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar FROM lote, especie WHERE especieFK=id_especie");

require_once 'header.php';
?>


<br>
<div class="container">
	<fieldset> 
		<legend><h3>Lista de Lotes</h3></legend>
		<br>
		<div class="row">
			<!--
			<div class="col-sm-2">
				<a href="tipo-cadastro-lote.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar </button></a>
			</div>-->
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<div class="input-group">
						<input type="search" class="form-control light-table-filter" data-table="order-table" placeholder="Pesquisar" />
						<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
					</div>
				</div>
			</div>
		</div>
		<br>

		<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$pagina = 1;	
			listar($pagina);

		}else{
			$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
			listar($pagina);
		}

		function listar($pagina){

			$lote = new Crud();
			$lote->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar FROM lote, especie WHERE especieFK=id_especie");

				//Contar o total de empresas
			$total_lotes = $lote->numRows();

				//Setar quantidade de empresas por pagina
			$qnt_result_pg = 10;

				//Calcular o inicio da visualização
			$inicio = ($qnt_result_pg*$pagina)-$qnt_result_pg;

				//Selecionar as empresas a serem apresentado na página
			$lote->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar FROM lote, especie WHERE especieFK=id_especie LIMIT $inicio, $qnt_result_pg");			

			?>
			<div class="row">
				<div class="col-sm-12">
					<table class="table order-table table-hover table-responsive" id="tabela">
						<thead>
							<tr>
								<th scope="col">Código</th>
								<th scope="col">Espécie</th>
								<th scope="col">Data Chegada</th>
								<th scope="col">Categoria</th>
								<th scope="col">Opções</th>
							</tr>
						</thead>
						<tbody>

							<?php
							if ($lote->numRows() > 0) {
								foreach ($lote->result() as $lote ){ ?>
									<tr>
										<th><?php echo $lote['idlote_sementes']; ?></th>
										<td><?php echo $lote['nome_vulgar']; ?></td>
										<td><?php echo date('d-m-Y',strtotime($lote['data_chegada'])); ?></td>
										<td id="tipo" ><?php echo $lote['categoria']; ?></td>
										<td>
											<button  name="view" class="btn btn-success" onclick="document.getElementById('tipo').value = '<?php echo $lote['categoria']; ?>';" id="<?php echo $lote['idlote_sementes'];?>" value="<?php echo $lote['categoria'];?>"> Ver</button>

											<button  name="edit" class="btn btn-primary" onclick="document.getElementById('tipo').value = '<?php echo $lote['categoria']; ?>';" id="<?php echo $lote['idlote_sementes'];?>" value="<?php echo $lote['categoria'];?>"> Editar</button>

											<!--	<button  class="btn btn-danger ">Excluir</button> -->

										</td>
									</tr>

									<?php
								}
							} 	
							?>
						</tbody>
					</table>
				</div>
			</div>
			<?php

	//************* INICIO PAGINAÇÂO **************/
	//Qunatidade de paginas
			$quantidade_pg = ceil($total_lotes / $qnt_result_pg);

	//Limite de link antes e depois 
			$MaxLinks = 2;

			?>
			<nav aria-label="Navegação de página exemplo">
				<ul class="pagination justify-content-center">
					<li class="page-item">
						<?php	echo "<a href='lista-lote.php?pagina=1'>Primeira</a> "; ?>
					</li>
					<li class="page-item">
						<?php 
						for($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++){
							if($iPag >= 1){
								echo "<a href='lista-lote.php?pagina=$iPag'>$iPag</a> ";
							}
						}
						?>
					</li>
					<li class="page-item">
						<?php  echo "<a href='lista-lote.php?pagina=$pagina'>$pagina</a> "; ?>
					</li>
					<li class="page-item">
						<?php 
						for($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++){
							if($dPag <= $quantidade_pg){
								echo "<a href='lista-lote.php?pagina=$dPag'>$dPag</a> ";
							}
						}
						?>
					</li>
					<li class="page-item">
						<?php echo "<a href='lista-lote.php?pagina=$quantidade_pg'>Última</a>";?>
					</li>
					<?php
				}
				?>
			</fieldset>
		</div>
		<?php
		require_once 'footer.php';

		?>

		<script>
			$('#tabela').find('button[name=view]').click(function(){

				var categoria = this.value;
				var id= this.id;
				if(categoria == "fornecido"){
					window.location="ver-lote-recebido.php?idlote="+id;
				}else{
					window.location="ver-lote-colhido.php?idcol="+id;
				}
			});

			$('#tabela').find('button[name=edit]').click(function(){

				var categoria = this.value;
				var id= this.id;
				if(categoria == "fornecido"){
					window.location="editar-lote-recebido.php?idlote="+id;
				}else{
					window.location="editar-lote-colhido.php?idcol="+id;
				}
			});



			function BuscaLista() {
				var input, filter, table, tr, td, i;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				table = document.getElementById("tabela");
				tr = table.getElementsByTagName("tr");
				for (i = 0; i < tr.length; i++) {
					td = tr[i].getElementsByTagName("td")[0];
					if (td) {
						if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
							tr[i].style.display = "";
						} else {
							tr[i].style.display = "none";
						}
					}       
				}
			}




		</script>