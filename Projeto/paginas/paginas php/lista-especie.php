<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Lista de Espécies</title>
  <meta charset="UTF-8">
</head>

<body>
  <div id="interface">
    <!-- Barra de Tarefas -->
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
        <button>Cadastrar</button>
        <table>
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome Vulgar</th>
              <th>Nome Científico</th>
              <th>Familia</th>
              <th>Opções</th>
            </tr>
          </thead>
          <tbody>
            <!--Só um exemplo de conteudo-->
            <tr>
              <th>001</th>
              <th>pupunha</th>
              <th>pupunha cientifico</th>
              <th>Arecaceae</th>
              <th><button>Editar</button>|<button>Excluir</button></th>
            </tr>
          </tbody>
        <!--a janela do editar é igual do formulario com os dados carregados, e a de excluir so abre um moral perguntando
          se realmente deseja excluir (ainda acho essa opçcao meio perigosa, mas deixa ai kkk)-->
          <!--Fim do exemplo-->
        </table>
      </fieldset>
    </section>

    <!-- Rodapé -->
    <footer>
      
    </footer>
  </div>
</body>
</html>