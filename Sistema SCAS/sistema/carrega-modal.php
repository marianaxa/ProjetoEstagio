<?php 

	$id = $_POST['id'];
	$user = $_POST['nome'];

 ?>

 <!-- Conteúdo -->
				<div class="container-fluid">
					<!-- mensagem -->
					<h4>Deseja realmente excluir o usuário <?php echo $user; ?> ?</h4>
					<br>
					<button type="button" class="btn btn-default " data-dismiss="modal">NÃO</button>  
					<a href="crud-usuario.php?acao=delete&id=<?php echo $id; ?>">
						<button class="btn btn" >SIM</button>
					</a>

				</div>