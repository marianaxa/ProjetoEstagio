<?php 

//require 'crud.php';
$colheita = new Crud();

$colheita->select("SELECT idcolheita, data,  nome_vulgar, local, gpsX, gpsY FROM colheita, arvore, especie where especieFK=id_especie and arvore_colheitaFK=idarvores");
?>

<script>
 $('#tabela').find('input[name=optradio]').click(function(){
  var idradio = this.id;
  alert(idradio);
});

</script>
<!-- Modal -->
<div id="modal-colheita" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Consultar Colheita</h4>
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
      						<input type="text" class="form-control" name="idradio" placeholder="Pesquisar por codigo...">
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
        			<th>Data</th>
        			<th>Local</th>
              <th>GPS: X:</th>
              <th>Y:</th>
        		</tr>
        	</thead>
        	<tbody>
            <!--Só um exemplo de conteudo-->
            <?php 
            if ($colheita->numRows() > 0) {
              foreach ($colheita->result() as $colheita ){ ?>
              <tr>
                <td>                  
                 <input type="checkbox" name="check" id="idcheck">
               </td>
               <td  id="codigo"><?php echo $colheita['idcolheita']; ?></td>
               <td><?php echo $colheita['nome_vulgar']; ?></td>
               <td><?php echo $colheita['data']; ?></td>
               <td><?php echo $colheita['local']; ?></td>
               <td><?php echo $colheita['gpsX']; ?></td>
               <td><?php echo $colheita['gpsY']; ?></td>

             </tr>
             <?php 
           }
         } 
          $colheita = null;
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