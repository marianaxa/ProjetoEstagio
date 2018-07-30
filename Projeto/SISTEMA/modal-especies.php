<?php 

//require 'crud.php';
$especie = new Crud();

$especie->select("SELECT * FROM especie");
?>

<script>
 $('#tabela').find('input[name=optradio]').click(function(){
  var idradio = this.id;
  alert(idradio);
});

</script>
<!-- Modal -->
<div id="modal-especies" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Consultar Espécies</h4>
      </div>
      <div class="modal-body">
        
      	<!-- Conteúdo -->
      	<div class="container-fluid">
      		<!-- Barra de Navegação -->
      		<div class="row">
      			<div class="col-sm-8"></div>
      			<div class="col-sm-4">
      				<div class="form-group">
      					<div class="input-group">
      						<input type="text" class="form-control" name="idradio" placeholder="Pesquisar por espécie...">
      						<div class="input-group-btn">
      							<button class="btn btn-default" type="submit">
      								<i class="glyphicon glyphicon-search"></i>
      							</button>
      						</div>
      					</div>
      				</div>
      			</div>

       
      		<!-- Tabela com a Lista -->
        <table class="table table-hover table-responsive" id="tabela">
        	<thead>
        		<tr>
              <th>#</th>
        			<th>Código</th>
        			<th>Especie</th>
        			<th>Nome Científico</th>
        			<th>Familia</th>
        		</tr>
        	</thead>
        	<tbody>
            <!--Só um exemplo de conteudo-->
            <?php 
            if ($especie->numRows() > 0) {
              foreach ($especie->result() as $especie ){ ?>
              <tr>
                <td>                  
                 <input type="radio" name="optradio" onclick="document.getElementById('idradio').value = '<?php echo $especie['nome_vulgar']; ?>';" id="<?php echo $especie['id_especie'];?>" value="<?php echo $especie['id_especie'];?>">
               </td>
               <td  id="codigo"><?php echo $especie['id_especie']; ?></td>
               <td><?php echo $especie['nome_vulgar']; ?></td>
               <td><?php echo $especie['nome_cientifico']; ?></td>
               <td><?php echo $especie['familia']; ?></td>
             </tr>
             <?php 
           }
         } 
          $especie = null;
         ?>  
          </tbody>
    	</table>




      	</div>

      </div>
      <div class="modal-footer">
    
        <button type="button" class="btn btn-default btn-primary" data-dismiss="modal">Confirmar</button>
      </div>
    </div>

  </div>
</div>

