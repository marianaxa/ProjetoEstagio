<?php 

require 'crud.php';
$usuario = new Crud();

//$usuario->select("SELECT * FROM usuario");
$usuario->select("SELECT idusuario, nome_usuario, email, nome_cat_usuario FROM usuario, categoria_usuario where categoriaUsuarioFK=idcat_usuario");

require_once 'header.php';
?>


<fieldset>
	<legend>Lista de Usuários</legend>
	<!--	<button>Cadastrar</button>	-->
	<div class="row">
		<div class="col-sm-2">
			<a href="cadastro-usuario.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar</button></a>
		</div>
		<div class="col-sm-6"></div>
		<div class="col-sm-4">
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control" id="myInput" onkeyup="BuscaLista()" placeholder="Pesquisar por nome da espécie...">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<table  class="table table-hover" id="tabela">
		<thead>
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Nome</th>
				<th scope="col">E-mail</th>
				<th scope="col">Função</th>
				<th scope="col">Opções</th>
				<th>
				</tr>
			</thead>
			<tbody>
				<!--Só um exemplo de conteudo-->
				<?php	
				if ($usuario->numRows() > 0) {
					foreach ($usuario->result() as $usuario ){ ?>
					<tr>
						<th name="id"><?php echo $usuario['idusuario']; ?></th>
						<td><?php echo $usuario['nome_usuario']; ?></td>
						<td><?php echo $usuario['email']; ?></th>
							<td><?php echo $usuario['nome_cat_usuario']; ?></td>
							<td>

								<a href="editar-usuario.php?id=<?php echo $usuario['idusuario']; ?>">
									<button class="btn btn-primary">Editar</button>
								</a>
								<button id="<?php echo $usuario['idusuario'];?>" nome-user="<?php echo $usuario['nome_usuario']; ?>" class="btn btn-danger btn-modal" data-toggle="modal" data-target="#modalExclusao">Excluir</button>
							</td>
						</tr>
						<?php }
					} 

					?>	
				</tbody>
			</table>
		</fieldset>
<?php
require_once 'footer.php';

?>

<script>
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

<!-- Modal EXCLUSAO-->
<div id="modalExclusao" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Confirmar Exclusão</h4>
			</div>
			<div class="modal-body">
				<div id="modal-php"></div>
			</div>
		</div>
	</div>
</div>







