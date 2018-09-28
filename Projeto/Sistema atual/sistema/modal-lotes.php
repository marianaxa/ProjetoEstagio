
<?php 
//NAO FINALIZADA
//require 'crud.php';

$lote = new Crud();
$loteselecionado = new Crud();

$lote->select("SELECT idlote_sementes, data_chegada, categoria, nome_vulgar FROM lote, especie WHERE especieFK=id_especie");
?>

<script>
 $('#tabela').find('input[name=optradio]').click(function(){
  var idradio = this.id;
  alert(idradio);
});

</script>
<!-- Modal -->
<div id="modal-lotes" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Consultar Lotes</h4>
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
      						<input type="text" class="form-control" name="idradio" placeholder="Pesquisar por fornecedor...">
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
        			<th>Categoria</th>
        		</tr>
        	</thead>
        	<tbody>
            <!--Só um exemplo de conteudo-->
           <?php 
            if ($lote->numRows() > 0) {
              foreach ($lote->result() as $lote ){ ?>
              <tr>
                <td>                  
                <!-- <input type="radio" name="idradiolote" onclick="document.getElementById('idradiolote').value = '<?php //echo $lote['idlote_sementes']; ?>';" id="<?php //echo $lote['idlote_sementes'];?>" value="<?php //echo $lote['idlote_sementes'];?>" nome-especie="<?php //echo $lote['nome_vulgar']; ?>">  -->

<!-- onclick
Id('idradiolote').value = $lote['idlote_sementes']
$lote['idlote_sementes']
$lote['nome_vulgar ']; --->

                <input type="radio" name="radiolote" id="<?php echo $lote['idlote_sementes']; ?>">






<!--

                  <a href="#"><button type="submit" name="linha" id="<?php //echo $lote['idlote_sementes'];?>" nome-especie="<?php //echo $lote['nome_vulgar']; ?>" data="<?php //echo date('d-m-Y',strtotime($lote['data_chegada'])); ?>" class="btn btn-primary"><span class="fa fa-hand-o-right"></span></button></a>
 -->              </td>
                <td><?php echo $lote['idlote_sementes']; ?></td>
                <td><?php echo $lote['nome_vulgar']; ?></td>
                <td><?php echo date('d-m-Y',strtotime($lote['data_chegada'])); ?></td>
                <td><?php echo $lote['categoria']; ?></td>
              </tr>

              <?php
            }
          } 
          $lote=null;
          ?>  
          </tbody>
    	</table>

      	</div>

      </div>
      <div class="modal-footer">
    
        <button type="button" class="btn btn-primary" data-dismiss="modal" >Confirmar</button>
      </div>
    </div>

  </div>
</div>

 <script>
        $('#tabela').find('button[name=confirm]').click(function(){

          var categoria = this.value;
          var id= this.id;



          
        });
</script>