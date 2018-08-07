<?php 

require 'crud.php';
$colheita = new Crud();

$colheita->select("SELECT idcolheita, data, local, colhedores, nome_vulgar, observacoes_colheita FROM colheita, especie where especieFK=id_especie;");

require_once 'header.php';
?>


      <fieldset>
        <legend><h3>Lista de Colheitas</h3></legend>
       <!-- <button>Cadastrar</button> -->

        <div class="row">
          <div class="col-sm-2">
            <a href="cadastro-colheita.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar</button></a>
          </div>
          <div class="col-sm-6"></div>
          <div class="col-sm-4">
           <div class="form-group">
             <div class="input-group">
              <input type="text" class="form-control" id="myInput" onkeyup="BuscaLista()" placeholder="Pesquisar por data...">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

       
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-hover table-responsive" id="tabela">
              <thead>
                <tr>
                  <th scope="col">Código</th>
                  <th scope="col">Data</th>
                  <th scope="col">Espécie</th>
                  <th scope="col">Local</th>
                  <th scope="col">Colhedores</th>
                  <th scope="col">Observações</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>
                <!--Só um exemplo de conteudo-->
                <?php 
                if ($colheita->numRows() > 0) {
                  foreach ($colheita->result() as $colheita ){ ?>
                  <tr>
                    <th><?php echo $colheita['idcolheita']; ?></th>
                    <td><?php echo date('d-m-Y',strtotime($colheita['data'])); ?></td>
                    <td><?php echo $colheita['nome_vulgar']; ?></td>
                    <td><?php echo $colheita['local']; ?></td>
                    <td><?php echo $colheita['colhedores']; ?></td>
                    <td><?php echo $colheita['observacoes_colheita']; ?></td>
                    <td>
                      <a href="cadastro-lote-colhido.php?idcol=<?php echo $colheita['idcolheita']; ?>">
                        <button class="btn btn-info">Ver</button>
                      </a> 
                      <a href="editar-colheita.php?idcol=<?php echo $colheita['idcolheita']; ?>">
                        <button class="btn btn-primary">Editar</button>
                      </a> 
                      <button id="<?php echo $colheita['idcolheita'];?>" nome-vulgar="<?php echo $colheita['data']; ?>" class="btn btn-danger btn-modal-esp" data-toggle="modal" data-target="#modalExclusao">Excluir</button>
                    </td>
                  </tr>
                  <?php }
                } 

                ?>  
              </tbody>
            </table>
          </div>
        </div>
        <!--a janela do editar é igual do formulario com os dados carregados, e a de excluir so abre um modal perguntando
          se realmente deseja excluir (ainda acho essa opçcao meio perigosa, mas deixa ai kkk)-->
          <!--Fim do exemplo-->


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
          <div id="modalforn-php"></div>
      </div>
    </div>
  </div>
</div>