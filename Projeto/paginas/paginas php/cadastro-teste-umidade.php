<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Sistema Lasfac</title>


</head>

<body>
  <!-- a parte da barra-->
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


    <!-- a parte do formulario -->
    <section>
      <fieldset>
        <legend>Teste de Umidade</legend>
         <!--Essas informações talvez sejam cadastradas uma unica vez -->
        <form name="formTesteUmidade" id="formTesteUmidade" method="get" action="#">
          <label for="dataTesteUmidade">Data de realização do teste:</label> 
          <input type="date" name="dataTesteUmidade" id="dataTesteUmidade" required="">
          <br>
          <br>
          <label for="analistaTesteUmidade">Analista:</label>
          <input type="text" name="analistaTesteUmidade" id="analistaTesteUmidade" required="">  
          <br>
          <br>
          <label for="numCadinho">N° Cadinho:</label>
          <input type="number" name="numCadinho" id="numCadinho" required="">
          <br>
          <br>
          <label for="pesoCadinho">Peso do Cadinho:</label>
          <input type="number" name="pesoCadinho" id="pesoCadinho" required=""> 
          <br>
          <br>
          <!--D nao tenho 100% certeza se vai aceitar virgula e "salvar certo"-->
          <label for="pesoUmido">Peso Úmido:</label> 
          <input type="number" name="pesoUmido" id="pesoUmido" required="">
          <br><br>
          <label for="pesoSeco">Peso Seco:</label>      
          <input type="number" name="pesoSeco" id="pesoSeco" required="">
          <br><br>
          <label for="umidade">Umidade (%):</label>
          <input type="number" name="umidade" id="umidade" required="">
          <br><br>
          <label for="umidadeMedia">Umidade Média (%):</label>
          <input type="number" name="umidadeMedia" id="umidadeMedia" required="">
          <br><br>
          <label for="obsTesteUmidade">Observação</label>
          <textarea name="obsTesteUmidade" id="obsTesteUmidade"></textarea>
          <br><br>
          <button type="submit" value="Submit" >Confirmar</button>
        </form>
      </fieldset>
    </section>
    <footer>
      
    </footer>
  </div>

</body>

</html>
