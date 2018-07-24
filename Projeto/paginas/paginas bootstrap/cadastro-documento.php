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

    <!-- Conteúdo da página -->
    <section>
      <fieldset>
        <legend>Adicionar Documento</legend>
        <form>
          <div class="form-group col-md-10">
            <label for="adicionarArquivo">Adicionar Arquivo</label>
            <input type="file" class="form-control-file" id="adicionarArquivo">
          </div>
          <div class="form-group col-md-4">
            <label for="obsTesteUmidade">Descrição</label>
            <textarea  class="form-control" rows="3" name="obsTesteUmidade" id="obsTesteUmidade" required=""></textarea>
          </div>
          <div class="form-group col-md-12">
            <input type="submit" value="Confirmar" class="btn btn-primary">
          </div>
        </form>
      </fieldset>
    </section>

    <!-- Rodapé -->
    <footer>

    </footer>

  </body>
  </html>