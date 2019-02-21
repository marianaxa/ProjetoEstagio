<?php 
//conexao
require_once 'db_connect.php';

/*
//sessao antigo
session_start();

if(!isset($_SESSION['logado'])):
  header('Location: login.php');
endif;
*/

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivelUsuario = $_SESSION['UsuarioNivel'];


// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: login.php"); exit;
}




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Sistema Lasfac</title>

  <link rel="icon" href="imagens/logo3.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="imagens/logo3.ico" type="image/x-icon" />
<!--  <a href="https://icons8.com">Icon pack by Icons8</a> //fonte dos icones acima-->

  <!-- BOOTSTRAP -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- FONT AWESOME -->
 <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



  <!-- BLOQUEIO-->
  <script src="scripts/scriptBloqueio.js"></script>
  <div id="msgAviso" style="display:none;">
    <span class="fas fa-ban"></span>
    <span>Não é permitido voltar pelo botão do browser.</span>
  </div>

  <!--EXCLUSAO-->
  <!-- <script src="scripts/scriptesp.js"></script> -->
  <script src="scripts/scriptLote.js"></script>
  <script src="scripts/scriptArvore.js"></script> 
  <script src="scripts/scriptArvoreExclusao.js"></script> 
  <script src="scripts/scriptforn.js"></script> 
  <script src="scripts/scripts.js"></script>
  <script src="scripts/scriptEspecie.js"></script>

  <style type="text/css">
  
  .navbar-nav > li > a {padding-top:10px !important; padding-bottom:10px !important;}
  .navbar {min-height:40px !important; margin-bottom: 0 !important; }

</style>

  <script type="text/javascript">
    $('#tabela').find('input[name=optradio]').click(function(){

      var valor = this.value;
      var id= this.id;
   // console.log(valor);
    // $codigo = val(id);
  });


    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);

  </script>


  <script type="text/javascript">
    $(function(){
        $(".btn-toggle").click(function(e){
            e.preventDefault();
            el = $(this).data('element');
            $(el).toggle();
        });
    });
  </script>

  <script type="text/javascript">
    function Mudarestado(el) {
      document.getElementById('adm').style.cor = "#000000";
        var nivel = "<?php print $nivelUsuario; ?>";
        console.log(nivel);

        if(nivel < 2){
          document.getElementById('adm').style.display = 'none';

        }else{
           document.getElementById('adm').style.display = 'block';

        }

    }
  </script>
  <style type="text/css">
  .mydiv { 
    visibility:hidden;
  }
  </style>


</head>
<!-- #1f6bad-->
<body style="background-color:#155425;" onload="Mudarestado('adm')">

  <div class="container-fluid" style="padding: 20px;">

    <div class="well" style="min-height: 700px ">
    <!-- CABEÇALHO -->

      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span> 
            </button>
            <!--      <a class="navbar-brand" href="#"><i class="fa fa-pagelines"  style="font-size:30px"></i></a> -->

          </div>
    <!--    <div class="collapse navbar-collapse" id="myNavbar" aling=w"center">
          <ul class="nav navbar-nav">
            <li><a href="principal.php">Início</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="lista-lote.php">Lotes
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="cadastro-lote.php">Cadastrar Lote Recebido</a></li>
                  <li><a href="cadastro-colheita.php">Cadastrar Colheita</a></li>
                  <li><a href="cadastro-especie.php">Cadastrar Espécie</a></li>
                  <li><a href="lista-lote.php">Lista de Lotes</a></li>
                  <!--     <li><a href="lista-colheita.php">Lista de Colheita</a></li> -->
             <!--     <li><a href="lista-especie.php">Lista de Espécies</a></li> 
                </ul>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="lista-amostra.php">Amostras
                  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="cadastro-amostra.php">Cadastrar Amostra</a></li>
                    <li><a href="lista-amostra.php">Lista de Amostras</a></li>
                  </ul>
                </li>
                <!-- 
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
              </ul>-->
              <ul class="nav navbar-nav navbar-left">
                <li><a href="principal.php"><i class="fa fa-home"></i> LasfAC</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <li class="adm" id='adm'><a href="lista-usuario.php"><span class="glyphicon glyphicon-user"></span> Usuários</a></li><!--deixa aki entao pra ir pra uma tela q puxa a lista dos usuarios, mas esse campo so aparece se for no caso um usuario do tipo administrador-->
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li>
              </ul>
            </div>
       <!--   </div> -->
        </nav>

      <!-- Conteúdo da página -->
    <!--  <section class="container-fluid" style="padding: 20px; "> -->
