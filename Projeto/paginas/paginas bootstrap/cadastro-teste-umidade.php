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
          <a class="navbar-brand" href="#">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="principal.php">Inicio</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="lista-lote.php">Lotes
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="cadastro-lote.php">Cadastrar Lote</a></li>
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


    <!-- a parte do formulario -->
    <section>
      <fieldset>
        <legend>Teor de Água</legend>
         <!--Essas informações talvez sejam cadastradas uma unica vez -->
        <form name="formTesteTeorAgua" id="formTesteTeorAgua" method="get" action="#">


          <div class="form-row">
            <div class="form-group col-md-12">
              <div class="form-group col-md-8">
                <label for="analistaTesteTeorAgua">Analista:</label>
                <input type="text" class="form-control" name="analistaTesteTeorAgua" id="analistaTesteTeorAgua" required="">  
              </div>
              <div class="form-group col-md-2">
                <label for="dataTesteTeorAgua">Data de realização do teste:</label> 
                <input type="date" class="form-control" name="dataTesteTeorAgua" id="dataTesteTeorAgua" required="">
              </div>
            </div>
          </div>
          


          <!--Esses cadastros sao varios, é tipo uma tabelinha-->
          <div class="form-row">
            <div class="form-group col-md-12">
              <div class="form-group col-md-1">
                <label for="numCadinho">N° Cadinho:</label>
                <input type="number" class="form-control" name="numCadinho" id="numCadinho" required="">
              </div>

              <div class="form-group col-md-2">
                <label for="pesoCadinho">Peso do Cadinho:</label>
                <input type="number" class="form-control" name="pesoCadinho" id="pesoCadinho" required=""> 
              </div>

              <!--D nao tenho 100% certeza se vai aceitar virgula e "salvar certo"-->
              <div class="form-group col-md-2">
                <label for="pesoUmido">Peso Úmido:</label> 
                <input type="number" class="form-control" name="pesoUmido" id="pesoUmido" required="">
              </div>

              <div class="form-group col-md-2">
                <label for="pesoSeco">Peso Seco:</label>      
                <input type="number" class="form-control" name="pesoSeco" id="pesoSeco" required="">
              </div>

              <div class="form-group col-md-2">
                <label for="umidade">Umidade (%):</label>
                <input type="number" class="form-control" name="umidade" id="umidade" required="">
              </div>

              <div class="form-group col-md-2">
                <label for="umidadeMedia">Umidade Média (%):</label>
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <input type="number" class="form-control" name="umidadeMedia" id="umidadeMedia" required="">
                  </div>
                  <div class="form-group col-md-1">
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                  </div>
                </div>
              </div>

            </div>
          </div>

         
          <table class="table table-hover">
            <thead>
              <tr>
                <th>N° Cadinho</th>
                <th>Peso do Cadinho</th>
                <th>Peso Úmido</th>
                <th>Peso Seco</th>
                <th>Umidade (%)</th>
                <th>Umidade Média (%)</th>
              </tr>
            </thead>
            <tbody>
              <!--Exemplo-->
              <tr>
                <td>1</td>
                <td>10</td>
                <td>20</td>
                <td>5</td>
                <td>80</td>
                <td>75</td>
              </tr>
            </tbody>
          </table>


          <div class="form-group col-md-8">
          <label for="obsTesteUmidade">Observação</label>
          <textarea  class="form-control" rows="5" name="obsTesteUmidade" id="obsTesteUmidade"></textarea>
          </div>

          
            <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Voltar</button>
              <button type="submit" class="btn btn-primary">Confirmar</button>
            </div>
         
        </form>
      </fieldset>
    </section>
    <footer>
      
    </footer>
  </div>

</body>

</html>
