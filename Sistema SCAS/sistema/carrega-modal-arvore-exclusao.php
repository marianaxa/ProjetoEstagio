<?php 

	$id = $_POST['id'];

 ?>

 <!-- Conteúdo -->
				<div class="container-fluid">
					<!-- mensagem -->
					<h4>Deseja realmente excluir esta árvore ?</h4>
					<br>
					<button type="button" class="btn btn-default " data-dismiss="modal">NÃO</button>  

					<a href="crud-exclusao.php?acao=deleteArv&idarv=<?php echo $id; ?>">
						<button class="btn btn" >SIM</button>
					</a>

				</div>