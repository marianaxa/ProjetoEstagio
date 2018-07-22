<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Cadastro Número de Sementes</title>
  <meta charset="UTF-8">
  <meta name="author" content="Mariana Fulano de Tal">
  <meta name="description" content="Descrição do seu Projeto">
  <meta name="keywords" content="Palavras chave do seu Projeto">
</head>

<body>
  <!-- Barra de tarefas -->
  <div id="interface">
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
        <form  name="formCardastroNumSementes" id="formCardastroNumSementes" method="get" action="#">
          <!--Essas informações talvez sejam cadastradas uma unica vez -->
          <label for="dataTesteNumSementes"> Data: </label>
          <input type="date" name="dataTesteNumSementes" id="dataTesteNumSementes" maxlength="10" minlength="10" placeholder="Ex.: 01/01/2018" required="">
          <br>
          <label for="analistaTesteNumSementes"> Analista: </label>
          <input type="text" name="analistaTesteNumSementes" id="analistaTesteNumSementes" maxlength="30" minlength="4" placeholder="Ex.: João da Silva" required="">
          <br>
          <label for="numSementes"> N° de Sementes: </label>
          <input type="text" name="numSementes" id="numSementes" maxlength="6" minlength="1" placeholder="Ex.: 500" required="">
          <br>
          <label for="pesoAmostra"> Peso da Amostra: </label>
          <input type="text" name="pesoAmostra" id="pesoAmostra" maxlength="4" minlength="1" placeholder="Ex.: 10" required="">
          <br>
          <label for="numSementesKh"> N° Sementes (KH): </label>
          <input type="text" name="numSementesKh" id="numSementesKh" maxlength="4" minlength="1" placeholder="Ex.: 10" required="">
          <br>
          Observação: <textarea ></textarea>
          <br>
          <input type="submit" value="Enviar"> 
        </form>
      </fieldset>
    </section>
  </div>
</body>
</html>