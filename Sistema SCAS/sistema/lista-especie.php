<?php 

require 'crud.php';
//$especie = new Crud();

//$especie->select("SELECT * FROM especie");

require_once 'header.php';
?>

<br>
<div class="container">
  <fieldset>
    <legend><h3>Lista de Espécies</h3></legend>
    <!-- <button>Cadastrar</button> -->

    <div class="row">
      <div class="col-sm-8"></div>
      <div class="col-sm-4">
       <div class="form-group">
         <div class="input-group">
          <input type="search" class="form-control light-table-filter" data-table="order-table" placeholder="Pesquisar" />
          <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
        </div>
      </div>
    </div>
  </div>
  <?php
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $pagina = 1;  
    listar($pagina);

  }else{
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    listar($pagina);
  }

  function listar($pagina){


    $especie = new Crud();
    $especie->select("SELECT * FROM especie");

        //Contar o total de empresas
    $total_especies = $especie->numRows();

        //Setar quantidade de empresas por pagina
    $qnt_result_pg = 25;

        //Calcular o inicio da visualização
    $inicio = ($qnt_result_pg*$pagina)-$qnt_result_pg;

        //Selecionar as empresas a serem apresentado na página
    $especie->select("SELECT * FROM especie LIMIT $inicio, $qnt_result_pg");      

    ?>
    <div class="row">
      <div class="col-sm-12">
        <table class="table order-table table-hover table-responsive" id="tabela">
          <thead>
            <tr>
              <th scope="col">Código</th>
              <th scope="col">Espécie</th>
              <th scope="col">Data Chegada</th>
              <th scope="col">Categoria</th>
              <th scope="col">Opções</th>
            </tr>
          </thead>
          <tbody>

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

                <?php
              }
            }   
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <?php

        //************* INICIO PAGINAÇÂO **************/
        //Qunatidade de paginas
    $quantidade_pg = ceil($total_especies / $qnt_result_pg);

        //Limite de link antes e depois 
    $MaxLinks = 2;

    ?>
    <nav aria-label="Navegação de página exemplo">
      <ul class="pagination justify-content-center">


        <li class="page-item">
          <?php echo "<a href='lista-especie.php?pagina=1'>Primeira</a> "; ?>
        </li>

        <li class="page-item">
          <?php
          for($iPag = $pagina - $MaxLinks; $iPag <= $pagina - 1; $iPag++){
            if($iPag >= 1){
              echo "<a href='lista-especie.php?pagina=$iPag'>$iPag</a> ";
            }
          }
          ?>
        </li>

        <li class="page-item ">
          <?php  echo "<a href='lista-especie.php?pagina=$pagina'>$pagina</a> "; ?>
        </li>

        <li class="page-item ">
          <?php
          for($dPag = $pagina + 1; $dPag <= $pagina + $MaxLinks; $dPag++){
            if($dPag <= $quantidade_pg){
              echo "<a href='lista-especie.php?pagina=$dPag'>$dPag</a> ";
            }
          }
          ?>
        </li>

        <li class="page-item ">
          <?php echo "<a href='lista-especie.php?pagina=$quantidade_pg'>Última</a>"; ?>
        </li>

      </ul>
    </nav>
    <?php
  }
  ?>
</fieldset> 
</div>
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