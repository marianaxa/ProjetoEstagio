<?php 
//conexao
require_once 'db_connect.php';

//sessao
session_start();

if(!isset($_SESSION['logado'])):
  header('Location: login.php');
endif;

require 'crud.php';
$colheita = new Crud();

$colheita->select("SELECT * FROM colheita");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Sistema Lasfac</title>

  <!-- BOOTSTRAP -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--EXCLUSAO-->
  <script src="scripts/scriptesp.js"></script>  

  <!-- FONTE AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

  <!-- CABEÇALHO -->
<header>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
          </button>
          <a class="navbar-brand" href="#">SCAS LASFAC</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="principal.php">Inicio</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="lista-lote.php">Lotes
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="cadastro-lote.php">Cadastrar Lote Recebido</a></li>
                  <li><a href="cadastro-colheita.php">Cadastrar Lote Colhido</a></li>
                  <li><a href="lista-lote.php">Lista de Lotes</a></li>
                  <li><a href="cadastro-especie.php">Cadastrar Especie</a></li>
                  <li><a href="lista-especie.php">Lista de Especies</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="lista-amotra.php">Amostras
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro-amostra.php">Cadastrar Amostra</a></li>
                    <li><a href="lista-amostra.php">Lista de Amostras</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Relatórios
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Página 1</a></li>
                    <li><a href="#">Página 2</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Documentos
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro-documento.php">Adicionar Documentos</a></li>
                    <li><a href="lista-documento.php">Lista de Documentos</a></li>
                  </ul>
                </li>
              </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="lista-usuario.php"><span class="glyphicon glyphicon-user"></span> Usuários</a></li><!--deixa aki entao pra ir pra uma tela q puxa a lista dos usuarios, mas esse campo so aparece se for no caso um usuario do tipo administrador-->
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

    <!-- Conteúdo da página -->
    <section class="container-fluid">
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
                    <td><?php echo $colheita['dataColheita']; ?></td>
                    <td><?php echo $colheita['localColheita']; ?></td>
                    <td><?php echo $colheita['colhedores']; ?></td>
                    <td><?php echo $colheita['obsColheita']; ?></td>
                    <td>
                      <a href="editar-colheita.php?idcol=<?php echo $colheita['idcolheita']; ?>">
                        <button class="btn btn-primary">Editar</button>
                      </a> 
                      <button id="<?php echo $colheita['idcolheita'];?>" nome-vulgar="<?php echo $colheita['dataColheita']; ?>" class="btn btn-danger btn-modal-esp" data-toggle="modal" data-target="#modalExclusao">Excluir</button>
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
    </section>

    <!-- Rodapé -->
    <footer>
      
    </footer>
  </div>
</body>
</html>

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