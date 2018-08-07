<?php 

require 'crud.php';
$lote = new Crud();
$lote->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar FROM lote, especie WHERE especieFK=id_especie");

require_once 'header.php';
?>


<div class="container">
	<fieldset> 
		<legend><h3>Lista de Lotes</h3></legend>
<br>
		<div class="row">
			<div class="col-sm-2">
				<a href="tipo-cadastro-lote.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar </button></a>
			</div>
			<div class="col-sm-6"></div>
			<div class="col-sm-4">
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" id="myInput" onkeyup="BuscaLista()" placeholder="Buscar por nome da espécie. Ex: Pupunha">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
<br>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-hover" id="tabela">
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
						<!--Só um exemplo de conteudo-->
						<?php 
						if ($lote->numRows() > 0) {
							foreach ($lote->result() as $lote ){ ?>
							<tr>
								<th><?php echo $lote['idlote_sementes']; ?></th>
								<td><?php echo $lote['nome_vulgar']; ?></td>
								<td><?php echo date('d-m-Y',strtotime($lote['data_chegada'])); ?></td>
								<td id="tipo" ><?php echo $lote['categoria']; ?></td>
								<td>
									<button  name="view" class="btn btn-info" onclick="document.getElementById('tipo').value = '<?php echo $lote['categoria']; ?>';" id="<?php echo $lote['idlote_sementes'];?>" value="<?php echo $lote['categoria'];?>"> Ver</button>

									<button  name="edit" class="btn btn-primary" onclick="document.getElementById('tipo').value = '<?php echo $lote['categoria']; ?>';" id="<?php echo $lote['idlote_sementes'];?>" value="<?php echo $lote['categoria'];?>"> Editar</button>

								<!--	<button  class="btn btn-danger ">Excluir</button> -->
	
								</td>
							</tr>

							<?php
						}
					} 
					?>  
          				<!--a janela do editar é igual do formulario com os dados carregados, e a de excluir so abre um moral perguntando
          					se realmente deseja excluir (ainda acho essa opçcao meio perigosa, mas deixa ai)-->
          					<!--Fim do exemplo-->
          				</tbody>
          			</table>
          		</div>
          	</div>

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
      			window.location="cadastro-lote-colhido.php?idcol="+id;
      		}
      	});

      	$('#tabela').find('button[name=edit]').click(function(){

      		var categoria = this.value;
      		var id= this.id;
      		if(categoria == "fornecido"){
      			window.location="editar-lote-recebido.php?idlote="+id;
      		}else{
      			window.location="#"+id;
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