<?php 
	$id = $_POST['id'];
	$nomeFornecedor = $_POST['nome'];  
  $especie = $_POST['especie'];

?>
 <!-- Conteúdo -->
        <div class="container-fluid">
          <!-- mensagem -->
          <h4>Deseja realmente excluir o lote de <?php echo $especie; ?> fornecido por 
              <?php echo $nomeFornecedor; ?> ?</h4>
          <br>
          <button type="button" class="btn btn-default" data-dismiss="modal">NÃO</button>  

          <a href="crud-lote-recebido.php?acaoDEL=delete&id=<?php echo $id; ?>">
            <button class="btn btn" >SIM</button>
          </a>
        </div>
