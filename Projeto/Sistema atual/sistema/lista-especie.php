<?php 

require 'crud.php';
$especie = new Crud();

$especie->select("SELECT * FROM especie");

require_once 'header.php';
?>


<fieldset>
  <legend><h3>Lista de Espécies</h3></legend>
  <!-- <button>Cadastrar</button> -->

  <div class="row">
    <div class="col-sm-2">
      <a href="cadastro-especie.php"><button class="btn btn-success btn-md"><span class="fa fa-plus-square-o"></span> Adicionar </button></a>
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


<div class="row">
  <div class="col-sm-12">
    <table class="table table-hover table-responsive" id="tabela">
      <thead>
        <tr>
          <th scope="col">Código</th>
          <th scope="col">Espécie</th>
          <th scope="col">Nome Científico</th>
          <th scope="col">Familia</th>
          <th scope="col">Opções</th>
        </tr>
      </thead>
      <tbody>
        <!--Só um exemplo de conteudo-->
        <?php 
        if ($especie->numRows() > 0) {
          foreach ($especie->result() as $especie ){ ?>
          <tr>
            <th><?php echo $especie['id_especie']; ?></th>
            <td><?php echo $especie['nome_vulgar']; ?></td>
            <td><?php echo $especie['nome_cientifico']; ?></td>
            <td><?php echo $especie['familia']; ?></td>
            <td>
              <a href="editar-especie.php?idesp=<?php echo $especie['id_especie']; ?>">
                <button class="btn btn-primary">Editar</button>
              </a> 
                      <!--
                      <button id="<?php echo $especie['id_especie'];?>" nome-vulgar="<?php echo $especie['nome_vulgar']; ?>" class="btn btn-danger btn-modal-esp" data-toggle="modal" data-target="#modalExclusao">Excluir</button>
                    -->
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