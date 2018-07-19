<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastro de Espécies</title>

  <meta name="author" content="Mariana Fulano de Tal">
  <meta name="description" content="Descrição do seu Projeto">
  <meta name="keywords" content="Palavras chave do seu Projeto">
</head>

<body>
  <div id="interface">
    <!-- Cabeçalho -->
    <header>
      <nav>
        <ul>
          <li><a href="principal.html">Inicio</a> |</li>
          <li><a href="#">Amostras</a> |</li>
          <li><a href="#">Analises</a> |</li>
          <li><a href="#">Relatorios</a> |</li>
          <li><a href="#">Documentos</a> |</li>
          <li><a href="#">Sair</a></li>
        </ul>
      </nav>
    </header>

    <!-- Conteúdo da página -->
    <section>
      <fieldset>
        <legend>CADASTRO DE AMOSTRAS</legend>
        <form  name="formCardastroEspecie" id="formCardastroEspecie" method="get" action="#">
          <label for="nome_vulgar">Nome Vulgar: </label>
          <input type="text" name="nome_vulgar" id="nome_vulgar" maxlength="30" minlength="5" placeholder="Ex.: Pupunha" required="">
          <br>
          <label for="nome_cientifico">Nome Científico: </label>
          <input type="text" name="nome_cientifico" id="nome_cientifico" maxlength="30" minlength="5" placeholder="Ex.: Bactris gasipaes" required="">
          <br>
          <label for="familia">Família: </label>
          <input type="text" name="familia" id="familia" maxlength="30" minlength="5" placeholder="Ex.: Arecaceae" required="">
          <br>
          <input type="submit" name="Enviar">
        </form>
      </fieldset>
    </section>

    <!-- Rodapé -->
    <footer>

    </footer>

  </body>
  </html>