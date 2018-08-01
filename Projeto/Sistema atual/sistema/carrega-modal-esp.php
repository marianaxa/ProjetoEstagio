<?php 
	$id = $_POST['id'];
	$nomeVulgar = $_POST['nome'];
?>
 <!-- Conteúdo -->
        <div class="container-fluid">
          <!-- mensagem -->
          <h4>Deseja realmente excluir a espécie <?php echo $nomeVulgar; ?> ?</h4>
          <br>
          <button type="button" class="btn btn-default" data-dismiss="modal">NÃO</button>  

          <a href="crud-especie.php?acaoDEL=delete&id=<?php echo $id; ?>">
            <button class="btn btn" >SIM</button>
          </a>
        </div>
